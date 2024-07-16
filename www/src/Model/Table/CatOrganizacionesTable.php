<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CatOrganizaciones Model
 *
 * @property \Cake\ORM\Association\HasMany $CatPersonas
 *
 * @method \App\Model\Entity\CatOrganizacione get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatOrganizacione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatOrganizacione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatOrganizacione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatOrganizacione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatOrganizacione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatOrganizacione findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CatOrganizacionesTable extends Table
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

        $this->setTable('cat_organizaciones');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CatPersonas', [
            'foreignKey' => 'cat_organizacione_id'
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
