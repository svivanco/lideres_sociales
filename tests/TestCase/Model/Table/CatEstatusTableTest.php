<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatEstatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatEstatusTable Test Case
 */
class CatEstatusTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatEstatusTable
     */
    public $CatEstatus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_estatus'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatEstatus') ? [] : ['className' => 'App\Model\Table\CatEstatusTable'];
        $this->CatEstatus = TableRegistry::get('CatEstatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatEstatus);

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
