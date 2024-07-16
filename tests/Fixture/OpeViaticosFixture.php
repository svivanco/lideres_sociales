<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OpeViaticosFixture
 *
 */
class OpeViaticosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_ejercicio_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_tipos_responsables_gasto_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_tipos_comisione_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_tipos_viaje_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_ciudad_origen_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_ciudad_destino_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'co_usuario_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_estatu_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'descripcion' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'motivo' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'fecha_salida' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'hora_salida' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'fecha_regreso' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'hora_regreso' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'fecha_entrega_informe' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'fecha_validado' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_ope_viaticos_co_usuarios1_idx' => ['type' => 'index', 'columns' => ['co_usuario_id'], 'length' => []],
            'fk_ope_viaticos_cat_tipos_responsables_gastos1_idx' => ['type' => 'index', 'columns' => ['cat_tipos_responsables_gasto_id'], 'length' => []],
            'fk_ope_viaticos_cat_tipos_comisiones1_idx' => ['type' => 'index', 'columns' => ['cat_tipos_comisione_id'], 'length' => []],
            'fk_ope_viaticos_cat_tipos_viajes1_idx' => ['type' => 'index', 'columns' => ['cat_tipos_viaje_id'], 'length' => []],
            'fk_ope_viaticos_cat_ciudades1_idx' => ['type' => 'index', 'columns' => ['cat_ciudad_origen_id'], 'length' => []],
            'fk_ope_viaticos_cat_ciudades2_idx' => ['type' => 'index', 'columns' => ['cat_ciudad_destino_id'], 'length' => []],
            'fk_ope_viaticos_cat_estatus1_idx' => ['type' => 'index', 'columns' => ['cat_estatu_id'], 'length' => []],
            'fk_ope_viaticos_cat_ejercicios1_idx' => ['type' => 'index', 'columns' => ['cat_ejercicio_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_ope_viaticos_cat_ciudades1' => ['type' => 'foreign', 'columns' => ['cat_ciudad_origen_id'], 'references' => ['cat_ciudades', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_viaticos_cat_ciudades2' => ['type' => 'foreign', 'columns' => ['cat_ciudad_destino_id'], 'references' => ['cat_ciudades', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_viaticos_cat_ejercicios1' => ['type' => 'foreign', 'columns' => ['cat_ejercicio_id'], 'references' => ['cat_ejercicios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_viaticos_cat_estatus1' => ['type' => 'foreign', 'columns' => ['cat_estatu_id'], 'references' => ['cat_estatus', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_viaticos_cat_tipos_comisiones1' => ['type' => 'foreign', 'columns' => ['cat_tipos_comisione_id'], 'references' => ['cat_tipos_comisiones', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_viaticos_cat_tipos_responsables_gastos1' => ['type' => 'foreign', 'columns' => ['cat_tipos_responsables_gasto_id'], 'references' => ['cat_tipos_responsables_gastos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_viaticos_cat_tipos_viajes1' => ['type' => 'foreign', 'columns' => ['cat_tipos_viaje_id'], 'references' => ['cat_tipos_viajes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_viaticos_co_usuarios1' => ['type' => 'foreign', 'columns' => ['co_usuario_id'], 'references' => ['co_usuarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => 'b8926825-5f86-4054-88d0-4f84ba91a03d',
            'cat_ejercicio_id' => '1aa0a814-e7fa-42aa-afdb-65ec6bdfa990',
            'cat_tipos_responsables_gasto_id' => '09b75a98-3066-4012-b866-5b747346f1d2',
            'cat_tipos_comisione_id' => '38e95bf6-97ea-4460-837b-b7b370557e40',
            'cat_tipos_viaje_id' => '871ec8d2-0516-4746-bf4f-586fd46dc95b',
            'cat_ciudad_origen_id' => '90ee6b58-445f-4931-b461-085fa9a1fddf',
            'cat_ciudad_destino_id' => '1399f6f0-e6e6-485a-9d77-28aa866735a1',
            'co_usuario_id' => 'e9d20fc4-bd26-4021-8fa7-41f63ac698db',
            'cat_estatu_id' => '39fe80b7-4d7b-4e20-93cc-eb66448f3f56',
            'descripcion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'motivo' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'fecha_salida' => '2017-06-11',
            'hora_salida' => '05:31:41',
            'fecha_regreso' => '2017-06-11',
            'hora_regreso' => '05:31:41',
            'fecha_entrega_informe' => '2017-06-11',
            'fecha_validado' => '2017-06-11',
            'created' => '2017-06-11 05:31:41',
            'modified' => '2017-06-11 05:31:41'
        ],
    ];
}
