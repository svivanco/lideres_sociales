<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatNivelesPuestosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatNivelesPuestosTable Test Case
 */
class CatNivelesPuestosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatNivelesPuestosTable
     */
    public $CatNivelesPuestos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_niveles_puestos',
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
        $config = TableRegistry::exists('CatNivelesPuestos') ? [] : ['className' => 'App\Model\Table\CatNivelesPuestosTable'];
        $this->CatNivelesPuestos = TableRegistry::get('CatNivelesPuestos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatNivelesPuestos);

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
