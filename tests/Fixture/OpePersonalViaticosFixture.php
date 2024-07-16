<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OpePersonalViaticosFixture
 *
 */
class OpePersonalViaticosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'ope_viatico_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_personale_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'importe' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'responsable' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_ope_detalle_viaticos_cat_personales1_idx' => ['type' => 'index', 'columns' => ['cat_personale_id'], 'length' => []],
            'fk_ope_personal_viaticos_ope_viaticos1_idx' => ['type' => 'index', 'columns' => ['ope_viatico_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_ope_detalle_viaticos_cat_personales1' => ['type' => 'foreign', 'columns' => ['cat_personale_id'], 'references' => ['cat_personales', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ope_personal_viaticos_ope_viaticos1' => ['type' => 'foreign', 'columns' => ['ope_viatico_id'], 'references' => ['ope_viaticos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => 'e0002327-5a6f-46ee-a6de-03667b29e28c',
            'ope_viatico_id' => '4a5d6ff0-ab47-4265-b768-7ed7d2ec7760',
            'cat_personale_id' => '0814aa22-b6ba-4bc1-b756-15ed52758732',
            'importe' => 1,
            'responsable' => 1,
            'created' => '2017-06-11 02:51:42',
            'modified' => '2017-06-11 02:51:42'
        ],
    ];
}
