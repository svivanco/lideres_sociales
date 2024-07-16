<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OpePersonasRedesSociales Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CatPersonas
 * @property \Cake\ORM\Association\BelongsTo $CatRedesSociales
 *
 * @method \App\Model\Entity\OpePersonasRedesSociale get($primaryKey, $options = [])
 * @method \App\Model\Entity\OpePersonasRedesSociale newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OpePersonasRedesSociale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OpePersonasRedesSociale|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OpePersonasRedesSociale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OpePersonasRedesSociale[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OpePersonasRedesSociale findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OpePersonasRedesSocialesTable extends Table
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

        $this->setTable('ope_personas_redes_sociales');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CatPersonas', [
            'foreignKey' => 'cat_persona_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CatRedesSociales', [
            'foreignKey' => 'cat_redes_sociale_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('enlace');

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
        $rules->add($rules->existsIn(['cat_persona_id'], 'CatPersonas'));
        $rules->add($rules->existsIn(['cat_redes_sociale_id'], 'CatRedesSociales'));

        return $rules;
    }
}
