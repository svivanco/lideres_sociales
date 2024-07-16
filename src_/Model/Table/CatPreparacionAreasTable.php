<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CatPreparacionAreas Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $CatPersonas
 *
 * @method \App\Model\Entity\CatPreparacionArea get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatPreparacionArea newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatPreparacionArea[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatPreparacionArea|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatPreparacionArea patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatPreparacionArea[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatPreparacionArea findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CatPreparacionAreasTable extends Table
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

        $this->setTable('cat_preparacion_areas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('CatPersonas', [
            'foreignKey' => 'cat_preparacion_area_id',
            'targetForeignKey' => 'cat_persona_id',
            'joinTable' => 'cat_personas_cat_preparacion_areas'
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
