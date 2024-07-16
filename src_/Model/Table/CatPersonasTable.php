<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CatPersonas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CatMunicipios
 * @property \Cake\ORM\Association\BelongsTo $CatLocalidades
 * @property \Cake\ORM\Association\BelongsTo $CatColonias
 * @property \Cake\ORM\Association\BelongsTo $CatSecciones
 * @property \Cake\ORM\Association\BelongsTo $CatCargos
 * @property \Cake\ORM\Association\HasMany $OpePersonasRedesSociales
 * @property \Cake\ORM\Association\BelongsToMany $CatActividades
 * @property \Cake\ORM\Association\BelongsToMany $CatTemas
 *
 * @method \App\Model\Entity\CatPersona get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatPersona newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatPersona[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatPersona|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatPersona patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatPersona[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatPersona findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CatPersonasTable extends Table
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

        $this->setTable('cat_personas');
        $this->setDisplayField('nombre_completo');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CatMunicipios', [
            'foreignKey' => 'cat_municipio_id'
        ]);
        $this->belongsTo('CatLocalidades', [
            'foreignKey' => 'cat_localidade_id'
        ]);
        $this->belongsTo('CatColonias', [
            'foreignKey' => 'cat_colonia_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CatSecciones', [
            'foreignKey' => 'cat_seccione_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CatCargos', [
            'foreignKey' => 'cat_cargo_id'
        ]);
        $this->belongsTo('CatOrganizaciones',
            ['foreingKey'=>'cat_organizacione_id']
        );
        $this->hasMany('OpePersonasRedesSociales', [
            'foreignKey' => 'cat_persona_id'
        ]);
        $this->belongsToMany('CatActividades', [
            'foreignKey' => 'cat_persona_id',
            'targetForeignKey' => 'cat_actividade_id',
            'joinTable' => 'cat_personas_cat_actividades'
        ]);
        $this->belongsToMany('CatTemas', [
            'foreignKey' => 'cat_persona_id',
            'targetForeignKey' => 'cat_tema_id',
            'joinTable' => 'cat_personas_cat_temas'
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
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->requirePresence('paterno', 'create')
            ->notEmpty('paterno');

        $validator
            ->requirePresence('materno', 'create')
            ->notEmpty('materno');

        $validator
            ->requirePresence('sexo', 'create')
            ->notEmpty('sexo');

        $validator
            ->allowEmpty('telefono');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('red_social');

        $validator
            ->allowEmpty('tiempo_residencia');

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
        //$rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['cat_municipio_id'], 'CatMunicipios'));
        $rules->add($rules->existsIn(['cat_localidade_id'], 'CatLocalidades'));
        $rules->add($rules->existsIn(['cat_colonias_id'], 'CatColonias'));
        $rules->add($rules->existsIn(['cat_seccione_id'], 'CatSecciones'));
        $rules->add($rules->existsIn(['cat_cargo_id'], 'CatCargos'));

        return $rules;
    }
}
