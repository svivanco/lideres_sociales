<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\App;

/**
 * OpePersonasRedesSociales Controller
 *
 * @property \App\Model\Table\OpePersonasRedesSocialesTable $OpePersonasRedesSociales
 *
 * @method \App\Model\Entity\OpePersonasRedesSociale[] paginate($object = null, array $settings = [])
 */
class OpePersonasRedesSocialesController extends AppController
{
    public $paginate = array();

    
    public function getData()
    {
         $aColumns = array
                        (
                            'OpePersonasRedesSociales.id',
                                'OpePersonasRedesSociales.cat_persona_id',
                                'OpePersonasRedesSociales.cat_redes_sociale_id',
                                'OpePersonasRedesSociales.enlace',
                                'OpePersonasRedesSociales.activo',
                                'OpePersonasRedesSociales.created',
                                'OpePersonasRedesSociales.modified',
                                );
        
        $sIndexColumn = "OpePersonasRedesSociales.id";
        
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
            $query = $this->OpePersonasRedesSociales->find()->where($this->paginate['conditions']);
            
             $this->paginate['contain'] = ['CatPersonas', 'CatRedesSociales'];
            $opePersonasRedesSociales = $this->paginate($query);  
        }
        else
        {
        	$this->paginate['contain'] = ['CatPersonas', 'CatRedesSociales'];
            
            $opePersonasRedesSociales = $this->paginate('OpePersonasRedesSociales');
        }
        
        //Numero total de registros
        $iTotalDisplayRecords = $this->request->params['paging']['OpePersonasRedesSociales']['count'];

        //Numero de registros encontrados
        $iTotalRecords = $this->request->params['paging']['OpePersonasRedesSociales']['current'];

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
        foreach($opePersonasRedesSociales as $opePersonasRedesSociale)
        {

            $actions = "<div class='btn-group' role='group'>";
                $actions .= $Html->link("<i class='icon md-eye' aria-hidden='true'></i>",array('action'=>'view',$opePersonasRedesSociale->id),array('escape'=>false,'class'=>"btn btn-default"));
                $actions .= $Html->link("<i class='icon md-edit' aria-hidden='true'></i>",array('action'=>'edit',$opePersonasRedesSociale->id),array('escape'=>false,'class'=>"btn btn-default"));
                $actions .= $Form->postLink("<i class='icon md-delete' aria-hidden='true'></i>", ['action' => 'delete',$opePersonasRedesSociale->id], ['escape'=>false,'class'=>"btn btn-danger",'confirm' => __('Realmente desea eliminar el registro con el Id # {0}?', $opePersonasRedesSociale->id)]);
            $actions .="</div>";
            	$aaData[$i][] = $opePersonasRedesSociale->id;
		$aaData[$i][] = $opePersonasRedesSociale->cat_persona_id;
		$aaData[$i][] = $opePersonasRedesSociale->cat_redes_sociale_id;
		$aaData[$i][] = $opePersonasRedesSociale->enlace;
		$aaData[$i][] = $opePersonasRedesSociale->activo;
		$aaData[$i][] = $opePersonasRedesSociale->created;
		$aaData[$i][] = $opePersonasRedesSociale->modified;
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
     * @param string|null $id Ope Personas Redes Sociale id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $opePersonasRedesSociale = $this->OpePersonasRedesSociales->get($id, [
            'contain' => ['CatPersonas', 'CatRedesSociales']
        ]);

        $this->set('opePersonasRedesSociale', $opePersonasRedesSociale);
        $this->set('_serialize', ['opePersonasRedesSociale']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $opePersonasRedesSociale = $this->OpePersonasRedesSociales->newEntity();
        if ($this->request->is('post')) {
            $opePersonasRedesSociale = $this->OpePersonasRedesSociales->patchEntity($opePersonasRedesSociale, $this->request->getData());
            if ($this->OpePersonasRedesSociales->save($opePersonasRedesSociale)) 
            {
               
                $this->Flash->flash('Registro guardado.', ['params'=>['type'=>'info']]);

                return $this->redirect(['action' => 'index']);
            }
			 	$this->Flash->flash('El Registro no pudo ser guardado.', ['params'=>['type'=>'danger']]);
		
        }
        $catPersonas = $this->OpePersonasRedesSociales->CatPersonas->find('list', ['limit' => 200]);
        $catRedesSociales = $this->OpePersonasRedesSociales->CatRedesSociales->find('list', ['limit' => 200]);
        $this->set(compact('opePersonasRedesSociale', 'catPersonas', 'catRedesSociales'));
        $this->set('_serialize', ['opePersonasRedesSociale']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ope Personas Redes Sociale id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $opePersonasRedesSociale = $this->OpePersonasRedesSociales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $opePersonasRedesSociale = $this->OpePersonasRedesSociales->patchEntity($opePersonasRedesSociale, $this->request->getData());
            if ($this->OpePersonasRedesSociales->save($opePersonasRedesSociale)) 
            {
            	$this->Flash->flash('Registro actualizado correctamente.', ['params'=>['type'=>'info']]);
                return $this->redirect(['action' => 'index']);
            }
           		$this->Flash->flash('El registro no se pudo actualizar correctamente. Intentelo nuevamente', ['params'=>['type'=>'danger']]);
    }
        $catPersonas = $this->OpePersonasRedesSociales->CatPersonas->find('list', ['limit' => 200]);
        $catRedesSociales = $this->OpePersonasRedesSociales->CatRedesSociales->find('list', ['limit' => 200]);
        $this->set(compact('opePersonasRedesSociale', 'catPersonas', 'catRedesSociales'));
        $this->set('_serialize', ['opePersonasRedesSociale']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ope Personas Redes Sociale id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $opePersonasRedesSociale = $this->OpePersonasRedesSociales->get($id);
        if ($this->OpePersonasRedesSociales->delete($opePersonasRedesSociale)) 
        {
        	$this->Flash->flash('Registro eliminado correctamente.', ['params'=>['type'=>'info']]);
        } 
        else 
        {
			$this->Flash->flash('El registro no pudo ser eliminado. Intentelo nuevamente', ['params'=>['type'=>'danger']]);
        }

        return $this->redirect(['action' => 'index']);
    }
    public function  viewCampos()
    {
        $numero = $this->request->getData('numero');
        $catRedesSociales = $this->OpePersonasRedesSociales->CatRedesSociales->find('list');
        $this->set(compact('numero','catRedesSociales'));
    }
}
