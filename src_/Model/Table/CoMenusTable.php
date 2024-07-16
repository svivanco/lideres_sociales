<?php
namespace App\Model\Table;

use App\Model\Entity\CoMenu;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CoMenus Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CoMenus
 * @property \Cake\ORM\Association\HasMany $CoMenus
 * @property \Cake\ORM\Association\BelongsToMany $CoGrupos
 */
class CoMenusTable extends Table
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

        $this->table('co_menus');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MenuPadre', [
            'foreignKey' => 'co_menu_id',
            'className'=>'CoMenus'
        ]);
        $this->hasMany('MenusHijos', [
            'foreignKey' => 'co_menu_id',
            'className'=>'CoMenus'
        ]);
        $this->belongsToMany('CoGrupos', [
            'foreignKey' => 'co_menu_id',
            'targetForeignKey' => 'co_grupo_id',
            'joinTable' => 'co_grupos_co_menus'
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('destino');

        $validator
            ->integer('posicion')
            ->allowEmpty('posicion');

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
        // $rules->add($rules->existsIn(['co_menu_id'], 'CoMenus'));
        return $rules;
    }
}
