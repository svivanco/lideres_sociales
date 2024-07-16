<?php
namespace App\Model\Table;

use App\Model\Entity\CoGrupo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CoGrupos Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $CoMenus
 * @property \Cake\ORM\Association\BelongsToMany $CoPermisos
 * @property \Cake\ORM\Association\BelongsToMany $CoUsuarios
 */
class CoGruposTable extends Table
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

        $this->table('co_grupos');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('CoMenus', [
            'foreignKey' => 'co_grupo_id',
            'targetForeignKey' => 'co_menu_id',
            'joinTable' => 'co_grupos_co_menus'
        ]);
        $this->belongsToMany('CoPermisos', [
            'foreignKey' => 'co_grupo_id',
            'targetForeignKey' => 'co_permiso_id',
            'joinTable' => 'co_grupos_co_permisos'
        ]);
        $this->belongsToMany('CoUsuarios', [
            'foreignKey' => 'co_grupo_id',
            'targetForeignKey' => 'co_usuario_id',
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('pagina_inicial');

        $validator
            ->boolean('activo')
            ->allowEmpty('activo');

        return $validator;
    }
}
