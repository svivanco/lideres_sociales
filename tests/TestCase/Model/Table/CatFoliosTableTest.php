<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatFoliosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatFoliosTable Test Case
 */
class CatFoliosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatFoliosTable
     */
    public $CatFolios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_folios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatFolios') ? [] : ['className' => 'App\Model\Table\CatFoliosTable'];
        $this->CatFolios = TableRegistry::get('CatFolios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatFolios);

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
