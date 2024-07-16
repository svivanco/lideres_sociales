<?php
namespace App\Model\Table;

use App\Model\Entity\CoPermiso;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CoPermisos Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $CoGrupos
 */
class CoPermisosTable extends Table
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

        $this->table('co_permisos');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('CoGrupos', [
            'foreignKey' => 'co_permiso_id',
            'targetForeignKey' => 'co_grupo_id',
            'joinTable' => 'co_grupos_co_permisos'
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
            // ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->notEmpty('name');

        $validator
            ->allowEmpty('descripcion');

        $validator
            ->notEmpty('controller');

        $validator
            ->notEmpty('action');

        $validator
            ->boolean('activo')
            ->allowEmpty('activo');

        return $validator;
    }
}
