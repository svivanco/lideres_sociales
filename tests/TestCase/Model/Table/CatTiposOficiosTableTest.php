<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatTiposOficiosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatTiposOficiosTable Test Case
 */
class CatTiposOficiosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatTiposOficiosTable
     */
    public $CatTiposOficios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_tipos_oficios',
        'app.cat_categorias_servicios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatTiposOficios') ? [] : ['className' => 'App\Model\Table\CatTiposOficiosTable'];
        $this->CatTiposOficios = TableRegistry::get('CatTiposOficios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatTiposOficios);

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
