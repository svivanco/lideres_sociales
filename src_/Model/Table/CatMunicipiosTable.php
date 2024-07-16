<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\ORM\Entity;


/**
 * CatMunicipios Model
 *
 * @property \Cake\ORM\Association\HasMany $CatLocalidades
 * @property \Cake\ORM\Association\HasMany $CatPersonas
 * @property \Cake\ORM\Association\HasMany $CatUnidades
 *
 * @method \App\Model\Entity\CatMunicipio get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatMunicipio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatMunicipio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatMunicipio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatMunicipio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatMunicipio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatMunicipio findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CatMunicipiosTable extends Table
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

        $this->setTable('cat_municipios');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CatEstados', [
            'foreignKey' => 'cat_estado_id'
        ]);
        $this->hasMany('CatLocalidades', [
            'foreignKey' => 'cat_municipio_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('cat_estado_id');

        return $validator;
    }

    public function beforeSave(Event $event, Entity $entity)
    {
      $entity->name = mb_strtoupper($entity->name,'utf-8');
    }
}
