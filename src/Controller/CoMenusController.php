<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\App;

/**
 * CoMenus Controller
 *
 * @property \App\Model\Table\CoMenusTable $CoMenus
 */
class CoMenusController extends AppController
{
    public $paginate = array();

    public function getData()
    {
        $aColumns = array
        (
            'CoMenus.id',
            'CoMenus.co_menu_id',
            'CoMenus.icon',
            'CoMenus.name',
            'CoMenus.posicion',
            'CoMenus.destino',
           // 'CoMenus.activo',
            'CoMenus.created',
            'CoMenus.modified',
        );

        $sIndexColumn = "CoMenus.id";

        //Verificamos que nos enviaron la cantidad de registros que se requieren por pagina
        if(isset($this->request->query['iDisplayLength']))
        {
            $this->paginate['maxLimit'] =$this->request->query['iDisplayLength'];
            $this->paginate['limit'] =$this->request->query['iDisplayLength'];
        }

        //Verificamos si nos enviaron la pagina que desean visualizar
        if(isset($this->request->query['iDisplayStart']))
        {
            //Se realiza la division para obtener el numero de pagina
            $this->paginate['page'] = ($this->request->query['iDisplayStart']/$this->request->query['iDisplayLength'])+1;
        }
        //Verificamos si se envio algun orden de columna en especifico
        if(isset($this->request->query['iSortCol_0']))
        {
            $orden = [];
            for ( $i=0 ; $i < intval( $this->request->query['iSortingCols'] ) ; $i++ )
            {
                if ( $this->request->query[ 'bSortable_'.intval($this->request->query['iSortCol_'.$i]) ] == "true" )
                {
                    $column = $aColumns[ intval( $this->request->query['iSortCol_'.$i] ) ];
                    $order = ($this->request->query['sSortDir_'.$i]==='asc' ? 'asc' : 'desc');
                    $orden = [ $column => $order];
                }
            }
            //Si la cadena no esta vacia se la agregamos a las opciones del paginador en la opcion "order"
            if ( !empty($orden))
            {
                $this->paginate['order'] = $orden;
            }
        }
        //Revisamos si se envio el filtro para todos los campos
        $conditions = array();
        if ( isset($this->request->query['sSearch']) && $this->request->query['sSearch'] != "" )
        {
            for ( $i=0 ; $i < count($aColumns) ; $i++ )
            {
                $conditions[][$aColumns[$i].' LIKE']='%'.$this->request->query['sSearch'].'%';
            }
            //Si el arreglo de condiciones no esta vacio, lo pasamos a las opciones del Paginador con el operador OR
            if(!empty($conditions))
            {
                $this->paginate['conditions']['OR'] = $conditions;
            }
        }
        //Verificamos si se envio algun filtro de campo especifico
        for ( $i=0 ; $i < count($aColumns) ; $i++ )
        {
            if ( isset($this->request->query['bSearchable_'.$i]) && $this->request->query['bSearchable_'.$i] == "true" && ($this->request->query['sSearch_'.$i] != '' || $this->request->query['sSearch'] != '') )
            {
                if(!empty($this->request->query['sSearch']))
                    $this->paginate['conditions']['OR'][][$aColumns[$i].' LIKE']='%'.$this->request->query['sSearch'].'%';
                else
                    $this->paginate['conditions']['OR'][][$aColumns[$i].' LIKE']='%'.$this->request->query['sSearch_'.$i].'%';
            }
        }

        if(!empty($this->paginate['conditions']))
        {
            $query = $this->CoMenus->find()->where($this->paginate['conditions']);

            $this->paginate['sortWhitelist'] = [
                'CoMenus.id',
                'CoMenus.co_menu_id',
                'CoMenus.icon',
                'CoMenus.name',
                'CoMenus.posicion',
                'CoMenus.destino',
                'CoMenus.activo',
                'CoMenus.created',
                'CoMenus.modified',
            ];

            $this->paginate['contain'] = [];
            $coMenus = $this->paginate($query);
        }
        else
        {
            $this->paginate['contain'] = [];

            $this->paginate['sortWhitelist'] = [
                'CoMenus.id',
                'CoMenus.co_menu_id',
                'CoMenus.icon',
                'CoMenus.name',
                'CoMenus.posicion',
                'CoMenus.destino',
                'CoMenus.activo',
                'CoMenus.created',
                'CoMenus.modified',
            ];

            $coMenus = $this->paginate('CoMenus');
        }

        //Numero total de registros
        $iTotalDisplayRecords = $this->request->params['paging']['CoMenus']['count'];

        //Numero de registros encontrados
        $iTotalRecords = $this->request->params['paging']['CoMenus']['current'];

        //sEcho
        $sEcho = intval($this->request->query['sEcho']);

        //Datos para la tabla
        $aaData = array();

        //Cargamos los Helper para armar los links de acciones
        $View = new \App\View\AppView();
        App::classname('Html', 'View/Helper', 'Helper');
        $Html = $View->loadHelper('Html');
        $Form = $View->loadHelper('Form');

        $i = 0;
        foreach($coMenus as $coMenu)
        {

            $actions = "<div class='btn-group' role='group'>";
            $actions .= $Html->link("<i class='icon md-eye' aria-hidden='true'></i>",array('action'=>'view',$coMenu->id),array('escape'=>false,'class'=>"btn btn-default"));
            $actions .= $Html->link("<i class='icon md-edit' aria-hidden='true'></i>",array('action'=>'edit',$coMenu->id),array('escape'=>false,'class'=>"btn btn-default"));
            $actions .= $Form->postLink("<i class='icon md-delete' aria-hidden='true'></i>", ['action' => 'delete',$coMenu->id], ['escape'=>false,'class'=>"btn btn-danger",'confirm' => __('Realmente desea eliminar el registro con el Id # {0}?', $coMenu->id)]);
            $actions .="</div>";
            $aaData[$i][] = $coMenu->id;

            $aaData[$i][] = $coMenu->icon;
            $aaData[$i][] = $coMenu->name;
            $aaData[$i][] = $coMenu->posicion;
            $aaData[$i][] = $coMenu->destino;
            $aaData[$i][] = ($coMenu->activo) ? '<span class="badge badge-success">SI</span>' : '<span class="badge badge-danger">NO</span>';
            $aaData[$i][] = (date('Y-m-d H:i A', strtotime($coMenu->created)));
            $aaData[$i][] =(date('Y-m-d H:i A', strtotime( $coMenu->modified)));
            $aaData[$i][] = $actions;
            $i++;
        }
        //Enviamos y serializamos en JSON todas la variables requeridas por el jquery.dataTable
        $this->set(compact('sEcho','iTotalRecords','iTotalDisplayRecords','aaData'));
        $this->set('_serialize',array('sEcho','iTotalRecords','iTotalDisplayRecords','aaData'));
        $this->set('_jsonp',true);
    }



    public function index()
    {
       // $this->paginate = [
       //     'contain' => ['MenuPadre']
        //];
        //$coMenus = $this->paginate($this->CoMenus);

        //$this->set(compact('coMenus'));
        //$this->set('_serialize', ['coMenus']);
    }



    /**
     * View method
     *
     * @param string|null $id Co Menu id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coMenu = $this->CoMenus->get($id, [
            'contain' => ['MenuPadre', 'CoGrupos', 'MenusHijos']
        ]);

        $this->set('coMenu', $coMenu);
        $this->set('_serialize', ['coMenu']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coMenu = $this->CoMenus->newEntity();
        if ($this->request->is('post')) {
            $coMenu = $this->CoMenus->patchEntity($coMenu, $this->request->data);
//            pr($this->request->data);exit;
            if ($this->CoMenus->save($coMenu)) {
                $this->Flash->success(__('El registro ha sido guardado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El registro no pudo ser guardado. Por favor, intentelo nuevamente.'));
            }
        }
        $coMenus = $this->CoMenus->MenuPadre->find('list', ['limit' => 200,'conditions'=>['MenuPadre.co_menu_id IS NULL']]);
        $coGrupos = $this->CoMenus->CoGrupos->find('list', ['limit' => 200]);
        $this->set(compact('coMenu', 'coMenus', 'coGrupos'));
        $this->set('_serialize', ['coMenu']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Co Menu id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coMenu = $this->CoMenus->get($id, [
            'contain' => ['CoGrupos']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
          // pr($this->request->getData());Exit;
            $coMenu = $this->CoMenus->patchEntity($coMenu,  $this->request->getData());
            if ($this->CoMenus->save($coMenu)) {
                $this->Flash->success(__('El registro ha sido actualizado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El registro no pudo ser actualizado. Por favor, intentelo nuevamente.'));
            }
        }

        $menuPadre = $this->CoMenus->MenuPadre->find('list', ['limit' => 200]);
        $coGrupos = $this->CoMenus->CoGrupos->find('list', ['limit' => 200]);
        $this->set(compact('coMenu', 'menuPadre', 'coGrupos'));
        $this->set('_serialize', ['coMenu']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Co Menu id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coMenu = $this->CoMenus->get($id);
        if ($this->CoMenus->delete($coMenu)) {
            $this->Flash->success(__('El registro ha sido eliminado.'));
        } else {
            $this->Flash->error(__('El registro no pudo ser eliminado. Porfavor, intentelo nuevamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
