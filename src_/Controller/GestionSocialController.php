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
        $this->set(compact('catMunicipios','catPersona','catLocalidades','catActividades','catTemas','catMunicipiosLista'));
    }

    
   
}
