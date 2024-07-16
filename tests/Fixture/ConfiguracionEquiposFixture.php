<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConfiguracionEquiposFixture
 *
 */
class ConfiguracionEquiposFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'cat_equipo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cat_tipos_equipo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'abreviatura' => ['type' => 'string', 'length' => 5, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_configuracion_equipos_cat_equipos1_idx' => ['type' => 'index', 'columns' => ['cat_equipo_id'], 'length' => []],
            'fk_configuracion_equipos_cat_tipos_equipos1_idx' => ['type' => 'index', 'columns' => ['cat_tipos_equipo_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_configuracion_equipos_cat_equipos1' => ['type' => 'foreign', 'columns' => ['cat_equipo_id'], 'references' => ['cat_equipos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_configuracion_equipos_cat_tipos_equipos1' => ['type' => 'foreign', 'columns' => ['cat_tipos_equipo_id'], 'references' => ['cat_tipos_equipos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'cat_equipo_id' => 1,
            'cat_tipos_equipo_id' => 1,
            'abreviatura' => 'Lor',
            'created' => '2017-09-04 19:29:37',
            'modified' => '2017-09-04 19:29:37'
        ],
    ];
}
