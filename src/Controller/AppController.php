<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Ldap\Auth\LdapAuthenticate;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        date_default_timezone_set("America/Bogota");
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
                                        'loginAction' => [
                                            'controller' => 'CoUsuarios',
                                            'action' => 'login',
                                        ],
                                        /*'authError' => 'Acceso Denegado',
                                        'flash'=>['params'=>['class'=>'alert alert-danger']],*/
                                        'authError' => '',
                                        'flash'=>['params'=>['class'=>'']],
                                        
                                        'authenticate'=>[
                                            'Form'=>[
                                                'fields'=>[
                                                    'username'=>'login',
                                                    'password'=>'password'
                                                ],
                                                'userModel'=>'CoUsuarios'
                                            ]
                                        ],
                                        // 'authenticate' => [
                                        //     'Ldap' => [
                                        //         'fields' => ['username' => 'login'],
                                        //         'userModel'=>'CoUsuarios',
                                        //         'port' => 389,
                                        //         'host' => '10.75.91.9',
                                        //         'domain' => 'tsjqroo.gob.mx',
                                        //         'baseDN' => 'OU=Tribunal Superior de Justicia,DC=tsjqroo,DC=gob,DC=mx',
                                        //         'search' => 'sAMAccountName',
                                        //         'errors' => [
                                        //             'data 773' => 'Some error for Flash',
                                        //             'data 532' => 'Some error for Flash',
                                        //         ]
                                        //     ],
                                        // ],
                                        'storage' => 'Session',
                                        'authorize'=>'Controller'
                                    ]);
//       $this->Auth->allow();

	//NOTIFICACIONES DE SERVICIOS PENDIENTES
	
	if($this->request->Session()->check('Auth'))
	{
	}
}
    
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        if($this->request->session()->check('Auth.User.co_grupo_id'))
        {
            $this->_getMenuBD();
        }
    }

    public function isAuthorized()
    {
        if(!$this->request->session()->check('permisos'))
        {
            $this->_getPermisosBD();
        }
        $permisos = $this->request->session()->read('permisos');
        $extras =
                    [
                        ['CoPermisos'=>['controller'=>'Pages','action'=>'*']],
                        ['CoPermisos'=>['controller'=>'CoUsuarios','action'=>'login']],
                        ['CoPermisos'=>['controller'=>'CoUsuarios','action'=>'logout']]
                    ];
        $permisos = array_merge($extras,$permisos);
        foreach($permisos as $permiso)
        {
            if($permiso['CoPermisos']['controller'] == '*' && $permiso['CoPermisos']['action'] == '*')
            {
                return true;
            }
            if($permiso['CoPermisos']['controller'] == $this->request->params['controller'] && $permiso['CoPermisos']['action'] == '*')
            {
                return true;
            }
            if($permiso['CoPermisos']['controller'] == $this->request->params['controller'] && $permiso['CoPermisos']['action'] == $this->request->params['action'])
            {
                return true;
            }
            
        }
        return false;
    }

    public function _getPermisosBD()
    {
        $tmp = array();
        $i = 0;
        if($this->request->session()->check('Auth.User.co_grupo_id'))
        {
            $CoPermisos = TableRegistry::get('CoPermisos');
            $permisos = $CoPermisos->find(
                'all',
                            [
                                'conditions'=>[
                                    'CoPermisos.id IN (SELECT co_permiso_id FROM co_grupos_co_permisos WHERE co_grupo_id = '.$this->request->Session()->read('Auth.User.co_grupo_id').')'],
                                    'fields'=>['CoPermisos.id','CoPermisos.controller','CoPermisos.action']
                            ]
            );

            foreach($permisos as $permiso)
            {
                $tmp[$i]['CoPermisos']['id'] = $permiso->id;
                $tmp[$i]['CoPermisos']['controller'] = $permiso->controller;
                $tmp[$i]['CoPermisos']['action'] = $permiso->action;
                $i++;
            }
        }

        $this->request->session()->write('permisos',$tmp);
               
    }

    public function _getMenuBD()
    {   

        if(!$this->request->session()->check('menuBD'))
        {
            $CoMenus = TableRegistry::get('CoMenus');
            $menus = $CoMenus->find('all',
                                            ['fields'=>[
                                                        'CoMenus.id','CoMenus.name','CoMenus.destino','CoMenus.icon'
                                                        ],
                                              'order'=>['CoMenus.posicion ASC'],
                                              'conditions'=>[
                                                              'CoMenus.co_menu_id IS NULL',
                                                              'CoMenus.activo = 1',
                                                              'CoMenus.id IN (SELECT co_menu_id FROM co_grupos_co_menus WHERE co_grupo_id ='.$this->request->Session()->read('Auth.User.co_grupo_id').')'
                                                            ]
                                    ])->contain(
                                                  ['MenusHijos'=>[
                                                                    'fields'=>[
                                                                                'MenusHijos.id',
                                                                                'MenusHijos.co_menu_id',
                                                                                'MenusHijos.name',
                                                                                'MenusHijos.destino',
                                                                                'MenusHijos.icon'
                                                                              ],
                                                                    'conditions'=>[
                                                                                    'MenusHijos.activo = 1',
                                                                                    'MenusHijos.id IN (SELECT co_menu_id FROM co_grupos_co_menus WHERE co_grupo_id = '.$this->request->Session()->read('Auth.User.co_grupo_id').')'
                                                                                  ],
                                                                    'sort'=>['MenusHijos.posicion ASC']
                                                                ]
                                                  ]);

            $tmp = array();
            $i = 0;
            foreach($menus AS $menu)
            {
                $tmp['CoMenus'][$i]['id'] = $menu->id;
                $tmp['CoMenus'][$i]['name'] = $menu->name;
                $tmp['CoMenus'][$i]['destino'] = $menu->destino;
                $tmp['CoMenus'][$i]['icon'] = $menu->icon;
                $tmp['CoMenus'][$i]['menus_hijos'] = array();
                $x = 0;
                foreach($menu->menus_hijos as $menu_hijo)
                {
                    $tmp['CoMenus'][$i]['menus_hijos'][$x]['name'] = $menu_hijo['name'];
                    $tmp['CoMenus'][$i]['menus_hijos'][$x]['destino'] = $menu_hijo['destino'];
                    $tmp['CoMenus'][$i]['menus_hijos'][$x]['icon'] = $menu_hijo['icon'];
                    $x++;
                }
                $i++;
            }

            $this->request->session()->write('menuBD',$tmp);
        }
        $menus = $this->request->session()->read('menuBD');
        $this->set(compact('menus'));
    }

}
