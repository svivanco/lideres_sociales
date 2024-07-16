<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\App;

/**
 * CatRedesSociales Controller
 *
 * @property \App\Model\Table\CatRedesSocialesTable $CatRedesSociales
 *
 * @method \App\Model\Entity\CatRedesSociale[] paginate($object = null, array $settings = [])
 */
class CatRedesSocialesController extends AppController
{
    public $paginate = array();

    
    public function getData()
    {
         $aColumns = array
                        (
                            'CatRedesSociales.id',
                                'CatRedesSociales.name',
                                'CatRedesSociales.activo',
                                'CatRedesSociales.created',
                                'CatRedesSociales.modified',
                                );
        
        $sIndexColumn = "CatRedesSociales.id";
        
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
            $query = $this->CatRedesSociales->find()->where($this->paginate['conditions']);
            
             $this->paginate['contain'] = [];
            $catRedesSociales = $this->paginate($query);  
        }
        else
        {
        	$this->paginate['contain'] = [];
            
            $catRedesSociales = $this->paginate('CatRedesSociales');
        }
        
        //Numero total de registros
        $iTotalDisplayRecords = $this->request->params['paging']['CatRedesSociales']['count'];

        //Numero de registros encontrados
        $iTotalRecords = $this->request->params['paging']['CatRedesSociales']['current'];

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
        foreach($catRedesSociales as $catRedesSociale)
        {

            $actions = "<div class='btn-group' role='group'>";
                $actions .= $Html->link("<i class='icon md-eye' aria-hidden='true'></i>",array('action'=>'view',$catRedesSociale->id),array('escape'=>false,'class'=>"btn btn-default"));
                $actions .= $Html->link("<i class='icon md-edit' aria-hidden='true'></i>",array('action'=>'edit',$catRedesSociale->id),array('escape'=>false,'class'=>"btn btn-default"));
                $actions .= $Form->postLink("<i class='icon md-delete' aria-hidden='true'></i>", ['action' => 'delete',$catRedesSociale->id], ['escape'=>false,'class'=>"btn btn-danger",'confirm' => __('Realmente desea eliminar el registro con el Id # {0}?', $catRedesSociale->id)]);
            $actions .="</div>";
            	$aaData[$i][] = $catRedesSociale->id;
		$aaData[$i][] = $catRedesSociale->name;
		$aaData[$i][] = $catRedesSociale->activo;
		$aaData[$i][] = $catRedesSociale->created;
		$aaData[$i][] = $catRedesSociale->modified;
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
     * @param string|null $id Cat Redes Sociale id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $catRedesSociale = $this->CatRedesSociales->get($id, [
            'contain' => ['OpePersonasRedesSociales']
        ]);

        $this->set('catRedesSociale', $catRedesSociale);
        $this->set('_serialize', ['catRedesSociale']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $catRedesSociale = $this->CatRedesSociales->newEntity();
        if ($this->request->is('post')) {
            $catRedesSociale = $this->CatRedesSociales->patchEntity($catRedesSociale, $this->request->getData());
            if ($this->CatRedesSociales->save($catRedesSociale)) 
            {
               
                $this->Flash->flash('Registro guardado.', ['params'=>['type'=>'info']]);

                return $this->redirect(['action' => 'index']);
            }
			 	$this->Flash->flash('El Registro no pudo ser guardado.', ['params'=>['type'=>'danger']]);
		
        }
        $this->set(compact('catRedesSociale'));
        $this->set('_serialize', ['catRedesSociale']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cat Redes Sociale id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $catRedesSociale = $this->CatRedesSociales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $catRedesSociale = $this->CatRedesSociales->patchEntity($catRedesSociale, $this->request->getData());
            if ($this->CatRedesSociales->save($catRedesSociale)) 
            {
            	$this->Flash->flash('Registro actualizado correctamente.', ['params'=>['type'=>'info']]);
                return $this->redirect(['action' => 'index']);
            }
           		$this->Flash->flash('El registro no se pudo actualizar correctamente. Intentelo nuevamente', ['params'=>['type'=>'danger']]);
    }
        $this->set(compact('catRedesSociale'));
        $this->set('_serialize', ['catRedesSociale']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cat Redes Sociale id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $catRedesSociale = $this->CatRedesSociales->get($id);
        if ($this->CatRedesSociales->delete($catRedesSociale)) 
        {
        	$this->Flash->flash('Registro eliminado correctamente.', ['params'=>['type'=>'info']]);
        } 
        else 
        {
			$this->Flash->flash('El registro no pudo ser eliminado. Intentelo nuevamente', ['params'=>['type'=>'danger']]);
        }

        return $this->redirect(['action' => 'index']);
    }
}
