<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OpeVisitasFixture
 *
 */
class OpeVisitasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_persona_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_unidade_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_calificaciones_servicio_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_calificaciones_servicios_recibido_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'co_usuario_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'resolucion_asunto' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '1', 'comment' => '', 'precision' => null],
        'motivo_resolucion' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'fecha' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'observacion' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_ope_visitas_cat_calificaciones_servicios1_idx' => ['type' => 'index', 'columns' => ['cat_calificaciones_servicio_id'], 'length' => []],
            'fk_ope_visitas_cat_calificaciones_servicios2_idx' => ['type' => 'index', 'columns' => ['cat_calificaciones_servicios_recibido_id'], 'length' => []],
            'fk_ope_visitas_cat_unidades1_idx' => ['type' => 'index', 'columns' => ['cat_unidade_id'], 'length' => []],
            'fk_ope_visitas_co_usuarios1_idx' => ['type' => 'index', 'columns' => ['co_usuario_id'], 'length' => []],
            'fk_ope_visitas_cat_personas1_idx' => ['type' => 'index', 'columns' => ['cat_persona_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_ope_visitas_cat_calificaciones_servicios1' => ['type' => 'foreign', 'columns' => ['cat_calificaciones_servicio_id'], 'references' => ['cat_calificaciones_servicios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_visitas_cat_calificaciones_servicios2' => ['type' => 'foreign', 'columns' => ['cat_calificaciones_servicios_recibido_id'], 'references' => ['cat_calificaciones_servicios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_visitas_cat_personas1' => ['type' => 'foreign', 'columns' => ['cat_persona_id'], 'references' => ['cat_personas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_visitas_cat_unidades1' => ['type' => 'foreign', 'columns' => ['cat_unidade_id'], 'references' => ['cat_unidades', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_visitas_co_usuarios1' => ['type' => 'foreign', 'columns' => ['co_usuario_id'], 'references' => ['co_usuarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => '2e9b4ac6-3bd8-46d5-b722-712b2fbc20a3',
            'cat_persona_id' => 'bacdd3e4-e9b1-4f88-a9a0-620cef2dd8a1',
            'cat_unidade_id' => '051637d2-ac17-4396-9b6e-5d6fa6872bca',
            'cat_calificaciones_servicio_id' => 'aba85222-346a-4f43-9e7c-8e3d8e88a915',
            'cat_calificaciones_servicios_recibido_id' => '546b0dfe-c382-442e-8274-5dd0d7cdbe26',
            'co_usuario_id' => '56cf9249-1b62-4804-93fa-587bc2418eb0',
            'resolucion_asunto' => 1,
            'motivo_resolucion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'fecha' => '2017-12-25',
            'observacion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'created' => '2017-12-25 03:16:53',
            'modified' => '2017-12-25 03:16:53'
        ],
    ];
}
