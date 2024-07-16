<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CatEstados Model
 *
 * @property \Cake\ORM\Association\HasMany $CatMunicipios
 *
 * @method \App\Model\Entity\CatEstado get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatEstado newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatEstado[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatEstado|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatEstado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatEstado[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatEstado findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CatEstadosTable extends Table
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

        $this->setTable('cat_estados');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CatMunicipios', [
            'foreignKey' => 'cat_estado_id'
        ]);
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('abreviatura');

        $validator
            ->boolean('activo')
            ->allowEmpty('activo');

        return $validator;
    }
}
