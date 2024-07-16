<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatPiezasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatPiezasTable Test Case
 */
class CatPiezasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatPiezasTable
     */
    public $CatPiezas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_piezas',
        'app.ope_detalle_inventarios',
        'app.cat_tipo_piezas',
        'app.cat_piezas_cat_tipo_piezas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatPiezas') ? [] : ['className' => 'App\Model\Table\CatPiezasTable'];
        $this->CatPiezas = TableRegistry::get('CatPiezas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatPiezas);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
