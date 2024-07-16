<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatPrioridadesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatPrioridadesTable Test Case
 */
class CatPrioridadesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatPrioridadesTable
     */
    public $CatPrioridades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_prioridades'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatPrioridades') ? [] : ['className' => 'App\Model\Table\CatPrioridadesTable'];
        $this->CatPrioridades = TableRegistry::get('CatPrioridades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatPrioridades);

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
