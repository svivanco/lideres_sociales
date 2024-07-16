<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConfiguracionSistemasOperativosFixture
 *
 */
class ConfiguracionSistemasOperativosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'cat_sistemas_operativo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cat_versione_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cat_arquitectura_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_configuracion_sistemas_operativos_cat_versiones1_idx' => ['type' => 'index', 'columns' => ['cat_versione_id'], 'length' => []],
            'fk_configuracion_sistemas_operativos_cat_sistemas_operativo_idx' => ['type' => 'index', 'columns' => ['cat_sistemas_operativo_id'], 'length' => []],
            'fk_configuracion_sistemas_operativos_cat_arquitecturas1_idx' => ['type' => 'index', 'columns' => ['cat_arquitectura_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_configuracion_sistemas_operativos_cat_arquitecturas1' => ['type' => 'foreign', 'columns' => ['cat_arquitectura_id'], 'references' => ['cat_arquitecturas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_configuracion_sistemas_operativos_cat_sistemas_operativos1' => ['type' => 'foreign', 'columns' => ['cat_sistemas_operativo_id'], 'references' => ['cat_sistemas_operativos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_configuracion_sistemas_operativos_cat_versiones1' => ['type' => 'foreign', 'columns' => ['cat_versione_id'], 'references' => ['cat_versiones', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'cat_sistemas_operativo_id' => 1,
            'cat_versione_id' => 1,
            'cat_arquitectura_id' => 1,
            'created' => '2017-09-04 19:29:53',
            'modified' => '2017-09-04 19:29:53'
        ],
    ];
}
