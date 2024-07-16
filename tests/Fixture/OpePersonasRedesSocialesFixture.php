<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OpePersonasRedesSocialesFixture
 *
 */
class OpePersonasRedesSocialesFixture extends TestFixture
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
        'cat_redes_sociale_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'enlace' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'activo' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_ope_personas_redes_sociales_cat_personas1_idx' => ['type' => 'index', 'columns' => ['cat_persona_id'], 'length' => []],
            'fk_ope_personas_redes_sociales_cat_redes_sociales1_idx' => ['type' => 'index', 'columns' => ['cat_redes_sociale_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_ope_personas_redes_sociales_cat_personas1' => ['type' => 'foreign', 'columns' => ['cat_persona_id'], 'references' => ['cat_personas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_personas_redes_sociales_cat_redes_sociales1' => ['type' => 'foreign', 'columns' => ['cat_redes_sociale_id'], 'references' => ['cat_redes_sociales', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => '61d1087b-d08a-4de5-a0b9-8ca763e7bcca',
            'cat_persona_id' => '920d9779-ae7f-4115-95a4-1124bcd5dd3b',
            'cat_redes_sociale_id' => '298ffcc5-c758-4b27-b5d3-144762167586',
            'enlace' => 'Lorem ipsum dolor sit amet',
            'activo' => 1,
            'created' => '2018-02-21 23:01:08',
            'modified' => '2018-02-21 23:01:08'
        ],
    ];
}
