<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CatFolios Model
 *
 * @method \App\Model\Entity\CatFolio get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatFolio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatFolio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatFolio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatFolio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatFolio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatFolio findOrCreate($search, callable $callback = null, $options = [])
 */
class CatFoliosTable extends Table
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

        $this->setTable('cat_folios');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('folio')
            ->requirePresence('folio', 'create')
            ->notEmpty('folio');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
