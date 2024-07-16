<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CatCargos Model
 *
 * @property \Cake\ORM\Association\HasMany $CatPersonas
 *
 * @method \App\Model\Entity\CatCargo get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatCargo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatCargo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatCargo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatCargo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatCargo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatCargo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CatCargosTable extends Table
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

        $this->setTable('cat_cargos');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CatPersonas', [
            'foreignKey' => 'cat_cargo_id'
        ]);
        $this->belongsToMany('CatCargosPertenece',
            [
                'className'=>'CatCargos',
                'foreingKey'=>'cat_cargo_id',
                'targetForeingKey'=>'cat_cargos_pertenece_id',
                'joinTable'=>'cat_cargos_cat_cargos_pertenece'
            ]
        );
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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->boolean('activo')
            ->allowEmpty('activo');

        return $validator;
    }
}
