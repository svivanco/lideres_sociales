<?php
namespace CakeJs\View\Helper;
/**
 * Javascript Generator class file.
 *
 * CakePHP :  Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Helper
 * @since         CakePHP(tm) v 1.2
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Core\Configure;
use Cake\View\Helper;
use Cake\View\Helper\FormHelper;
use Cake\View\Helper\HtmlHelper;
use Cake\View\View;
use CakeJs\View\Helper\JqueryEngineHelper;
use CakeJs\View\Helper\JsBaseEngineHelper;
/**
 * Javascript Generator helper class for easy use of JavaScript.
 *
 * JsHelper provides an abstract interface for authoring JavaScript with a
 * given client-side library.
 *
 * @package       Cake.View.Helper
 * @property      HtmlHelper $Html
 * @property      FormHelper $Form
 */
class JsHelper extends Helper
{
    /**
     * Whether or not you want scripts to be buffered or output.
     *
     * @var bool
     */
    public $bufferScripts = true;
    /**
     * Helper dependencies
     *
     * @var array
     */
    public $helpers = ['Html', 'Form'];
    /**
     * Variables to pass to Javascript.
     *
     * @var array
     * @see JsHelper::set()
     */
    protected $_jsVars = [];
    /**
     * Scripts that are queued for output
     *
     * @var array
     * @see JsHelper::buffer()
     */
    protected $_bufferedScripts = [];
    /**
     * Current Javascript Engine that is being used
     *
     * @var string
     */
    protected $_engineName;
    /**
     * The javascript variable created by set() variables.
     *
     * @var string
     */
    public $setVariable = 'app';
    /**
     * Constructor - determines engine helper
     *
     * @param array $config The configuration settings provided to this helper.
     * @return void
     */
    public function initialize(array $config = [])
    {
        $className = 'CakeJs.Jquery';
        if (is_array($config) && isset($config[0])) {
            $className = $config[0];
        } elseif (is_string($config)) {
            $className = $config;
        }
        $engineName = $className;
        list(, $className) = pluginSplit($className);
        $this->_engineName = $className . 'Engine';
        $engineClass = $engineName . 'Engine';
        $this->helpers[] = $engineClass;
        $this->_helperMap = $this->_View->helpers()->normalizeArray($this->helpers);
    }
    /**
     * call__ Allows for dispatching of methods to the Engine Helper.
     * methods in the Engines bufferedMethods list will be automatically buffered.
     * You can control buffering with the buffer param as well. By setting the last parameter to
     * any engine method to a boolean you can force or disable buffering.
     *
     * e.g. `$js->get('#foo')->effect('fadeIn', ['speed' => 'slow'], true);`
     *
     * Will force buffering for the effect method. If the method takes an options array you may also add
     * a 'buffer' param to the options array and control buffering there as well.
     *
     * e.g. `$js->get('#foo')->event('click', $functionContents, ['buffer' => true]);`
     *
     * The buffer parameter will not be passed onto the EngineHelper.
     *
     * @param string $method Method to be called
     * @param array $params Parameters for the method being called.
     * @return mixed Depends on the return of the dispatched method, or it could be an instance of the EngineHelper
     */
    public function __call($method, $params)
    {
        if ($this->{$this->_engineName} && method_exists($this->{$this->_engineName}, $method)) {
            $buffer = false;
            $engineHelper = $this->{$this->_engineName};
            if (in_array(strtolower($method), $engineHelper->bufferedMethods)) {
                $buffer = true;
            }
            if (count($params) > 0) {
                $lastParam = $params[count($params) - 1];
                $hasBufferParam = (is_bool($lastParam) || is_array($lastParam) && isset($lastParam['buffer']));
                if ($hasBufferParam && is_bool($lastParam)) {
                    $buffer = $lastParam;
                    unset($params[count($params) - 1]);
                } elseif ($hasBufferParam && is_array($lastParam)) {
                    $buffer = $lastParam['buffer'];
                    unset($params['buffer']);
                }
            }
            $out = call_user_func_array([&$engineHelper, $method], $params);
            if ($this->bufferScripts && $buffer && is_string($out)) {
                $this->buffer($out);
                return null;
            }
            if (is_object($out) && $out instanceof JsBaseEngineHelper) {
                return $this;
            }
            return $out;
        }
        if (method_exists($this, $method . '_')) {
            return call_user_func([&$this, $method . '_'], $params);
        }
        trigger_error(__d('cake_dev', 'JsHelper:: Missing Method %s is undefined', $method), E_USER_WARNING);
    }
    /**
     * Overwrite inherited Helper::value()
     * See JsBaseEngineHelper::value() for more information on this method.
     *
     * @param mixed $val A PHP variable to be converted to JSON
     * @param bool $quoteString If false, leaves string values unquoted
     * @param string $key Key name.
     * @return string a JavaScript-safe/JSON representation of $val
     * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/js.html#JsHelper::value
     */
    public function value($val = [], $quoteString = null, $key = 'value')
    {
        if ($quoteString === null) {
            $quoteString = true;
        }
        return $this->{$this->_engineName}->value($val, $quoteString);
    }
    /**
     * Writes all Javascript generated so far to a code block or
     * caches them to a file and returns a linked script. If no scripts have been
     * buffered this method will return null. If the request is an XHR(ajax) request
     * onDomReady will be set to false. As the dom is already 'ready'.
     *
     * ### Options
     *
     * - `inline` - Set to true to have scripts output as a script block inline
     *   if `cache` is also true, a script link tag will be generated. (default true)
     * - `cache` - Set to true to have scripts cached to a file and linked in (default false)
     * - `clear` - Set to false to prevent script cache from being cleared (default true)
     * - `onDomReady` - wrap cached scripts in domready event (default true)
     * - `safe` - if an inline block is generated should it be wrapped in <![CDATA[ ... ]]> (default true)
     *
     * @param array $options options for the code block
     * @return mixed Completed javascript tag if there are scripts, if there are no buffered
     *   scripts null will be returned.
     * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/js.html#JsHelper::writeBuffer
     */
    public function writeBuffer($options = [])
    {
        $domReady = !$this->request->is('ajax');
        $defaults = [
            'onDomReady' => $domReady, 'inline' => true,
            'cache' => false, 'clear' => true, 'safe' => true
        ];
        $options += $defaults;
        $script = implode("\n", $this->getBuffer($options['clear']));
        if (empty($script)) {
            return null;
        }
        if ($options['onDomReady']) {
            $script = $this->{$this->_engineName}->domReady($script);
        }
        $opts = $options;
        unset($opts['onDomReady'], $opts['cache'], $opts['clear']);
        if ($options['cache'] && $options['inline']) {
            $filename = md5($script);
            $path = WWW_ROOT . Configure::read('App.jsBaseUrl');
            if (file_exists($path . $filename . '.js')
                || cache(str_replace(WWW_ROOT, '', $path) . $filename . '.js', $script, '+999 days', 'public')
                ) {
                return $this->Html->script($filename);
            }
        }
        $return = $this->Html->scriptBlock($script, $opts);
        if ($options['inline']) {
            return $return;
        }
        return null;
    }
    /**
     * Write a script to the buffered scripts.
     *
     * @param string $script Script string to add to the buffer.
     * @param bool $top If true the script will be added to the top of the
     *   buffered scripts array. If false the bottom.
     * @return void
     * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/js.html#JsHelper::buffer
     */
    public function buffer($script, $top = false)
    {
        if ($top) {
            array_unshift($this->_bufferedScripts, $script);
        } else {
            $this->_bufferedScripts[] = $script;
        }
    }
    /**
     * Get all the buffered scripts
     *
     * @param bool $clear Whether or not to clear the script caches (default true)
     * @return array Array of scripts added to the request.
     * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/js.html#JsHelper::getBuffer
     */
    public function getBuffer($clear = true)
    {
        $this->_createVars();
        $scripts = $this->_bufferedScripts;
        if ($clear) {
            $this->_bufferedScripts = [];
            $this->_jsVars = [];
        }
        return $scripts;
    }
    /**
     * Generates the object string for variables passed to javascript and adds to buffer
     *
     * @return void
     */
    protected function _createVars()
    {
        if (!empty($this->_jsVars)) {
            $setVar = (strpos($this->setVariable, '.')) ? $this->setVariable : 'window.' . $this->setVariable;
            $this->buffer($setVar . ' = ' . $this->object($this->_jsVars) . ';', true);
        }
    }
    /**
     * Generate an 'Ajax' link. Uses the selected JS engine to create a link
     * element that is enhanced with Javascript. Options can include
     * both those for HtmlHelper::link() and JsBaseEngine::request(), JsBaseEngine::event();
     *
     * ### Options
     *
     * - `confirm` - Generate a confirm() dialog before sending the event.
     * - `id` - use a custom id.
     * - `htmlAttributes` - additional non-standard htmlAttributes. Standard attributes are class, id,
     *    rel, title, escape, onblur and onfocus.
     * - `buffer` - Disable the buffering and return a script tag in addition to the link.
     *
     * @param string $title Title for the link.
     * @param string|array $url Mixed either a string URL or a CakePHP URL array.
     * @param array $options Options for both the HTML element and Js::request()
     * @return string Completed link. If buffering is disabled a script tag will be returned as well.
     * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/js.html#JsHelper::link
     */
    public function link($title, $url = null, $options = [])
    {
        if (!isset($options['id'])) {
            $options['id'] = 'link-' . intval(mt_rand());
        }
        list($options, $htmlOptions) = $this->_getHtmlOptions($options);
        $out = $this->Html->link($title, $url, $htmlOptions);
        $this->get('#' . $htmlOptions['id']);
        $requestString = $event = '';
        if (isset($options['confirm'])) {
            $requestString = $this->confirmReturn($options['confirm']);
            unset($options['confirm']);
        }
        $buffer = isset($options['buffer']) ? $options['buffer'] : null;
        $safe = isset($options['safe']) ? $options['safe'] : true;
        unset($options['buffer'], $options['safe']);
        $requestString .= $this->request($url, $options);
        if (!empty($requestString)) {
            $event = $this->event('click', $requestString, $options + ['buffer' => $buffer]);
        }
        if (isset($buffer) && !$buffer) {
            $opts = ['safe' => $safe];
            $out .= $this->Html->scriptBlock($event, $opts);
        }
        return $out;
    }
    /**
     * Pass variables into Javascript. Allows you to set variables that will be
     * output when the buffer is fetched with `JsHelper::getBuffer()` or `JsHelper::writeBuffer()`
     * The Javascript variable used to output set variables can be controlled with `JsHelper::$setVariable`
     *
     * @param string|array $one Either an array of variables to set, or the name of the variable to set.
     * @param string|array $two If $one is a string, $two is the value for that key.
     * @return void
     * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/js.html#JsHelper::set
     */
    public function set($one, $two = null)
    {
        $data = null;
        if (is_array($one)) {
            if (is_array($two)) {
                $data = array_combine($one, $two);
            } else {
                $data = $one;
            }
        } else {
            $data = [$one => $two];
        }
        if (!$data) {
            return false;
        }
        $this->_jsVars = array_merge($this->_jsVars, $data);
    }
    /**
     * Uses the selected JS engine to create a submit input
     * element that is enhanced with Javascript. Options can include
     * both those for FormHelper::submit() and JsBaseEngine::request(), JsBaseEngine::event();
     *
     * Forms submitting with this method, cannot send files. Files do not transfer over XmlHttpRequest
     * and require an iframe or flash.
     *
     * ### Options
     *
     * - `url` The url you wish the XHR request to submit to.
     * - `confirm` A string to use for a confirm() message prior to submitting the request.
     * - `method` The method you wish the form to send by, defaults to POST
     * - `buffer` Whether or not you wish the script code to be buffered, defaults to true.
     * - Also see options for JsHelper::request() and JsHelper::event()
     *
     * @param string $caption The display text of the submit button.
     * @param array $options Array of options to use. See the options for the above mentioned methods.
     * @return string Completed submit button.
     * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/js.html#JsHelper::submit
     */
    public function submit($caption = null, $options = [])
    {
        if (!isset($options['id'])) {
            $options['id'] = 'submit-' . intval(mt_rand());
        }
        $formOptions = ['div'];
        list($options, $htmlOptions) = $this->_getHtmlOptions($options, $formOptions);
        $out = $this->Form->submit($caption, $htmlOptions);
        $this->get('#' . $htmlOptions['id']);
        $options['data'] = $this->serializeForm(['isForm' => false, 'inline' => true]);
        $requestString = $url = '';
        if (isset($options['confirm'])) {
            $requestString = $this->confirmReturn($options['confirm']);
            unset($options['confirm']);
        }
        if (isset($options['url'])) {
            $url = $options['url'];
            unset($options['url']);
        }
        if (!isset($options['method'])) {
            $options['method'] = 'post';
        }
        $options['dataExpression'] = true;
        $buffer = isset($options['buffer']) ? $options['buffer'] : null;
        $safe = isset($options['safe']) ? $options['safe'] : true;
        unset($options['buffer'], $options['safe']);
        $requestString .= $this->request($url, $options);
        if (!empty($requestString)) {
            $event = $this->event('click', $requestString, $options + ['buffer' => $buffer]);
        }
        if (isset($buffer) && !$buffer) {
            $opts = ['safe' => $safe];
            $out .= $this->Html->scriptBlock($event, $opts);
        }
        return $out;
    }
    /**
     * Parse a set of Options and extract the Html options.
     * Extracted Html Options are removed from the $options param.
     *
     * @param array $options Options to filter.
     * @param array $additional Array of additional keys to extract and include in the return options array.
     * @return array Array of js options and Htmloptions
     */
    protected function _getHtmlOptions($options, $additional = [])
    {
        $htmlKeys = array_merge(
            ['class', 'id', 'escape', 'onblur', 'onfocus', 'rel', 'title', 'style'],
            $additional
        );
        $htmlOptions = [];
        foreach ($htmlKeys as $key) {
            if (isset($options[$key])) {
                $htmlOptions[$key] = $options[$key];
            }
            unset($options[$key]);
        }
        if (isset($options['htmlAttributes'])) {
            $htmlOptions = array_merge($htmlOptions, $options['htmlAttributes']);
            unset($options['htmlAttributes']);
        }
        return [$options, $htmlOptions];
    }
}
