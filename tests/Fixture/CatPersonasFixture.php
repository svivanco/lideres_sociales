<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CatPersonasFixture
 *
 */
class CatPersonasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_municipio_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_localidade_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_colonias_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_seccione_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_cargo_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'nombre' => ['type' => 'string', 'length' => 80, 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'paterno' => ['type' => 'string', 'length' => 80, 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'materno' => ['type' => 'string', 'length' => 80, 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'edad' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sexo' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'telefono' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'email' => ['type' => 'string', 'length' => 120, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'red_social' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'tiempo_residencia' => ['type' => 'string', 'length' => 5, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_cat_personas_cat_municipios1_idx' => ['type' => 'index', 'columns' => ['cat_municipio_id'], 'length' => []],
            'fk_cat_personas_cat_localidades1_idx' => ['type' => 'index', 'columns' => ['cat_localidade_id'], 'length' => []],
            'fk_cat_personas_cat_secciones1_idx' => ['type' => 'index', 'columns' => ['cat_seccione_id'], 'length' => []],
            'fk_cat_personas_cat_cargos1_idx' => ['type' => 'index', 'columns' => ['cat_cargo_id'], 'length' => []],
            'fk_cat_personas_cat_colonias1_idx' => ['type' => 'index', 'columns' => ['cat_colonias_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_cat_personas_cat_cargos1' => ['type' => 'foreign', 'columns' => ['cat_cargo_id'], 'references' => ['cat_cargos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_cat_personas_cat_colonias1' => ['type' => 'foreign', 'columns' => ['cat_colonias_id'], 'references' => ['cat_colonias', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_cat_personas_cat_localidades1' => ['type' => 'foreign', 'columns' => ['cat_localidade_id'], 'references' => ['cat_localidades', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_cat_personas_cat_municipios1' => ['type' => 'foreign', 'columns' => ['cat_municipio_id'], 'references' => ['cat_municipios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_cat_personas_cat_secciones1' => ['type' => 'foreign', 'columns' => ['cat_seccione_id'], 'references' => ['cat_secciones', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => '3a956d49-b051-49d5-a345-4eb941f4ff47',
            'cat_municipio_id' => 'c85db4d8-6a42-463e-9a5a-ecc1fd4f57bb',
            'cat_localidade_id' => '6f79c70e-3b3e-4610-b22b-1575a711cbf0',
            'cat_colonias_id' => '6e3f90f2-eb30-4fc7-a1b2-9bee898ca081',
            'cat_seccione_id' => '790018db-e955-4fd8-b885-54e1a9eef009',
            'cat_cargo_id' => '0aa2a9db-b3b4-41f1-bb2f-d341ade2e337',
            'nombre' => 'Lorem ipsum dolor sit amet',
            'paterno' => 'Lorem ipsum dolor sit amet',
            'materno' => 'Lorem ipsum dolor sit amet',
            'edad' => 1,
            'sexo' => 'Lorem ipsum dolor sit ame',
            'telefono' => 'Lorem ip',
            'email' => 'Lorem ipsum dolor sit amet',
            'red_social' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'tiempo_residencia' => 'Lor',
            'created' => '2018-02-20 21:52:48',
            'modified' => '2018-02-20 21:52:48'
        ],
    ];
}
