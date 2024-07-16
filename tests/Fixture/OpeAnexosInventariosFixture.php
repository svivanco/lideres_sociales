<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OpeAnexosInventariosFixture
 *
 */
class OpeAnexosInventariosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ope_inventario_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'historial_equipos_pieza_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'exp_ope_inventario_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'baja' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'img' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'dir' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'size' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'type' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_ope_anexos_inventarios_exp_ope_inventarios1_idx' => ['type' => 'index', 'columns' => ['exp_ope_inventario_id'], 'length' => []],
            'fk_ope_anexos_inventarios_historial_equipos_piezas1_idx' => ['type' => 'index', 'columns' => ['historial_equipos_pieza_id'], 'length' => []],
            'fk_ope_anexos_inventarios_ope_inventarios1_idx' => ['type' => 'index', 'columns' => ['ope_inventario_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_ope_anexos_inventarios_exp_ope_inventarios1' => ['type' => 'foreign', 'columns' => ['exp_ope_inventario_id'], 'references' => ['exp_ope_inventarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_anexos_inventarios_historial_equipos_piezas1' => ['type' => 'foreign', 'columns' => ['historial_equipos_pieza_id'], 'references' => ['historial_equipos_piezas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_anexos_inventarios_ope_inventarios1' => ['type' => 'foreign', 'columns' => ['ope_inventario_id'], 'references' => ['ope_inventarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => 1,
            'ope_inventario_id' => 'b372e835-b393-401f-bb0f-4783d6d8d225',
            'historial_equipos_pieza_id' => 1,
            'exp_ope_inventario_id' => 1,
            'baja' => 1,
            'img' => 'Lorem ipsum dolor sit amet',
            'dir' => 'Lorem ipsum dolor sit amet',
            'size' => 1,
            'type' => 'Lorem ipsum dolor sit amet',
            'created' => '2017-10-12 16:27:39',
            'modified' => '2017-10-12 16:27:39'
        ],
    ];
}
