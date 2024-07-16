<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatJurisdiccionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatJurisdiccionesTable Test Case
 */
class CatJurisdiccionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatJurisdiccionesTable
     */
    public $CatJurisdicciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_jurisdicciones',
        'app.cat_unidades_centrales'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatJurisdicciones') ? [] : ['className' => 'App\Model\Table\CatJurisdiccionesTable'];
        $this->CatJurisdicciones = TableRegistry::get('CatJurisdicciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatJurisdicciones);

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
