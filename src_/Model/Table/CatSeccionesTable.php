<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CatSecciones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CatMunicipios
 * @property \Cake\ORM\Association\BelongsTo $CatDistritos
 * @property \Cake\ORM\Association\HasMany $CatPersonas
 *
 * @method \App\Model\Entity\CatSeccione get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatSeccione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatSeccione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatSeccione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatSeccione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatSeccione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatSeccione findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CatSeccionesTable extends Table
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

        $this->setTable('cat_secciones');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CatMunicipios', [
            'foreignKey' => 'cat_municipio_id'
        ]);
        $this->belongsTo('CatDistritos', [
            'foreignKey' => 'cat_distrito_id'
        ]);
        $this->hasMany('CatPersonas', [
            'foreignKey' => 'cat_seccione_id'
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['cat_municipio_id'], 'CatMunicipios'));
        $rules->add($rules->existsIn(['cat_distrito_id'], 'CatDistritos'));

        return $rules;
    }
}
