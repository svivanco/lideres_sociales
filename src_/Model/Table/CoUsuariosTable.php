<?php
namespace App\Model\Table;

use App\Model\Entity\CoUsuario;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CoUsuarios Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $CoGrupos
 */
class CoUsuariosTable extends Table
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

        $this->table('co_usuarios');
        $this->displayField('nombre_completo');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->belongsToMany('CoGrupos', [
            'foreignKey' => 'co_usuario_id',
            'targetForeignKey' => 'co_grupo_id',
            'joinTable' => 'co_usuarios_co_grupos'
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
            ->notEmpty('nombre');
        $validator
            ->notEmpty('paterno');
        $validator
            ->notEmpty('materno');
        $validator
            ->notEmpty('login')
            ->add('login', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('password');

        $validator
            ->boolean('activo')
            ->allowEmpty('activo');

        $validator
            ->dateTime('ultimo_acceso')
            ->allowEmpty('ultimo_acceso');

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
//        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['login']));
       // $rules->add($rules->existsIn(['cat_tipos_integrante_id'], 'CatTiposIntegrantes'));
//        $rules->add($rules->existsIn(['cat_niveles_puesto_id'], 'CatNivelesPuestos'));
//        $rules->add($rules->existsIn(['cat_puesto_id'], 'CatPuestos'));
//        $rules->add($rules->existsIn(['cat_cargo_id'], 'CatCargos'));
//        $rules->add($rules->existsIn(['cat_area_id'], 'CatAreas'));
        return $rules;
    }
}
