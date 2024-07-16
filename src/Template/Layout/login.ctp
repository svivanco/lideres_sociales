<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */


?>
<!DOCTYPE html>
<html class="no-js css-menubar">
<head>
    <?= $this->Html->charset() ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>

        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?php echo $this->Html->css(
                                    [
                                     'bootstrap/bootstrap.minfd53.css?v4.0.1',
                                     'bootstrap/bootstrap-extend.minfd53.css?v4.0.1',
                                     'core/site.minfd53.css?v4.0.1',
                                     'core/skintools.minfd53.css?v4.0.1',
//                                     'animsition/animsition.minfd53.css?v4.0.1',    
                                     'asscrollable/asScrollable.minfd53.css?v4.0.1',
                                      'switchery/switchery.minfd53.css?v4.0.1',
//                                      'intro-js/introjs.minfd53.css?v4.0.1',
                                      'slidepanel/slidePanel.minfd53.css?v4.0.1',
//                                      'flag-icon-css/flag-icon.minfd53.css?v4.0.1',
                                      'waves/waves.minfd53.css?v4.0.1',
                                      'login-v2.minfd53.css?v4.0.1',
                                      'material-design/material-design.minfd53.css?v4.0.1',
                                      'brand-icons/brand-icons.minfd53.css?v4.0.1',         
                                    ]
                                ) 
    ?>

    <?php 
    echo $this->Html->script(
                                [                                    
//                                    'core/skintools.minfd53.js?v4.0.1',
                                    'breakpoints/breakpoints.minfd53.js?v4.0.1',        
                                ]
                                ); 
?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
      <script>
    Breakpoints();
  </script>

  
</head>
<body class="animsition page-login-v2 layout-full page-dark">

<div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content">
      <div class="page-brand-info">
        <div class="brand" style="text-align: center;">
          <img class="brand-img" src="<?php echo $this->request->webroot; ?>img/logo.png" alt="..." width="300"><br>
          <h2 class="brand-text font-size-40">lIDERES SOCIALES</h2>
        </div>
        <h3 class="font-size-20" style="text-align: center;">CHETUMAL, QUINTANA ROO MX</h3>
      </div>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
  </div>
  
 <?php
         echo $this->Html->script(
                                    [   
                                        'babel-external-helpers/babel-external-helpersfd53.js?v4.0.1',
                                        'jquery/jquery.minfd53.js?v4.0.1',
                                        'popper-js/umd/popper.minfd53.js?v4.0.1',
                                        'bootstrap/bootstrap.minfd53.js?v4.0.1',
//                                      'animsition/animsition.minfd53.js?v4.0.1',
//                                        'mousewheel/jquery.mousewheel.minfd53.js?v4.0.1',
//                                        'asscrollbar/jquery-asScrollbar.minfd53.js?v4.0.1',
//                                        'asscrollable/jquery-asScrollable.minfd53.js?v4.0.1',
//                                        'ashoverscroll/jquery-asHoverScroll.minfd53.js?v4.0.1',
                                        'waves/waves.minfd53.js?v4.0.1',
//                                      'switchery/switchery.minfd53.js?v4.0.1',
                                      'intro-js/intro.minfd53.js?v4.0.1',
                                      'jquery-placeholder/jquery.placeholder.minfd53.js?v4.0.1',
//                                      'screenfull/screenfull.minfd53.js?v4.0.1',
//                                        'slidepanel/jquery-slidePanel.minfd53.js?v4.0.1',
                                        'core/State.minfd53.js?v4.0.1',
                                        'core/Component.minfd53.js?v4.0.1',
                                        'core/Plugin.minfd53.js?v4.0.1',
                                        'core/Base.minfd53.js?v4.0.1',
                                        'core/Config.minfd53.js?v4.0.1',
                                        'Section/Menubar.minfd53.js?v4.0.1',
                                        'Section/Sidebar.minfd53.js?v4.0.1',
                                        'Section/PageAside.minfd53.js?v4.0.1',
                                        'Plugin/menu.minfd53.js?v4.0.1',
//                                      'config/colors.minfd53.js?v4.0.1',
//                                      'config/tour.minfd53.js?v4.0.1', 
                                        'core/Site.minfd53.js?v4.0.1',   
//                                        'Plugin/asscrollable.minfd53.js?v4.0.1',
//                                        'Plugin/slidepanel.minfd53.js?v4.0.1',
//                                        'Plugin/switchery.minfd53.js?v4.0.1',
//                                      'peity/jquery.peity.minfd53.js?v4.0.1',
                                        'core/v1.minfd53.js?v4.0.1',                                    
//                                      'core/BaseApp.minfd53',  
                                        'jquery-placeholder.minfd53.js?v4.0.1',
                                        'material.minfd53.js?v4.0.1'  
                                    ]
                                ); 
 ?>
  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>
</body>
</html>
