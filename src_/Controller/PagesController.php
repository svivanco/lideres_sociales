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

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{


    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
     public function home_()
    {
    exit; 
	}
	
     
    public function display()
    {
	   	/*$Unidad = TableRegistry::get('CatUnidades');
		$UnidadName = $Unidad->find()->where(['id IN (SELECT cat_unidade_id FROM cat_empleados WHERE id = "'.$this->request->Session()->read('Auth.User.cat_empleado_id').'")'])->first(); 
        
        $this->request->session()->write('Auth.User.cat_unidade_id',$UnidadName->id);
        $this->request->session()->write('Auth.User.unidad',$UnidadName->name_completo);
	   */	

        if($this->request->is(array('post','put')))
        {
            $CoGrupos = TableRegistry::get('CoGrupos');
            $coGrupo = $CoGrupos->get($this->request->data['co_grupo_id']);
            $this->request->session()->write('Auth.User.co_grupo_id',$coGrupo->id);
            $this->request->session()->write('Auth.User.co_grupo',$coGrupo->name);
            $this->request->session()->delete('menuBD');
            $this->request->session()->delete('permisos');
            $this->redirect($coGrupo->pagina_inicial);
        }
        else
        {
            if($this->request->session()->check('gruposActivos'))
            {
                $gruposActivos = $this->request->session()->read('gruposActivos');
                if(count($gruposActivos) == 1)
                {
                    $co_grupo_id = null;
                    foreach($gruposActivos as $id => $nombre)
                    {
                        $co_grupo_id = $id;
                    }
                    $CoGrupos = TableRegistry::get('CoGrupos');
                    $coGrupo = $CoGrupos->get($co_grupo_id);
                    $this->request->session()->write('Auth.User.co_grupo_id',$coGrupo->id);
                    $this->request->session()->write('Auth.User.co_grupo',$coGrupo->name);
                    $this->request->session()->delete('menuBD');
                    $this->request->session()->delete('permisos');
                    $this->redirect($coGrupo->pagina_inicial);

                }
            }

            if($this->request->session()->check('Auth.User.co_grupo_id'))
            {
                $this->request->data['co_grupo_id'] = $this->Auth->user('co_grupo_id');

            }
        }
    }
}
