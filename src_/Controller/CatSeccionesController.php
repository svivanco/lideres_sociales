<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\App;

/**
 * CatSecciones Controller
 *
 * @property \App\Model\Table\CatSeccionesTable $CatSecciones
 *
 * @method \App\Model\Entity\CatSeccione[] paginate($object = null, array $settings = [])
 */
class CatSeccionesController extends AppController
{
    public $paginate = array();

    
    public function getData()
    {
         $aColumns = array
                        (
                            'CatSecciones.id',
                                'CatSecciones.cat_municipio_id',
                                'CatSecciones.cat_distrito_id',
                                'CatSecciones.name',
                                'CatSecciones.activo',
                                'CatSecciones.created',
                                'CatSecciones.modified',
                                );
        
        $sIndexColumn = "CatSecciones.id";
        
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
            $query = $this->CatSecciones->find()->where($this->paginate['conditions']);
            
             $this->paginate['contain'] = ['CatMunicipios', 'CatDistritos'];
            $catSecciones = $this->paginate($query);  
        }
        else
        {
        	$this->paginate['contain'] = ['CatMunicipios', 'CatDistritos'];
            
            $catSecciones = $this->paginate('CatSecciones');
        }
        
        //Numero total de registros
        $iTotalDisplayRecords = $this->request->params['paging']['CatSecciones']['count'];

        //Numero de registros encontrados
        $iTotalRecords = $this->request->params['paging']['CatSecciones']['current'];

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
        foreach($catSecciones as $catSeccione)
        {

            $actions = "<div class='btn-group' role='group'>";
                $actions .= $Html->link("<i class='icon md-eye' aria-hidden='true'></i>",array('action'=>'view',$catSeccione->id),array('escape'=>false,'class'=>"btn btn-default"));
                $actions .= $Html->link("<i class='icon md-edit' aria-hidden='true'></i>",array('action'=>'edit',$catSeccione->id),array('escape'=>false,'class'=>"btn btn-default"));
                $actions .= $Form->postLink("<i class='icon md-delete' aria-hidden='true'></i>", ['action' => 'delete',$catSeccione->id], ['escape'=>false,'class'=>"btn btn-danger",'confirm' => __('Realmente desea eliminar el registro con el Id # {0}?', $catSeccione->id)]);
            $actions .="</div>";
            	$aaData[$i][] = $catSeccione->id;
		$aaData[$i][] = $catSeccione->cat_municipio_id;
		$aaData[$i][] = $catSeccione->cat_distrito_id;
		$aaData[$i][] = $catSeccione->name;
		$aaData[$i][] = $catSeccione->activo;
		$aaData[$i][] = $catSeccione->created;
		$aaData[$i][] = $catSeccione->modified;
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
     * @param string|null $id Cat Seccione id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $catSeccione = $this->CatSecciones->get($id, [
            'contain' => ['CatMunicipios', 'CatDistritos', 'CatPersonas']
        ]);

        $this->set('catSeccione', $catSeccione);
        $this->set('_serialize', ['catSeccione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $catSeccione = $this->CatSecciones->newEntity();
        if ($this->request->is('post')) {
            $catSeccione = $this->CatSecciones->patchEntity($catSeccione, $this->request->getData());
            if ($this->CatSecciones->save($catSeccione)) 
            {
               
                $this->Flash->flash('Registro guardado.', ['params'=>['type'=>'info']]);

                return $this->redirect(['action' => 'index']);
            }
			 	$this->Flash->flash('El Registro no pudo ser guardado.', ['params'=>['type'=>'danger']]);
		
        }
        $catMunicipios = $this->CatSecciones->CatMunicipios->find('list', ['limit' => 200]);
        $catDistritos = $this->CatSecciones->CatDistritos->find('list', ['limit' => 200]);
        $this->set(compact('catSeccione', 'catMunicipios', 'catDistritos'));
        $this->set('_serialize', ['catSeccione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cat Seccione id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $catSeccione = $this->CatSecciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $catSeccione = $this->CatSecciones->patchEntity($catSeccione, $this->request->getData());
            if ($this->CatSecciones->save($catSeccione)) 
            {
            	$this->Flash->flash('Registro actualizado correctamente.', ['params'=>['type'=>'info']]);
                return $this->redirect(['action' => 'index']);
            }
           		$this->Flash->flash('El registro no se pudo actualizar correctamente. Intentelo nuevamente', ['params'=>['type'=>'danger']]);
    }
        $catMunicipios = $this->CatSecciones->CatMunicipios->find('list', ['limit' => 200]);
        $catDistritos = $this->CatSecciones->CatDistritos->find('list', ['limit' => 200]);
        $this->set(compact('catSeccione', 'catMunicipios', 'catDistritos'));
        $this->set('_serialize', ['catSeccione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cat Seccione id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $catSeccione = $this->CatSecciones->get($id);
        if ($this->CatSecciones->delete($catSeccione)) 
        {
        	$this->Flash->flash('Registro eliminado correctamente.', ['params'=>['type'=>'info']]);
        } 
        else 
        {
			$this->Flash->flash('El registro no pudo ser eliminado. Intentelo nuevamente', ['params'=>['type'=>'danger']]);
        }

        return $this->redirect(['action' => 'index']);
    }

    public  function getSeccionesPorMunicipios()
    {
        if($this->request->is('post'))
        {
            $id = $this->request->getData('id');
            $catSecciones = $this->CatSecciones->find('list')->where(['CatSecciones.cat_municipio_id'=>$id]);
        }
        $this->set(compact('catSecciones'));
        $this->set('_serialize',['catSecciones']);
    }
}
