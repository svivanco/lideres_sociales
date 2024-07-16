<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OpeCargosPartidasFixture
 *
 */
class OpeCargosPartidasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'ope_viatico_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_partida_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'total' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_ope_cargos_partidas_ope_viaticos1_idx' => ['type' => 'index', 'columns' => ['ope_viatico_id'], 'length' => []],
            'fk_ope_cargos_partidas_cat_partidas1_idx' => ['type' => 'index', 'columns' => ['cat_partida_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_ope_cargos_partidas_cat_partidas1' => ['type' => 'foreign', 'columns' => ['cat_partida_id'], 'references' => ['cat_partidas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_cargos_partidas_ope_viaticos1' => ['type' => 'foreign', 'columns' => ['ope_viatico_id'], 'references' => ['ope_viaticos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_spanish_ci'
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
            'id' => '2d6c4a63-784d-4c10-86cc-ab5b968ce9b9',
            'ope_viatico_id' => '9c9b1e3d-7a7c-4c5c-bb15-2f18a850b5db',
            'cat_partida_id' => 'a9a44de2-7652-431f-8a6f-200d1f9ad646',
            'total' => 1,
            'created' => '2017-06-11 02:56:54',
            'modified' => '2017-06-11 02:56:54'
        ],
    ];
}
