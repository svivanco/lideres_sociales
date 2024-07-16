<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\App;

/**
 * CatCargos Controller
 *
 * @property \App\Model\Table\CatCargosTable $CatCargos
 *
 * @method \App\Model\Entity\CatCargo[] paginate($object = null, array $settings = [])
 */
class GestionSocialController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('CatMunicipios');
        $this->loadModel('CatPersonas');

    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $catPersona = $this->CatPersonas->newEntity();

        $catMunicipios = $this->CatMunicipios->find();
        $catLocalidades = $this->CatPersonas->CatLocalidades->find('list');
        $catActividades = $this->CatPersonas->CatActividades->find('list');
        $catTemas = $this->CatPersonas->CatTemas->find('list');
        $catMunicipiosLista = $this->CatMunicipios->find('list');
        $catDistritosFederales = $this->CatPersonas->CatDistritosFederales->find('list');
        $catCargos = $this->CatPersonas->CatCargos->find('list')->where(['CatCargos.id IN ("b64571ae-4ea5-488b-a022-dd1df1976c89","4e52048b-c814-4d61-977e-31c5b6b7b8ca")']);

        $this->set(compact('catMunicipios','catPersona','catLocalidades','catActividades','catTemas','catMunicipiosLista','catDistritosFederales','catCargos'));
    }


    public function getCargoDistritales()
    {
        if($this->request->is('post'))
        {
            $cat_municipio_id = $this->request->getData('cat_municipio_id');
           /* $catDistritales = $this->CatPersonas->find('list')->where(
                [
                    'CatPersonas.cat_cargo_id'=>"b64571ae-4ea5-488b-a022-dd1df1976c89",
                    'CatPersonas.cat_municipio_id'=> $cat_municipio_id
                ]
            );*/
            $catDistritales = $this->CatPersonas->find('list')
                ->where(
                    [
                        'CatPersonas.cat_distritos_federale_id IN (SELECT cat_distritos_federale_id FROM  cat_distritos_federales_cat_municipios WHERE cat_municipio_id = "'.$cat_municipio_id.'")'
                    ]
                );
        }

        $this->set(compact('catDistritales'));
        $this->set('_serialize',['catDistritales']);
    }
    
   
}
