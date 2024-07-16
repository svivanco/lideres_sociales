<?php
namespace App\Model\Table;

use App\Model\Entity\CoGruposCoMenu;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CoGruposCoMenus Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CoGrupos
 * @property \Cake\ORM\Association\BelongsTo $CoMenus
 */
class CoGruposCoMenusTable extends Table
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

        $this->table('co_grupos_co_menus');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('CoGrupos', [
            'foreignKey' => 'co_grupo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CoMenus', [
            'foreignKey' => 'co_menu_id',
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
        $rules->add($rules->existsIn(['co_grupo_id'], 'CoGrupos'));
        $rules->add($rules->existsIn(['co_menu_id'], 'CoMenus'));
        return $rules;
    }
}
