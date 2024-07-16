<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CatDistritosFederales Model
 *
 * @property \Cake\ORM\Association\HasMany $CatSecciones
 * @property \Cake\ORM\Association\BelongsToMany $CatMunicipios
 *
 * @method \App\Model\Entity\CatDistritosFederale get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatDistritosFederale newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatDistritosFederale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatDistritosFederale|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatDistritosFederale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatDistritosFederale[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatDistritosFederale findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CatDistritosFederalesTable extends Table
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

        $this->setTable('cat_distritos_federales');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CatSecciones', [
            'foreignKey' => 'cat_distritos_federale_id'
        ]);
        $this->belongsToMany('CatMunicipios', [
            'foreignKey' => 'cat_distritos_federale_id',
            'targetForeignKey' => 'cat_municipio_id',
            'joinTable' => 'cat_distritos_federales_cat_municipios'
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

        return $validator;
    }
}
