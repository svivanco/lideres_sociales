<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CatPersonalesFixture
 *
 */
class CatPersonalesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_tipos_integrante_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_niveles_puesto_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_puesto_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_cargo_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_area_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'nombre' => ['type' => 'string', 'length' => 80, 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'paterno' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'materno' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'sexo' => ['type' => 'string', 'length' => 1, 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'correo' => ['type' => 'string', 'length' => 80, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'telefono' => ['type' => 'string', 'length' => 15, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'observacion' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_cat_personales_cat_tipos_integrantes1_idx' => ['type' => 'index', 'columns' => ['cat_tipos_integrante_id'], 'length' => []],
            'fk_cat_personales_cat_niveles_puestos1_idx' => ['type' => 'index', 'columns' => ['cat_niveles_puesto_id'], 'length' => []],
            'fk_cat_personales_cat_puestos1_idx' => ['type' => 'index', 'columns' => ['cat_puesto_id'], 'length' => []],
            'fk_cat_personales_cat_cargos1_idx' => ['type' => 'index', 'columns' => ['cat_cargo_id'], 'length' => []],
            'fk_cat_personales_cat_areas1_idx' => ['type' => 'index', 'columns' => ['cat_area_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_cat_personales_cat_areas1' => ['type' => 'foreign', 'columns' => ['cat_area_id'], 'references' => ['cat_areas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_cat_personales_cat_cargos1' => ['type' => 'foreign', 'columns' => ['cat_cargo_id'], 'references' => ['cat_cargos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_cat_personales_cat_niveles_puestos1' => ['type' => 'foreign', 'columns' => ['cat_niveles_puesto_id'], 'references' => ['cat_niveles_puestos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_cat_personales_cat_puestos1' => ['type' => 'foreign', 'columns' => ['cat_puesto_id'], 'references' => ['cat_puestos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_cat_personales_cat_tipos_integrantes1' => ['type' => 'foreign', 'columns' => ['cat_tipos_integrante_id'], 'references' => ['cat_tipos_integrantes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => 'ca788e9d-9022-462c-8cf4-d2f8d4c978ec',
            'cat_tipos_integrante_id' => 'c234f524-36a9-4880-b9b9-0af3b2e8ca1c',
            'cat_niveles_puesto_id' => 'deee2df5-099d-45bb-931c-2bebb019d65b',
            'cat_puesto_id' => 'a6f29756-d80b-4a4b-8191-0ec5fabf1ab5',
            'cat_cargo_id' => '053d9bcd-c276-41a3-b7b0-acc2bb82726b',
            'cat_area_id' => 'd26b6035-96c6-4048-ba5c-13e0b5eba6e9',
            'nombre' => 'Lorem ipsum dolor sit amet',
            'paterno' => 'Lorem ipsum dolor sit amet',
            'materno' => 'Lorem ipsum dolor sit amet',
            'sexo' => 'Lorem ipsum dolor sit ame',
            'correo' => 'Lorem ipsum dolor sit amet',
            'telefono' => 'Lorem ipsum d',
            'observacion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'created' => '2017-06-09 07:58:39',
            'modified' => '2017-06-09 07:58:39'
        ],
    ];
}
