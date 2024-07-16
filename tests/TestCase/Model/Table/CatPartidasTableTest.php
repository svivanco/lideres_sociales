<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatPartidasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatPartidasTable Test Case
 */
class CatPartidasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatPartidasTable
     */
    public $CatPartidas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_partidas',
        'app.ope_inventarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatPartidas') ? [] : ['className' => 'App\Model\Table\CatPartidasTable'];
        $this->CatPartidas = TableRegistry::get('CatPartidas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatPartidas);

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
