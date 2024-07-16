<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatPersonalesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatPersonalesTable Test Case
 */
class CatPersonalesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatPersonalesTable
     */
    public $CatPersonales;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_personales',
        'app.cat_tipos_integrantes',
        'app.cat_niveles_puestos',
        'app.cat_puestos',
        'app.cat_cargos',
        'app.cat_areas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatPersonales') ? [] : ['className' => 'App\Model\Table\CatPersonalesTable'];
        $this->CatPersonales = TableRegistry::get('CatPersonales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatPersonales);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
