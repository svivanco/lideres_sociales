<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\App;

/**
 * CatTemas Controller
 *
 * @property \App\Model\Table\CatTemasTable $CatTemas
 *
 * @method \App\Model\Entity\CatTema[] paginate($object = null, array $settings = [])
 */
class CatTemasController extends AppController
{
    public $paginate = array();


    public function getData()
    {
         $aColumns = array
                        (
                                'CatTemas.name',
                                'CatTemas.activo',
                                'CatTemas.created',
                                'CatTemas.modified',
                                );

        $sIndexColumn = "CatTemas.id";

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
            $query = $this->CatTemas->find()->where($this->paginate['conditions']);

             $this->paginate['contain'] = [];
            $catTemas = $this->paginate($query);
        }
        else
        {
        	$this->paginate['contain'] = [];

            $catTemas = $this->paginate('CatTemas');
        }

        //Numero total de registros
        $iTotalDisplayRecords = $this->request->params['paging']['CatTemas']['count'];

        //Numero de registros encontrados
        $iTotalRecords = $this->request->params['paging']['CatTemas']['current'];

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
        foreach($catTemas as $catTema)
        {

            $actions = "<div class='btn-group' role='group'>";
                $actions .= $Html->link("<i class='icon md-eye' aria-hidden='true'></i>",array('action'=>'view',$catTema->id),array('escape'=>false,'class'=>"btn btn-default"));
                $actions .= $Html->link("<i class='icon md-edit' aria-hidden='true'></i>",array('action'=>'edit',$catTema->id),array('escape'=>false,'class'=>"btn btn-default"));
                $actions .= $Form->postLink("<i class='icon md-delete' aria-hidden='true'></i>", ['action' => 'delete',$catTema->id], ['escape'=>false,'class'=>"btn btn-danger",'confirm' => __('Realmente desea eliminar el registro con el Id # {0}?', $catTema->id)]);
            $actions .="</div>";
		$aaData[$i][] = $catTema->name;
    $aaData[$i][] = ($catTema->activo)?'<span class="badge badge-success">ACTIVO</span>' : '<span class="badge badge-danger">DESACTIVO</span>';
		$aaData[$i][] = $catTema->created;
		$aaData[$i][] = $catTema->modified;
	            $aaData[$i][] = $actions;
            $i++;
        }
        //Enviamos y serializamos en JSON todas la variables requeridas por el jquery.dataTable
        $this->set(compact('sEcho','iTotalRecords','iTotalDisplayRecords','aaData'));
        $this->set('_serialize',array('sEcho','iTotalRecords','iTotalDisplayRecords','aaData'));
        $this->set('_jsonp',true);
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
    }

    /**
     * View method
     *
     * @param string|null $id Cat Tema id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $catTema = $this->CatTemas->get($id, [
            'contain' => ['CatPersonas']
        ]);

        $this->set('catTema', $catTema);
        $this->set('_serialize', ['catTema']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $catTema = $this->CatTemas->newEntity();
        if ($this->request->is('post')) {
            $catTema = $this->CatTemas->patchEntity($catTema, $this->request->getData());
            if ($this->CatTemas->save($catTema))
            {

                $this->Flash->flash('Registro guardado.', ['params'=>['type'=>'info']]);

                return $this->redirect(['action' => 'index']);
            }
			 	$this->Flash->flash('El Registro no pudo ser guardado.', ['params'=>['type'=>'danger']]);

        }
        $catPersonas = $this->CatTemas->CatPersonas->find('list', ['limit' => 200]);
        $this->set(compact('catTema', 'catPersonas'));
        $this->set('_serialize', ['catTema']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cat Tema id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $catTema = $this->CatTemas->get($id, [
            'contain' => ['CatPersonas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $catTema = $this->CatTemas->patchEntity($catTema, $this->request->getData());
            if ($this->CatTemas->save($catTema))
            {
            	$this->Flash->flash('Registro actualizado correctamente.', ['params'=>['type'=>'info']]);
                return $this->redirect(['action' => 'index']);
            }
           		$this->Flash->flash('El registro no se pudo actualizar correctamente. Intentelo nuevamente', ['params'=>['type'=>'danger']]);
    }
        $catPersonas = $this->CatTemas->CatPersonas->find('list', ['limit' => 200]);
        $this->set(compact('catTema', 'catPersonas'));
        $this->set('_serialize', ['catTema']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cat Tema id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $catTema = $this->CatTemas->get($id);
        if ($this->CatTemas->delete($catTema))
        {
        	$this->Flash->flash('Registro eliminado correctamente.', ['params'=>['type'=>'info']]);
        }
        else
        {
			$this->Flash->flash('El registro no pudo ser eliminado. Intentelo nuevamente', ['params'=>['type'=>'danger']]);
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
    public function addTema()
    {
        $catTema = $this->CatTemas->newEntity();

        if($this->request->is('post'))
        {
            $catTema->name = $this->request->data['name'];
            $catTema = $this->CatTemas->patchEntity($catTema, $this->request->getData());
            $this->CatTemas->save($catTema);
        }
        
        exit();
    }
    
    public function getTemas()
    {
     if ($this->request->is('post'))
     {
       $catTemas = $this->CatTemas->find('list',['conditions'=>['CatTemas.activo'=>1]]);
     }
     header('Content-Type: application/json');
     echo json_encode($catTemas);
     exit();
     }
    
    
}
