<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OpeInventariosFixture
 *
 */
class OpeInventariosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'configuracion_equipo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cat_estatu_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cat_unidade_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'co_usuario_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ope_inventario_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cat_empleado_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'configuracion_sistemas_operativo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cat_proveedore_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cat_programa_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cat_recurso_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cat_partida_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ope_solicitude_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'nomenclatura' => ['type' => 'string', 'length' => 18, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'marca' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'modelo' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'color' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'no_inventario' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'no_serie' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'fecha_instalacion_so' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'numero_oficio' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'danado' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ip' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'nuevo' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'observacion' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_ope_inventarios_configuracion_equipos1_idx' => ['type' => 'index', 'columns' => ['configuracion_equipo_id'], 'length' => []],
            'fk_ope_inventarios_cat_empleados1_idx' => ['type' => 'index', 'columns' => ['cat_empleado_id'], 'length' => []],
            'fk_ope_inventarios_cat_estatus1_idx' => ['type' => 'index', 'columns' => ['cat_estatu_id'], 'length' => []],
            'fk_ope_inventarios_ope_inventarios1_idx' => ['type' => 'index', 'columns' => ['ope_inventario_id'], 'length' => []],
            'fk_ope_inventarios_configuracion_sistemas_operativos1_idx' => ['type' => 'index', 'columns' => ['configuracion_sistemas_operativo_id'], 'length' => []],
            'fk_ope_inventarios_cat_unidades1_idx' => ['type' => 'index', 'columns' => ['cat_unidade_id'], 'length' => []],
            'fk_ope_inventarios_co_usuarios1_idx' => ['type' => 'index', 'columns' => ['co_usuario_id'], 'length' => []],
            'fk_ope_inventarios_cat_proveedores1_idx' => ['type' => 'index', 'columns' => ['cat_proveedore_id'], 'length' => []],
            'fk_ope_inventarios_cat_programas1_idx' => ['type' => 'index', 'columns' => ['cat_programa_id'], 'length' => []],
            'fk_ope_inventarios_cat_recursos1_idx' => ['type' => 'index', 'columns' => ['cat_recurso_id'], 'length' => []],
            'fk_ope_inventarios_cat_partidas1_idx' => ['type' => 'index', 'columns' => ['cat_partida_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_ope_inventarios_cat_empleados1' => ['type' => 'foreign', 'columns' => ['cat_empleado_id'], 'references' => ['cat_empleados', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_inventarios_cat_estatus1' => ['type' => 'foreign', 'columns' => ['cat_estatu_id'], 'references' => ['cat_estatus', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_inventarios_cat_partidas1' => ['type' => 'foreign', 'columns' => ['cat_partida_id'], 'references' => ['cat_partidas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_inventarios_cat_programas1' => ['type' => 'foreign', 'columns' => ['cat_programa_id'], 'references' => ['cat_programas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_inventarios_cat_proveedores1' => ['type' => 'foreign', 'columns' => ['cat_proveedore_id'], 'references' => ['cat_proveedores', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_inventarios_cat_recursos1' => ['type' => 'foreign', 'columns' => ['cat_recurso_id'], 'references' => ['cat_recursos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_inventarios_cat_unidades1' => ['type' => 'foreign', 'columns' => ['cat_unidade_id'], 'references' => ['cat_unidades', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_inventarios_co_usuarios1' => ['type' => 'foreign', 'columns' => ['co_usuario_id'], 'references' => ['co_usuarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_inventarios_configuracion_equipos1' => ['type' => 'foreign', 'columns' => ['configuracion_equipo_id'], 'references' => ['configuracion_equipos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_inventarios_configuracion_sistemas_operativos1' => ['type' => 'foreign', 'columns' => ['configuracion_sistemas_operativo_id'], 'references' => ['configuracion_sistemas_operativos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_inventarios_ope_inventarios1' => ['type' => 'foreign', 'columns' => ['ope_inventario_id'], 'references' => ['ope_inventarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'configuracion_equipo_id' => 1,
            'cat_estatu_id' => 1,
            'cat_unidade_id' => 1,
            'co_usuario_id' => 1,
            'ope_inventario_id' => 1,
            'cat_empleado_id' => 1,
            'configuracion_sistemas_operativo_id' => 1,
            'cat_proveedore_id' => 1,
            'cat_programa_id' => 1,
            'cat_recurso_id' => 1,
            'cat_partida_id' => 1,
            'ope_solicitude_id' => 1,
            'nomenclatura' => 'Lorem ipsum dolo',
            'marca' => 'Lorem ipsum dolor sit amet',
            'modelo' => 'Lorem ipsum dolor sit amet',
            'color' => 'Lorem ipsum dolor sit amet',
            'no_inventario' => 'Lorem ipsum dolor sit amet',
            'no_serie' => 'Lorem ipsum dolor sit amet',
            'fecha_instalacion_so' => 'Lorem ipsum dolor sit amet',
            'numero_oficio' => 'Lorem ipsum dolor sit amet',
            'danado' => 'Lorem ipsum dolor sit amet',
            'ip' => 'Lorem ipsum dolor ',
            'nuevo' => 1,
            'observacion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'created' => '2017-09-04 19:30:14',
            'modified' => '2017-09-04 19:30:14'
        ],
    ];
}
