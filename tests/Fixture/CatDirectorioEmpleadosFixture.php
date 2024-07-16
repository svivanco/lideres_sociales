<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CatDirectorioEmpleadosFixture
 *
 */
class CatDirectorioEmpleadosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'cat_tipos_directorio_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cat_empleado_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'numero' => ['type' => 'string', 'length' => 15, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'activo' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_cat_directorio_empleados_cat_tipos_directorios1_idx' => ['type' => 'index', 'columns' => ['cat_tipos_directorio_id'], 'length' => []],
            'fk_cat_directorio_empleados_cat_empleados1_idx' => ['type' => 'index', 'columns' => ['cat_empleado_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_cat_directorio_empleados_cat_empleados1' => ['type' => 'foreign', 'columns' => ['cat_empleado_id'], 'references' => ['cat_empleados', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_cat_directorio_empleados_cat_tipos_directorios1' => ['type' => 'foreign', 'columns' => ['cat_tipos_directorio_id'], 'references' => ['cat_tipos_directorios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'cat_tipos_directorio_id' => 1,
            'cat_empleado_id' => 'eb2dd242-8eba-4ae6-8257-eedbd0cfeecd',
            'numero' => 'Lorem ipsum d',
            'activo' => 1,
            'created' => '2017-10-12 23:04:49',
            'modified' => '2017-10-12 23:04:49'
        ],
    ];
}
