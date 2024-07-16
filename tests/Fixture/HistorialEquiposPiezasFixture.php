<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HistorialEquiposPiezasFixture
 *
 */
class HistorialEquiposPiezasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'ope_inventario_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cat_pieza_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cat_tipo_pieza_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_historial_equipos_piezas_ope_inventarios1_idx' => ['type' => 'index', 'columns' => ['ope_inventario_id'], 'length' => []],
            'fk_historial_equipos_piezas_cat_piezas1_idx' => ['type' => 'index', 'columns' => ['cat_pieza_id'], 'length' => []],
            'fk_historial_equipos_piezas_cat_tipo_piezas1_idx' => ['type' => 'index', 'columns' => ['cat_tipo_pieza_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_historial_equipos_piezas_cat_piezas1' => ['type' => 'foreign', 'columns' => ['cat_pieza_id'], 'references' => ['cat_piezas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_historial_equipos_piezas_cat_tipo_piezas1' => ['type' => 'foreign', 'columns' => ['cat_tipo_pieza_id'], 'references' => ['cat_tipo_piezas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_historial_equipos_piezas_ope_inventarios1' => ['type' => 'foreign', 'columns' => ['ope_inventario_id'], 'references' => ['ope_inventarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
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
            'id' => 1,
            'ope_inventario_id' => 1,
            'cat_pieza_id' => 1,
            'cat_tipo_pieza_id' => 1,
            'created' => '2017-09-18 21:33:33',
            'modified' => '2017-09-18 21:33:33'
        ],
    ];
}
