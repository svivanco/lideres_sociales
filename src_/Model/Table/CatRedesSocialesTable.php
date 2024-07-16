<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CatRedesSociales Model
 *
 * @property \Cake\ORM\Association\HasMany $OpePersonasRedesSociales
 *
 * @method \App\Model\Entity\CatRedesSociale get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatRedesSociale newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatRedesSociale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatRedesSociale|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatRedesSociale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatRedesSociale[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatRedesSociale findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CatRedesSocialesTable extends Table
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

        $this->setTable('cat_redes_sociales');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('OpePersonasRedesSociales', [
            'foreignKey' => 'cat_redes_sociale_id'
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
