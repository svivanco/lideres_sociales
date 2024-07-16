<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatPuestosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatPuestosTable Test Case
 */
class CatPuestosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatPuestosTable
     */
    public $CatPuestos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_puestos',
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
        $config = TableRegistry::exists('CatPuestos') ? [] : ['className' => 'App\Model\Table\CatPuestosTable'];
        $this->CatPuestos = TableRegistry::get('CatPuestos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatPuestos);

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
