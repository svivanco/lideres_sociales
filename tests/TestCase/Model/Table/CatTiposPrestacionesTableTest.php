<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatTiposPrestacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatTiposPrestacionesTable Test Case
 */
class CatTiposPrestacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatTiposPrestacionesTable
     */
    public $CatTiposPrestaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_tipos_prestaciones',
        'app.ope_prestaciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatTiposPrestaciones') ? [] : ['className' => 'App\Model\Table\CatTiposPrestacionesTable'];
        $this->CatTiposPrestaciones = TableRegistry::get('CatTiposPrestaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatTiposPrestaciones);

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
