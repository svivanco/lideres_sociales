<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\App;

/**
 * CoGrupos Controller
 *
 * @property \App\Model\Table\CoGruposTable $CoGrupos
 */
class CoGruposController extends AppController
{

    public function getData()
    {
        $aColumns = array
        (
            'CoGrupos.id',
            'CoGrupos.name',
            'CoGrupos.pagina_inicial',
            // 'CoGrupos.activo',
            'CoGrupos.created',
            'CoGrupos.modified',
        );

        $sIndexColumn = "CoGrupos.id";

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
            $query = $this->CoGrupos->find()->where($this->paginate['conditions']);

            $this->paginate['sortWhitelist'] = [
                'CoGrupos.id',
                'CoGrupos.name',
                'CoGrupos.pagina_inicial',
                'CoGrupos.activo',
                'CoGrupos.created',
                'CoGrupos.modified',
            ];

            $this->paginate['contain'] = [];
            $coGrupos = $this->paginate($query);
        }
        else
        {
            $this->paginate['contain'] = [];

            $this->paginate['sortWhitelist'] = [
                'CoGrupos.id',
                'CoGrupos.name',
                'CoGrupos.pagina_inicial',
                'CoGrupos.activo',
                'CoGrupos.created',
                'CoGrupos.modified',
            ];

            $coGrupos = $this->paginate('CoGrupos');
        }

        //Numero total de registros
        $iTotalDisplayRecords = $this->request->params['paging']['CoGrupos']['count'];

        //Numero de registros encontrados
        $iTotalRecords = $this->request->params['paging']['CoGrupos']['current'];

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
        foreach($coGrupos as $coGrupo)
        {

            $actions = "<div class='btn-group' role='group'>";
            $actions .= $Html->link("<i class='icon md-eye' aria-hidden='true'></i>",array('action'=>'view',$coGrupo->id),array('escape'=>false,'class'=>"btn btn-default"));
            $actions .= $Html->link("<i class='icon md-edit' aria-hidden='true'></i>",array('action'=>'edit',$coGrupo->id),array('escape'=>false,'class'=>"btn btn-default"));
            $actions .= $Form->postLink("<i class='icon md-delete' aria-hidden='true'></i>", ['action' => 'delete',$coGrupo->id], ['escape'=>false,'class'=>"btn btn-danger",'confirm' => __('Realmente desea eliminar el registro con el Id # {0}?', $coGrupo->id)]);
            $actions .="</div>";
            $aaData[$i][] = $coGrupo->id;
            $aaData[$i][] = $coGrupo->name;
            $aaData[$i][] = $coGrupo->pagina_inicial;
            $aaData[$i][] = $coGrupo->activo? __('<span class="badge badge-success">Si</span>') : __('<span class="badge badge-danger">No</span>');
            $aaData[$i][] = (date('Y-m-d H:i A', strtotime($coGrupo->created)));
            $aaData[$i][] =(date('Y-m-d H:i A', strtotime( $coGrupo->modified)));
            $aaData[$i][] = $actions;
            $i++;
        }
        //Enviamos y serializamos en JSON todas la variables requeridas por el jquery.dataTable
        $this->set(compact('sEcho','iTotalRecords','iTotalDisplayRecords','aaData'));
        $this->set('_serialize',array('sEcho','iTotalRecords','iTotalDisplayRecords','aaData'));
        $this->set('_jsonp',true);
    }

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub

    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $coGrupos = $this->paginate($this->CoGrupos);

        $this->set(compact('coGrupos'));
        $this->set('_serialize', ['coGrupos']);
    }

    /**
     * View method
     *
     * @param string|null $id Co Grupo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coGrupo = $this->CoGrupos->get($id, [
            'contain' => ['CoMenus', 'CoPermisos', 'CoUsuarios']
        ]);

        $this->set('coGrupo', $coGrupo);
        $this->set('_serialize', ['coGrupo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coGrupo = $this->CoGrupos->newEntity();
        if ($this->request->is('post')) {
            $coGrupo = $this->CoGrupos->patchEntity($coGrupo, $this->request->data);
            if ($this->CoGrupos->save($coGrupo)) {
                $this->Flash->success(__('El registro fue guardado satisfactoriamente.'),['params'=>['class'=>'alert alert-success']]);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El registro no pudo ser guardado. Por favor, intentelo nuevamente.'),['params'=>['class'=>'alert alert-danger']]);
            }
        }
        $coMenus = $this->CoGrupos->CoMenus->find('list', ['limit' => 200]);
        $coPermisos = $this->CoGrupos->CoPermisos->find('list', ['limit' => 200]);
        $this->set(compact('coGrupo', 'coMenus', 'coPermisos'));
        $this->set('_serialize', ['coGrupo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Co Grupo id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coGrupo = $this->CoGrupos->get($id, [
            'contain' => ['CoMenus', 'CoPermisos', 'CoUsuarios']
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coGrupo = $this->CoGrupos->patchEntity($coGrupo, $this->request->data);
//            pr($coGrupo);exit;
            if ($this->CoGrupos->save($coGrupo)) {
                $this->Flash->success(__('El registro se actualizo satisfactoriamente'),['params'=>['class'=>'alert alert-success']]);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El registro no pudo ser actualizado. Por favor, intentelo nuevamente.'),['params'=>['class'=>'alert alert-danger']]);
            }
        }
        $coMenus = $this->CoGrupos->CoMenus->find('list', ['limit' => 200]);
        $coPermisos = $this->CoGrupos->CoPermisos->find('list', ['limit' => 200]);
        $this->set(compact('coGrupo', 'coMenus', 'coPermisos'));
        $this->set('_serialize', ['coGrupo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Co Grupo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coGrupo = $this->CoGrupos->get($id);
        if ($this->CoGrupos->delete($coGrupo)) {
            $this->Flash->success(__('El registro fue eliminado.'),['params'=>['class'=>'alert alert-success']]);
        } else {
            $this->Flash->error(__('El registro no pudo ser eliminado. Por favor, intentelo nuevamente.'),['params'=>['class'=>'alert alert-danger']]);
        }
        return $this->redirect(['action' => 'index']);
    }
}
