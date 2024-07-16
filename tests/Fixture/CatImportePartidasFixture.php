<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CatImportePartidasFixture
 *
 */
class CatImportePartidasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_puesto_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_partida_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'importe' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_table1_cat_puestos1_idx' => ['type' => 'index', 'columns' => ['cat_puesto_id'], 'length' => []],
            'fk_table1_cat_partidas1_idx' => ['type' => 'index', 'columns' => ['cat_partida_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_table1_cat_partidas1' => ['type' => 'foreign', 'columns' => ['cat_partida_id'], 'references' => ['cat_partidas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_table1_cat_puestos1' => ['type' => 'foreign', 'columns' => ['cat_puesto_id'], 'references' => ['cat_puestos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => '044b188c-37f7-4457-ba5a-f1114fd16f75',
            'cat_puesto_id' => '29155465-6920-4bb4-8711-709854531bdb',
            'cat_partida_id' => '6c63e262-3fe8-4543-8173-a5a6651cfa22',
            'importe' => 1,
            'created' => '2017-07-11 02:44:30',
            'modified' => '2017-07-11 02:44:30'
        ],
    ];
}
