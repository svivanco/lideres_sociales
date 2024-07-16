<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatTiposResponsablesGastosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatTiposResponsablesGastosTable Test Case
 */
class CatTiposResponsablesGastosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatTiposResponsablesGastosTable
     */
    public $CatTiposResponsablesGastos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_tipos_responsables_gastos',
        'app.ope_viaticos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatTiposResponsablesGastos') ? [] : ['className' => 'App\Model\Table\CatTiposResponsablesGastosTable'];
        $this->CatTiposResponsablesGastos = TableRegistry::get('CatTiposResponsablesGastos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatTiposResponsablesGastos);

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
