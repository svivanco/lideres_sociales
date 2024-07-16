<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\ORM\Entity;

/**
 * CatLocalidades Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CatMunicipios
 * @property \Cake\ORM\Association\HasMany $CatPersonas
 *
 * @method \App\Model\Entity\CatLocalidade get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatLocalidade newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatLocalidade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatLocalidade|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatLocalidade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatLocalidade[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatLocalidade findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CatLocalidadesTable extends Table
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

        $this->setTable('cat_localidades');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CatMunicipios', [
            'foreignKey' => 'cat_municipio_id',
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('clave');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('latitud');

        $validator
            ->allowEmpty('longitud');

        $validator
            ->decimal('lat')
            ->allowEmpty('lat');

        $validator
            ->decimal('lng')
            ->allowEmpty('lng');

        $validator
            ->allowEmpty('altitud');

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

        return $rules;
    }

    public function beforeSave(Event $event, Entity $entity)
    {
      $entity->name = mb_strtoupper($entity->name,'utf-8');
    }
}
