<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatCiudadesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatCiudadesTable Test Case
 */
class CatCiudadesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatCiudadesTable
     */
    public $CatCiudades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_ciudades',
        'app.cat_estados'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatCiudades') ? [] : ['className' => 'App\Model\Table\CatCiudadesTable'];
        $this->CatCiudades = TableRegistry::get('CatCiudades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatCiudades);

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
