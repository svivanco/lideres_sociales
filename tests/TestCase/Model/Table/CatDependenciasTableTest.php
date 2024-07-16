<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatDependenciasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatDependenciasTable Test Case
 */
class CatDependenciasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatDependenciasTable
     */
    public $CatDependencias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_dependencias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatDependencias') ? [] : ['className' => 'App\Model\Table\CatDependenciasTable'];
        $this->CatDependencias = TableRegistry::get('CatDependencias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatDependencias);

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
