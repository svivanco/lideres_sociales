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

$cakeDescription = 'CI SESA:';
?>
<!DOCTYPE html>
<html class="no-js css-menubar">
<head>
    <?= $this->Html->charset() ?>

    <meta charset="utf-8">
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?php echo $this->Html->css(
									[
									 'bootstrap/bootstrap.minfd53.css?v4.0.1',
									 'bootstrap/bootstrap-extend.minfd53.css?v4.0.1',
									 'core/site.minfd53.css?v4.0.1',
									 'core/skintools.minfd53.css?v4.0.1',
//								     'animsition/animsition.minfd53.css?v4.0.1',	
									 'asscrollable/asScrollable.minfd53.css?v4.0.1',
//									  'switchery/switchery.minfd53.css?v4.0.1',
//									  'intro-js/introjs.minfd53.css?v4.0.1',
									  'slidepanel/slidePanel.minfd53.css?v4.0.1',
//									  'flag-icon-css/flag-icon.minfd53.css?v4.0.1',
									  'waves/waves.minfd53.css?v4.0.1',
									  'material-design/material-design.minfd53.css?v4.0.1',
									  'brand-icons/brand-icons.minfd53.css?v4.0.1',         
									]
								) 
    ?>

    <?php 
    echo $this->Html->script(
							    [                                    
                                    'core/skintools.minfd53.js?v4.0.1',
                                    'breakpoints/breakpoints.minfd53.js?v4.0.1',        
                                    'jquery/jquery.minfd53.js?v4.0.1',	    
							    ]
	                            ); 
    ?>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script> Breakpoints();</script>
    
</head>
<body class="animsition site-navbar-small dashboard">
<!-- class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse" -->
  <nav 
    role="navigation">

    <div class="navbar-header">
<!--      class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"-->
      <button type="button" 
      
        data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
        data-toggle="collapse">
        <i class="icon md-more" aria-hidden="true"></i>
      </button>
      <a class="navbar-brand navbar-brand-center" href="index.html">
        <img class="navbar-brand-logo navbar-brand-logo-normal" src="<?php echo $this->request->webroot; ?>img/logo_pie.png"
          title="Remark">
        <img class="navbar-brand-logo navbar-brand-logo-special" src="<?php echo $this->request->webroot; ?>img/logo_pie.png"
          title="Remark">
        <span class="navbar-brand-text hidden-xs-down"> 
<!--        SIESQROO-->
        </span>
      </a>
      
    </div>

    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
          <li class="nav-item hidden-float" id="toggleMenubar">
            <a class="nav-link" data-toggle="menubar" href="#" role="button">
                <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
              </a>
          </li>   
        </ul>
        <!-- End Navbar Toolbar -->

        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
          <li class="nav-item dropdown">
            <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
            <?php
                echo $this->request->Session()->read('Auth.User.nombre').' '. $this->request->Session()->read('Auth.User.paterno').' '.$this->request->Session()->read('Auth.User.materno');
              ?>
            &nbsp;
              <span class="avatar avatar-online">
                <img src="<?php echo $this->request->webroot; ?>img/user.png" alt="...">
                <i></i>                
              </span>
            </a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-settings" aria-hidden="true"></i> Cambiar Contrase&ntilde;a</a>
              <div class="dropdown-divider"></div>
              <?= $this->Html->link(
                                        '<i class="icon md-power" aria-hidden="true"></i>&nbsp;Cerrar Sesi&oacute;n',
                                        [
                                                'controller'=>'co_usuarios',
                                                'action'=>'logout'
                                        ],
                                        [
                                                'escape'=>false,
                                                'class'=>'dropdown-item',
                                                'role'=>'menuitem'
                                        ]
                                    ) 
              ?>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications"
              aria-expanded="false" data-animation="scale-up" role="button">
                <i class="icon md-notifications" aria-hidden="true"></i>
                <span class="badge badge-pill badge-danger up">5</span>
              </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
              <div class="dropdown-menu-header">
                <h5>NOTIFICATIONS</h5>
                <span class="badge badge-round badge-danger">New 5</span>
              </div>

              <div class="list-group">
                <div data-role="container">
                  <div data-role="content">
                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                      <div class="media">
                        <div class="pr-10">
                          <i class="icon md-receipt bg-red-600 white icon-circle" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading">A new order has been placed</h6>
                          <time class="media-meta" datetime="2017-06-12T20:50:48+08:00">5 hours ago</time>
                        </div>
                      </div>
                    </a>
                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                      <div class="media">
                        <div class="pr-10">
                          <i class="icon md-account bg-green-600 white icon-circle" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading">Completed the task</h6>
                          <time class="media-meta" datetime="2017-06-11T18:29:20+08:00">2 days ago</time>
                        </div>
                      </div>
                    </a>
                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                      <div class="media">
                        <div class="pr-10">
                          <i class="icon md-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading">Settings updated</h6>
                          <time class="media-meta" datetime="2017-06-11T14:05:00+08:00">2 days ago</time>
                        </div>
                      </div>
                    </a>
                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                      <div class="media">
                        <div class="pr-10">
                          <i class="icon md-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading">Event started</h6>
                          <time class="media-meta" datetime="2017-06-10T13:50:18+08:00">3 days ago</time>
                        </div>
                      </div>
                    </a>
                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                      <div class="media">
                        <div class="pr-10">
                          <i class="icon md-comment bg-orange-600 white icon-circle" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading">Message received</h6>
                          <time class="media-meta" datetime="2017-06-10T12:34:48+08:00">3 days ago</time>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <div class="dropdown-menu-footer">
                <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                    <i class="icon md-settings" aria-hidden="true"></i>
                  </a>
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                    All notifications
                  </a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Messages"
              aria-expanded="false" data-animation="scale-up" role="button">
                <i class="icon md-email" aria-hidden="true"></i>
                <span class="badge badge-pill badge-info up">3</span>
              </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
              <div class="dropdown-menu-header" role="presentation">
                <h5>MESSAGES</h5>
                <span class="badge badge-round badge-info">New 3</span>
              </div>

              <div class="list-group" role="presentation">
                <div data-role="container">
                  <div data-role="content">
                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                      <div class="media">
                        <div class="pr-10">
                          <span class="avatar avatar-sm avatar-online">
                            <img src="../global/portraits/2.jpg" alt="..." />
                            <i></i>
                          </span>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading">Mary Adams</h6>
                          <div class="media-meta">
                            <time datetime="2017-06-17T20:22:05+08:00">30 minutes ago</time>
                          </div>
                          <div class="media-detail">Anyways, i would like just do it</div>
                        </div>
                      </div>
                    </a>
                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                      <div class="media">
                        <div class="pr-10">
                          <span class="avatar avatar-sm avatar-off">
                            <img src="../global/portraits/3.jpg" alt="..." />
                            <i></i>
                          </span>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading">Caleb Richards</h6>
                          <div class="media-meta">
                            <time datetime="2017-06-17T12:30:30+08:00">12 hours ago</time>
                          </div>
                          <div class="media-detail">I checheck the document. But there seems</div>
                        </div>
                      </div>
                    </a>
                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                      <div class="media">
                        <div class="pr-10">
                          <span class="avatar avatar-sm avatar-busy">
                            <img src="../global/portraits/4.jpg" alt="..." />
                            <i></i>
                          </span>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading">June Lane</h6>
                          <div class="media-meta">
                            <time datetime="2017-06-16T18:38:40+08:00">2 days ago</time>
                          </div>
                          <div class="media-detail">Lorem ipsum Id consectetur et minim</div>
                        </div>
                      </div>
                    </a>
                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                      <div class="media">
                        <div class="pr-10">
                          <span class="avatar avatar-sm avatar-away">
                            <img src="../global/portraits/5.jpg" alt="..." />
                            <i></i>
                          </span>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading">Edward Fletcher</h6>
                          <div class="media-meta">
                            <time datetime="2017-06-15T20:34:48+08:00">3 days ago</time>
                          </div>
                          <div class="media-detail">Dolor et irure cupidatat commodo nostrud nostrud.</div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <div class="dropdown-menu-footer" role="presentation">
                <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                    <i class="icon md-settings" aria-hidden="true"></i>
                  </a>
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                    See all messages
                  </a>
              </div>
            </div>
          </li>
          <li class="nav-item" id="toggleChat">
            <a class="nav-link" data-toggle="site-sidebar" href="javascript:void(0)" title="Chat"
              data-url="site-sidebar.tpl">
                <i class="icon md-comment" aria-hidden="true"></i>
              </a>
          </li>
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->


    </div>
  </nav>

  <div class="site-menubar site-menubar-light">
    <div class="site-menubar-body">
      <div>
        <div>

          <ul class="site-menu" data-plugin="menu">
            <li class="site-menu-category">Menu</li>
                
                <?php
                if(!empty($menus))
                {
                    foreach ($menus['CoMenus'] as $menu)
                    {
                        if(empty($menu['menus_hijos']))
                        {
                            ?>
                            <li class="site-menu-item has-sub">                          
                                <?php echo $this->Html->link(
                                                                '<i class="'.$menu['icon'].'" aria-hidden="true"></i>'.'<span class="site-menu-title">'.$menu['name'].'</span> <span class="site-menu-arrow"></span>',
                                                                $menu['destino'],
                                                                ['escape'=>false]
                                                            )
                                ?>
                            </li>
                            <?php
                        }
                        else
                        {
                            ?>
                            <li class="dropdown site-menu-item has-sub">
                                <?php
                                echo $this->Html->link(
                                                        '<i class="'.$menu['icon'].'" aria-hidden="true"></i>'.'<span class="site-menu-title">'.$menu['name'].'</span> <span class="site-menu-arrow"></span>',
                                                            'javascript:void(0)',
                                                            [
//                                                                'class'=>'dropdown',
                                                                'data-toggle'=>'dropdown',
                                                                'data-dropdown-toggle'=>false,
                                                                'escape'=>false
                                                            ]
                                                        )
                                ?>
                                <div class="dropdown-menu">
                                    <div class="site-menu-scroll-wrap is-list">
                                        <div>
                                            <div>
                                                <ul class="site-menu-sub site-menu-normal-list">
                                                    <?php
                                                        foreach ($menu['menus_hijos'] as $subMenu)
                                                        {
                                                            ?>
                                                            <li class="site-menu-item">
                                                                <?php echo $this->Html->link(
                                                                                                '<span class="site-menu-title">'.$subMenu['name'].'</span>',
                                                                                                $subMenu['destino'],
                                                                                                [
                                                                                                    'escape'=>false
                                                                                                ]
                                                                                             );
                                                                ?>
                                                            </li>
                                                            <?php
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }
                    }
                }
                ?>
          </ul>

        </div>
      </div>
    </div>

  </div>


  <!-- Page -->
  <div class="page">
    <div class="page-content panel">
      <?= $this->Flash->render()?>
      <?= $this->fetch('content') ?>
    </div>
  </div>
  <!-- End Page -->


  <!-- Footer -->

  <footer class="site-footer">
    <div class="site-footer-legal">© SISTEMA DE INFORMACI&Oacute;N ESTAD&Iacute;STICA EN SALUD</div>
    <div class="site-footer-right">
     SIESQROO <?php echo date('Y')?>&nbsp; &nbsp;<i class="red-600 icon md-favorite"></i> 
    </div>
  </footer>
 
 
 <?php
         echo $this->Html->script(
                                    [   
                                        'babel-external-helpers/babel-external-helpersfd53.js?v4.0.1',
                                        
                                        'popper-js/umd/popper.minfd53.js?v4.0.1',
                                        'bootstrap/bootstrap.minfd53.js?v4.0.1',
//                                      'animsition/animsition.minfd53.js?v4.0.1',
                                        'mousewheel/jquery.mousewheel.minfd53.js?v4.0.1',
                                        'asscrollbar/jquery-asScrollbar.minfd53.js?v4.0.1',
                                        'asscrollable/jquery-asScrollable.minfd53.js?v4.0.1',
                                        'ashoverscroll/jquery-asHoverScroll.minfd53.js?v4.0.1',
                                        'waves/waves.minfd53.js?v4.0.1',
//                                      'switchery/switchery.minfd53.js?v4.0.1',
//                                      'intro-js/intro.minfd53.js?v4.0.1',
//                                      'screenfull/screenfull.minfd53.js?v4.0.1',
                                        'slidepanel/jquery-slidePanel.minfd53.js?v4.0.1',
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
                                        'Plugin/asscrollable.minfd53.js?v4.0.1',
                                        'Plugin/slidepanel.minfd53.js?v4.0.1',
//                                        'Plugin/switchery.minfd53.js?v4.0.1',
//                                      'peity/jquery.peity.minfd53.js?v4.0.1',
                                        'core/v1.minfd53.js?v4.0.1',                                    
//                                      'core/BaseApp.minfd53',     
                                    ]
                                ); 
 ?>
  
</body>

</html>
