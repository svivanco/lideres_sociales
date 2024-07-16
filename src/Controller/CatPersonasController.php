<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\App;
use Cake\ORM\TableRegistry;

/**
 * CatPersonas Controller
 *
 * @property \App\Model\Table\CatPersonasTable $CatPersonas
 *
 * @method \App\Model\Entity\CatPersona[] paginate($object = null, array $settings = [])
 */
class CatPersonasController extends AppController
{
    public $paginate = array();

    
    public function getData()
    {
         $aColumns = array
                        (
                        'CatPersonas.nombre',
                        'CatPersonas.paterno',
                        'CatPersonas.materno',
                        'CatPersonas.edad',
                        'CatPersonas.sexo',
                        'CatPersonas.telefono',
                        'CatPersonas.email',
                        'CatPersonas.created'
                        );
        
        $sIndexColumn = "CatPersonas.id";
        
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
            $query = $this->CatPersonas->find()->where($this->paginate['conditions']);
            
             $this->paginate['contain'] = ['CatNivelAcademicos'];
            $catPersonas = $this->paginate($query);  
        }
        else
        {
        	$this->paginate['contain'] = ['CatNivelAcademicos'];
            
            $catPersonas = $this->paginate('CatPersonas');
        }
        
        //Numero total de registros
        $iTotalDisplayRecords = $this->request->params['paging']['CatPersonas']['count'];

        //Numero de registros encontrados
        $iTotalRecords = $this->request->params['paging']['CatPersonas']['current'];

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
        foreach($catPersonas as $catPersona)
        {

            $actions = "<div class='btn-group' role='group'>";
                $actions .= $Html->link("<i class='icon md-eye' aria-hidden='true'></i>",array('action'=>'view',$catPersona->id),array('escape'=>false,'class'=>"btn btn-default"));
                $actions .= $Html->link("<i class='icon md-edit' aria-hidden='true'></i>",array('action'=>'edit',$catPersona->id),array('escape'=>false,'class'=>"btn btn-default"));
//                $actions .= $Form->postLink("<i class='icon md-delete' aria-hidden='true'></i>", ['action' => 'delete',$catPersona->id], ['escape'=>false,'class'=>"btn btn-danger",'confirm' => __('Realmente desea eliminar el registro con el Id # {0}?', $catPersona->id)]);
            $actions .="</div>";
		        $aaData[$i][] = $catPersona->nombre;
		        $aaData[$i][] = $catPersona->paterno;
		        $aaData[$i][] = $catPersona->materno;
		        $aaData[$i][] = $catPersona->edad;
		        $aaData[$i][] = $catPersona->sexo;
		        $aaData[$i][] = $catPersona->telefono;
		        $aaData[$i][] = $catPersona->email;
		        $aaData[$i][] = $catPersona->created;
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
    public function index($cat_municipio_id = null ,$cat_cargo_id= null)
    {

        if(!empty($cat_municipio_id) && !empty($cat_cargo_id))
        {
            $catMunicipio = $this->CatPersonas->CatMunicipios->find()->where(['id'=>$cat_municipio_id])->first();
            $catCargo = $this->CatPersonas->CatCargos->find()->where(['id'=>$cat_cargo_id])->first();
            $catColonias = $this->CatPersonas->CatColonias->find('list')->where(['CatColonias.cat_municipio_id'=>$cat_municipio_id]);
            $catMunicipios = $this->CatPersonas->CatMunicipios->find('list');
            $catLocalidades = $this->CatPersonas->CatLocalidades->find('list')->where(['CatLocalidades.cat_municipio_id'=>$cat_municipio_id]);
            $catSecciones = $this->CatPersonas->CatSecciones->find('list')->where(['CatSecciones.cat_municipio_id'=>$cat_municipio_id]);
            $catPersonasPertenece = $this->CatPersonas->find('list')->where(
                [
                    'CatPersonas.cat_cargo_id IN (
                                                                            SELECT
                                                                                cat_cargos_pertenece_id 
                                                                             FROM cat_cargos_cat_cargos_pertenece
                                                                             WHERE cat_cargo_id = "'.$cat_cargo_id.'")',
                    'CatPersonas.cat_municipio_id'=>$cat_municipio_id
                ]
            );
            $catActividades = $this->CatPersonas->CatActividades->find('list');
            $catTemas = $this->CatPersonas->CatTemas->find('list');
            $catOrganizaciones = $this->CatPersonas->CatOrganizaciones->find('list')->where(['CatOrganizaciones.activo'=>1]);
            $catPersona = $this->CatPersonas->newEntity();
            $this->set(compact('catMunicipio','catCargo','catPersona','catColonias','catMunicipios','catSecciones','catPersonasPertenece','catLocalidades','catActividades','catTemas','catOrganizaciones'));
        }else
        {
            return $this->redirect(['controller'=>'gestion_social','action'=>'index']);
        }

    }
    

    /**
     * View method
     *
     * @param string|null $id Cat Persona id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $catPersona = $this->CatPersonas->get($id, [
            'contain' => [
                'CatActividades',
                'OpePersonasRedesSociales'=>['CatRedesSociales'],
                'CatLocalidades',
                'CatColonias',
                'CatSecciones'=>['CatDistritos'],
                'CatTemas'
            ]
        ]);

        $this->set('catPersona', $catPersona);
        $this->set('_serialize', ['catPersona']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $catPersona = $this->CatPersonas->newEntity();
        $cat_cargo_hijo = null;
        $cat_municipio_id = null;
        $action = null;
        if ($this->request->is('post')) 
        {
            //pr( $this->request->data);exit;
            
            if(!empty( $this->request->data['foto']['name']))
            {
                $extension = pathinfo($this->request->data['foto']['name'], PATHINFO_EXTENSION);
                $image_content = file_get_contents($this->request->data['foto']['tmp_name']);
                $image_content = base64_encode($image_content);
                $binaryData = 'data:image/' . $extension . ';base64,' . $image_content;

                $this->request->data['foto'] = $binaryData;
            }
                //pr($this->request->data);exit;
                $catPersona = $this->CatPersonas->patchEntity($catPersona, $this->request->getData());
            $action = $catPersona->action;
                switch ($catPersona->action){
                    case 2: //Lide Municipal
                        $cat_cargo_hijo = "bf294131-c603-47e0-b315-7df7455716a7";
                        $cat_municipio_id = $catPersona->cat_municipio_id;
                        break;
                    case 3:

                        $cat_cargo_hijo = "3b4b8a85-02d8-49e5-94df-64c4247187f8";
                        $cat_municipio_id = $catPersona->cat_municipio_id;
                        break;
                    case 4:
                        $cat_cargo_hijo = "d5dccdef-e6a7-47e7-a50b-d39abaf331c7";
                        $cat_municipio_id = $catPersona->cat_municipio_id;
                        break;
                }

                //pr($catPersona);exit();
            //
                

            if ($this->CatPersonas->save($catPersona)) 
            {
                $this->Flash->flash('Registro guardado', ['params'=>['type'=>'info']]);
                //return $this->redirect(['action' => 'edit',$catPersona->id]);
                if($action != 1){
                    return $this->redirect(['controller'=>'cat_personas','action'=>'index',$cat_municipio_id,$cat_cargo_hijo]);
                }else if($action == 1){
                    return $this->redirect($this->referer());
                }

            }
                return $this->redirect($this->referer());
		
        }
    
        
        
        $catTemas = $this->CatPersonas->CatTemas->find('list', ['limit' => 200]);
        $catColonias = $this->CatPersonas->CatColonias->find('list');
        $catMunicipios = TableRegistry::get('CatMunicipios')->find('list');
        $this->set(compact('catPersona','catMunicipios','catNivelAcademicos', 'catCapacidades', 'catPreparacionAreas', 'catTemas','catColonias'));
        $this->set('_serialize', ['catPersona']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cat Persona id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $catPersona = $this->CatPersonas->get($id, [
            'contain' => ['CatTemas','CatActividades','CatColonias','OpePersonasRedesSociales']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $catPersona = $this->CatPersonas->patchEntity($catPersona, $this->request->getData());

            if ($this->CatPersonas->save($catPersona)) 
            {
            	$this->Flash->flash('Registro actualizado correctamente.', ['params'=>['type'=>'info']]);
                return $this->redirect(['action' => 'index',$catPersona->cat_municipio_id,$catPersona->cat_cargo_id]);
            }
           		$this->Flash->flash('El registro no se pudo actualizar correctamente. Intentelo nuevamente', ['params'=>['type'=>'danger']]);
    }


        $catActividades = $this->CatPersonas->CatActividades->find('list');
        $catMunicipios = TableRegistry::get('CatMunicipios')->find('list');
        $catTemas = $this->CatPersonas->CatTemas->find('list', ['limit' => 200]);
        $catRedesSociales = $this->CatPersonas->OpePersonasRedesSociales->CatRedesSociales->find('list', ['limit' => 200]);
        $catColonias = $this->CatPersonas->CatColonias->find('list')->where(['CatColonias.cat_municipio_id'=>$catPersona->cat_municipio_id]);
        $this->set(compact('catPersona','catPartidosPoliticos','catGradosParticipaciones','catRedesSociales','catColonias','catRangosPersonas','catMunicipios','catLocalidades','catZonasInfluencias','catCausasSociales', 'catActividades','catNivelAcademicos', 'catCapacidades', 'catPreparacionAreas', 'catTemas'));
        $this->set('_serialize', ['catPersona']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cat Persona id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $catPersona = $this->CatPersonas->get($id);
        if ($this->CatPersonas->delete($catPersona)) 
        {
        	$this->Flash->flash('Registro eliminado correctamente.', ['params'=>['type'=>'info']]);
        } 
        else 
        {
			$this->Flash->flash('El registro no pudo ser eliminado. Intentelo nuevamente', ['params'=>['type'=>'danger']]);
        }

        return $this->redirect(['action' => 'index']);
    }
   
    public function getDataListado()
    {
         $aColumns = array
                        (
                        'CatPersonas.nombre',
                        'CatPersonas.paterno',
                        'CatPersonas.materno',
                        'CatPersonas.edad',
                        'CatPersonas.sexo',
                        'CatPersonas.telefono',
                        'CatPersonas.email',
                        'CatPersonas.created'
                        );
        
        $sIndexColumn = "CatPersonas.id";
        
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
        if($this->request->query)
        {
            if($this->request->query['cat_municipio_id'])
            {
                    $this->paginate['conditions'][]['CatPersonas.cat_municipio_id'] = $this->request->query['cat_municipio_id'];
            }
            if($this->request->query['cat_cargo_id'])
            {
                    $this->paginate['conditions'][]['CatPersonas.cat_cargo_id'] = $this->request->query['cat_cargo_id'];
            }
        }
    
        if(!empty($this->paginate['conditions']))
        {
            $query = $this->CatPersonas->find()->where($this->paginate['conditions']);
            
             $this->paginate['contain'] = [];
            $catPersonas = $this->paginate($query);  
        }
        else
        {
        	$this->paginate['contain'] = [];
            
            $catPersonas = $this->paginate('CatPersonas');
        }
        
        //Numero total de registros
        $iTotalDisplayRecords = $this->request->params['paging']['CatPersonas']['count'];

        //Numero de registros encontrados
        $iTotalRecords = $this->request->params['paging']['CatPersonas']['current'];

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
        foreach($catPersonas as $catPersona)
        {

            $actions = "<div class='btn-group' role='group'>";
                $actions .= $Html->link("<i class='icon md-eye' aria-hidden='true'></i>",array('action'=>'view',$catPersona->id),array('escape'=>false,'class'=>"btn btn-default"));
                $actions .= $Html->link("<i class='icon md-edit' aria-hidden='true'></i>",array('action'=>'edit',$catPersona->id),array('escape'=>false,'class'=>"btn btn-default"));
//                $actions .= $Form->postLink("<i class='icon md-delete' aria-hidden='true'></i>", ['action' => 'delete',$catPersona->id], ['escape'=>false,'class'=>"btn btn-danger",'confirm' => __('Realmente desea eliminar el registro con el Id # {0}?', $catPersona->id)]);
            $actions .="</div>";
		        $aaData[$i][] = $catPersona->nombre;
		        $aaData[$i][] = $catPersona->paterno;
		        $aaData[$i][] = $catPersona->materno;
		        $aaData[$i][] = $catPersona->edad;
		        $aaData[$i][] = $catPersona->sexo;
		        $aaData[$i][] = $catPersona->telefono;
		        $aaData[$i][] = $catPersona->email;
		        $aaData[$i][] = $catPersona->created;
	            $aaData[$i][] = $actions;
            $i++;
        }
        //Enviamos y serializamos en JSON todas la variables requeridas por el jquery.dataTable
        $this->set(compact('sEcho','iTotalRecords','iTotalDisplayRecords','aaData'));
        $this->set('_serialize',array('sEcho','iTotalRecords','iTotalDisplayRecords','aaData'));
        $this->set('_jsonp',true);
    }

    public function municipales($id = null)
    {
        $catPersona = $this->CatPersonas->newEntity();
        $catMunicipios = $this->CatPersonas->CatMunicipios->find('list');
        $catLocalidades = $this->CatPersonas->CatLocalidades->find('list');
        $catActividades = $this->CatPersonas->CatActividades->find('list');
        $catTemas = $this->CatPersonas->CatTemas->find('list');
        $catCargo= $this->CatPersonas->CatCargos->find()->where(['CatCargos.id'=>$id])->first();
        $this->set(compact('catMunicipios','catPersona','catLocalidades','catActividades','catTemas','id','catCargo'));
    }

    public function getDataMunicipales()
    {
        $aColumns = array
        (
            'CatPersonas.nombre',
            'CatPersonas.paterno',
            'CatPersonas.materno',
            'CatPersonas.edad',
            'CatPersonas.sexo',
            'CatPersonas.telefono',
            'CatPersonas.email',
            'CatPersonas.created'
        );

        $sIndexColumn = "CatPersonas.id";

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

            $car_cargo_id = $this->request->query['cat_cargo_id'];
                $this->paginate['conditions'][]['CatPersonas.cat_cargo_id'] = $car_cargo_id;


        if(!empty($this->paginate['conditions']))
        {
            $query = $this->CatPersonas->find()->where($this->paginate['conditions']);

            $this->paginate['contain'] = ['CatMunicipios'];
            $catPersonas = $this->paginate($query);
        }
        else
        {
            $this->paginate['contain'] = [];

            $catPersonas = $this->paginate('CatPersonas');
        }

        //Numero total de registros
        $iTotalDisplayRecords = $this->request->params['paging']['CatPersonas']['count'];

        //Numero de registros encontrados
        $iTotalRecords = $this->request->params['paging']['CatPersonas']['current'];

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
        foreach($catPersonas as $catPersona)
        {

            $actions = "<div class='btn-group' role='group'>";
            $actions .= $Html->link("<i class='icon md-eye' aria-hidden='true'></i>",array('action'=>'view_municipal',$catPersona->id),array('escape'=>false,'class'=>"btn btn-default"));
            $actions .= $Html->link("<i class='icon md-edit' aria-hidden='true'></i>",array('action'=>'edit',$catPersona->id),array('escape'=>false,'class'=>"btn btn-default"));
//                $actions .= $Form->postLink("<i class='icon md-delete' aria-hidden='true'></i>", ['action' => 'delete',$catPersona->id], ['escape'=>false,'class'=>"btn btn-danger",'confirm' => __('Realmente desea eliminar el registro con el Id # {0}?', $catPersona->id)]);
            $actions .="</div>";
            $aaData[$i][] = $catPersona->has('cat_municipio')?$catPersona->cat_municipio->name:'';
            $aaData[$i][] = $catPersona->nombre;
            $aaData[$i][] = $catPersona->paterno;
            $aaData[$i][] = $catPersona->materno;
            $aaData[$i][] = $catPersona->edad;
            $aaData[$i][] = $catPersona->sexo;
            $aaData[$i][] = $catPersona->telefono;
            $aaData[$i][] = $catPersona->email;
            $aaData[$i][] = $catPersona->created;
            $aaData[$i][] = $actions;
            $i++;
        }
        //Enviamos y serializamos en JSON todas la variables requeridas por el jquery.dataTable
        $this->set(compact('sEcho','iTotalRecords','iTotalDisplayRecords','aaData'));
        $this->set('_serialize',array('sEcho','iTotalRecords','iTotalDisplayRecords','aaData'));
        $this->set('_jsonp',true);
    }

    public function viewMunicipal($id = null)
    {
        $catPersona = $this->CatPersonas->get($id, [
            'contain' => [
                'CatMunicipios',
                'CatActividades',
                'OpePersonasRedesSociales'=>['CatRedesSociales'],
                'CatLocalidades',
                'CatColonias',
                'CatSecciones'=>['CatDistritos'],
                'CatTemas'
            ]
        ]);

        $this->set('catPersona', $catPersona);
        $this->set('_serialize', ['catPersona']);
    }

    public function registradoClaveElector()
    {
        if($this->request->is('post'))
        {
            $claveElector = $this->request->getData('clave_elector');
            $catPersona = $this->CatPersonas->find()->where(['CatPersonas.ine'=>$claveElector])->first();
        }
        $this->set(compact('catPersona'));
        $this->set('_serialize',['catPersona']);
    }
    
}
