<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatColoniasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatColoniasTable Test Case
 */
class CatColoniasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatColoniasTable
     */
    public $CatColonias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_colonias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatColonias') ? [] : ['className' => 'App\Model\Table\CatColoniasTable'];
        $this->CatColonias = TableRegistry::get('CatColonias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatColonias);

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
