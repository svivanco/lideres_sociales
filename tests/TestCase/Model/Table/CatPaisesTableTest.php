<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatPaisesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatPaisesTable Test Case
 */
class CatPaisesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatPaisesTable
     */
    public $CatPaises;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_paises',
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
        $config = TableRegistry::exists('CatPaises') ? [] : ['className' => 'App\Model\Table\CatPaisesTable'];
        $this->CatPaises = TableRegistry::get('CatPaises', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatPaises);

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
