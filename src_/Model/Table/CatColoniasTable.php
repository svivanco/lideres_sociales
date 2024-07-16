<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CatColonias Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CatEstados
 * @property \Cake\ORM\Association\BelongsTo $CatMunicipios
 * @property \Cake\ORM\Association\HasMany $CatPersonas
 * @property \Cake\ORM\Association\BelongsToMany $CatPersonas
 *
 * @method \App\Model\Entity\CatColonia get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatColonia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatColonia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatColonia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatColonia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatColonia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatColonia findOrCreate($search, callable $callback = null, $options = [])
 */
class CatColoniasTable extends Table
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

        $this->setTable('cat_colonias');
        $this->setDisplayField('name_completo');
        $this->setPrimaryKey('id');

        $this->belongsTo('CatEstados', [
            'foreignKey' => 'cat_estado_id'
        ]);
        $this->belongsTo('CatMunicipios', [
            'foreignKey' => 'cat_municipio_id'
        ]);
        $this->hasMany('CatPersonas', [
            'foreignKey' => 'cat_colonia_id'
        ]);
        $this->belongsToMany('CatPersonas', [
            'foreignKey' => 'cat_colonia_id',
            'targetForeignKey' => 'cat_persona_id',
            'joinTable' => 'cat_personas_cat_colonias'
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
            ->integer('codigo_postal')
            ->allowEmpty('codigo_postal');

        $validator
            ->allowEmpty('ciudad');

        $validator
            ->allowEmpty('tipo_asentamiento');

        $validator
            ->allowEmpty('asentamiento');

        $validator
            ->allowEmpty('clave_oficina');

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
        $rules->add($rules->existsIn(['cat_estado_id'], 'CatEstados'));
        $rules->add($rules->existsIn(['cat_municipio_id'], 'CatMunicipios'));

        return $rules;
    }
}
