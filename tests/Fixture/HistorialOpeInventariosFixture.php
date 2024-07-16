<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HistorialOpeInventariosFixture
 *
 */
class HistorialOpeInventariosFixture extends TestFixture
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
        'nomenclatura' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cat_empleado_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cat_unidade_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'co_usuario_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_historial_ope_inventarios_ope_inventarios1_idx' => ['type' => 'index', 'columns' => ['ope_inventario_id'], 'length' => []],
            'fk_historial_ope_inventarios_cat_empleados1_idx' => ['type' => 'index', 'columns' => ['cat_empleado_id'], 'length' => []],
            'fk_historial_ope_inventarios_cat_unidades1_idx' => ['type' => 'index', 'columns' => ['cat_unidade_id'], 'length' => []],
            'fk_historial_ope_inventarios_co_usuarios1_idx' => ['type' => 'index', 'columns' => ['co_usuario_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_historial_ope_inventarios_cat_empleados1' => ['type' => 'foreign', 'columns' => ['cat_empleado_id'], 'references' => ['cat_empleados', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_historial_ope_inventarios_cat_unidades1' => ['type' => 'foreign', 'columns' => ['cat_unidade_id'], 'references' => ['cat_unidades', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_historial_ope_inventarios_co_usuarios1' => ['type' => 'foreign', 'columns' => ['co_usuario_id'], 'references' => ['co_usuarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_historial_ope_inventarios_ope_inventarios1' => ['type' => 'foreign', 'columns' => ['ope_inventario_id'], 'references' => ['ope_inventarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'nomenclatura' => 'Lorem ipsum dolor ',
            'cat_empleado_id' => 1,
            'cat_unidade_id' => 1,
            'co_usuario_id' => 1,
            'created' => '2017-09-11 17:56:16',
            'modified' => '2017-09-11 17:56:16'
        ],
    ];
}
