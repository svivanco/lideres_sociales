<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OpeEnfermedadesPersonasFixture
 *
 */
class OpeEnfermedadesPersonasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'co_usuario_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_persona_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_enfermedade_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_ope_enfermedades_personas_cat_personas1_idx' => ['type' => 'index', 'columns' => ['cat_persona_id'], 'length' => []],
            'fk_ope_enfermedades_personas_co_usuarios1_idx' => ['type' => 'index', 'columns' => ['co_usuario_id'], 'length' => []],
            'fk_ope_enfermedades_personas_cat_enfermedades1_idx' => ['type' => 'index', 'columns' => ['cat_enfermedade_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_ope_enfermedades_personas_cat_enfermedades1' => ['type' => 'foreign', 'columns' => ['cat_enfermedade_id'], 'references' => ['cat_enfermedades', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_enfermedades_personas_cat_personas1' => ['type' => 'foreign', 'columns' => ['cat_persona_id'], 'references' => ['cat_personas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_enfermedades_personas_co_usuarios1' => ['type' => 'foreign', 'columns' => ['co_usuario_id'], 'references' => ['co_usuarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => '346a62af-5bd5-4839-8e4e-a699a43f400e',
            'co_usuario_id' => 'f524e953-6264-4702-9e30-d467f24e7e1d',
            'cat_persona_id' => '843355f7-1904-4d50-bbb2-399bdf26ae66',
            'cat_enfermedade_id' => '0b6926bd-34b9-46a0-8492-6e3ad122246c',
            'created' => '2017-12-24 08:16:21',
            'modified' => '2017-12-24 08:16:21'
        ],
    ];
}
