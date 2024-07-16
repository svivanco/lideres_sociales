<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OpeProgramasPersonasFixture
 *
 */
class OpeProgramasPersonasFixture extends TestFixture
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
        'cat_programa_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'co_usuario_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_unidade_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'observacion' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_ope_programas_personas_cat_personas1_idx' => ['type' => 'index', 'columns' => ['cat_persona_id'], 'length' => []],
            'fk_ope_programas_personas_cat_programas1_idx' => ['type' => 'index', 'columns' => ['cat_programa_id'], 'length' => []],
            'fk_ope_programas_personas_co_usuarios1_idx' => ['type' => 'index', 'columns' => ['co_usuario_id'], 'length' => []],
            'fk_ope_programas_personas_cat_unidades1_idx' => ['type' => 'index', 'columns' => ['cat_unidade_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_ope_programas_personas_cat_personas1' => ['type' => 'foreign', 'columns' => ['cat_persona_id'], 'references' => ['cat_personas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_programas_personas_cat_programas1' => ['type' => 'foreign', 'columns' => ['cat_programa_id'], 'references' => ['cat_programas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_programas_personas_cat_unidades1' => ['type' => 'foreign', 'columns' => ['cat_unidade_id'], 'references' => ['cat_unidades', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_programas_personas_co_usuarios1' => ['type' => 'foreign', 'columns' => ['co_usuario_id'], 'references' => ['co_usuarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => '5f3c4f06-f822-40ff-89fc-ebe3955761dc',
            'cat_persona_id' => '5de8de2f-fac1-4884-9c04-4673c44b6018',
            'cat_programa_id' => '809dfdfd-c2e3-420e-bc1f-1334d8ada1a8',
            'co_usuario_id' => '72c8417d-09db-4835-ba76-7014c4270c32',
            'cat_unidade_id' => '3da34869-82c2-4d7d-af71-37a29215fe75',
            'observacion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'created' => '2018-01-03 07:29:27',
            'modified' => '2018-01-03 07:29:27'
        ],
    ];
}
