<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatPeriodosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatPeriodosTable Test Case
 */
class CatPeriodosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatPeriodosTable
     */
    public $CatPeriodos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_periodos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatPeriodos') ? [] : ['className' => 'App\Model\Table\CatPeriodosTable'];
        $this->CatPeriodos = TableRegistry::get('CatPeriodos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatPeriodos);

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
