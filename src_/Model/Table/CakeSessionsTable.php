<?php
namespace App\Model\Table;

use App\Model\Entity\CakeSession;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;   
use Cake\Controller\Controller;

/**
 * Sessions Model
 *
 */
class CakeSessionsTable extends Table
{
    

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('sessions');
        $this->displayField('id');
        $this->primaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('id', 'create');
        
        $validator
            ->allowEmpty('co_usuario_id');

        $validator
            ->allowEmpty('data');

        $validator
            ->integer('expires')
            ->allowEmpty('expires');

        return $validator;
    }
    
    public function beforeSave($event,$entity,$options)
    {
        if(isset($_SESSION['Auth']['User']['id']))
        {
            $entity->co_usuario_id = $_SESSION['Auth']['User']['id'];
            $entity->direccion = $_SERVER['REMOTE_ADDR'];
            $entity->navegador = $_SERVER['HTTP_USER_AGENT'];
            $entity->fecha = date('Y-m-d h:i:s');
        }
    }
}
