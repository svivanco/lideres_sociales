<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CatSeccionesFixture
 *
 */
class CatSeccionesFixture extends TestFixture
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
        'cat_distrito_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'name' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'activo' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_cat_secciones_cat_municipios1_idx' => ['type' => 'index', 'columns' => ['cat_municipio_id'], 'length' => []],
            'fk_cat_secciones_cat_distritos1_idx' => ['type' => 'index', 'columns' => ['cat_distrito_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_cat_secciones_cat_distritos1' => ['type' => 'foreign', 'columns' => ['cat_distrito_id'], 'references' => ['cat_distritos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_cat_secciones_cat_municipios1' => ['type' => 'foreign', 'columns' => ['cat_municipio_id'], 'references' => ['cat_municipios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => 'f00b95c1-ba85-4dc7-a733-5d089d2a3101',
            'cat_municipio_id' => 'cdfc7c4d-aa6c-4952-a350-f003278a98e8',
            'cat_distrito_id' => 'e7e9e509-3f22-48a2-900e-3479785489c3',
            'name' => 'Lorem ipsum dolor sit amet',
            'activo' => 1,
            'created' => '2018-02-20 21:34:20',
            'modified' => '2018-02-20 21:34:20'
        ],
    ];
}
