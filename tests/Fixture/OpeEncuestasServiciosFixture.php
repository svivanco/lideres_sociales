<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OpeEncuestasServiciosFixture
 *
 */
class OpeEncuestasServiciosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'ope_servicio_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'co_usuario_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'configuracion_encuesta_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'calificacion' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_ope_encuestas_servicios_configuracion_encuestas1_idx' => ['type' => 'index', 'columns' => ['configuracion_encuesta_id'], 'length' => []],
            'fk_ope_encuestas_servicios_ope_servicios1_idx' => ['type' => 'index', 'columns' => ['ope_servicio_id'], 'length' => []],
            'fk_ope_encuestas_servicios_co_usuarios1_idx' => ['type' => 'index', 'columns' => ['co_usuario_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_ope_encuestas_servicios_co_usuarios1' => ['type' => 'foreign', 'columns' => ['co_usuario_id'], 'references' => ['co_usuarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_encuestas_servicios_configuracion_encuestas1' => ['type' => 'foreign', 'columns' => ['configuracion_encuesta_id'], 'references' => ['configuracion_encuestas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_encuestas_servicios_ope_servicios1' => ['type' => 'foreign', 'columns' => ['ope_servicio_id'], 'references' => ['ope_servicios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'ope_servicio_id' => 'ded46e0c-d204-4293-aa20-1be815d8dfd4',
            'co_usuario_id' => 1,
            'configuracion_encuesta_id' => 1,
            'calificacion' => 1,
            'created' => '2017-10-12 17:57:34',
            'modified' => '2017-10-12 17:57:34'
        ],
    ];
}
