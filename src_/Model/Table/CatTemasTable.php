<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CatTemas Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $CatPersonas
 *
 * @method \App\Model\Entity\CatTema get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatTema newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatTema[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatTema|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatTema patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatTema[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatTema findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CatTemasTable extends Table
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

        $this->setTable('cat_temas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('CatPersonas', [
            'foreignKey' => 'cat_tema_id',
            'targetForeignKey' => 'cat_persona_id',
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->boolean('activo')
            ->allowEmpty('activo');

        return $validator;
    }
}
