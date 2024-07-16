<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatTiposIntegrantesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatTiposIntegrantesTable Test Case
 */
class CatTiposIntegrantesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatTiposIntegrantesTable
     */
    public $CatTiposIntegrantes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_tipos_integrantes',
        'app.cat_personales'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatTiposIntegrantes') ? [] : ['className' => 'App\Model\Table\CatTiposIntegrantesTable'];
        $this->CatTiposIntegrantes = TableRegistry::get('CatTiposIntegrantes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatTiposIntegrantes);

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
