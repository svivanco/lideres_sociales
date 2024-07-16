<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatTiposDirectoriosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatTiposDirectoriosTable Test Case
 */
class CatTiposDirectoriosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatTiposDirectoriosTable
     */
    public $CatTiposDirectorios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_tipos_directorios',
        'app.cat_directorio_empleados'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatTiposDirectorios') ? [] : ['className' => 'App\Model\Table\CatTiposDirectoriosTable'];
        $this->CatTiposDirectorios = TableRegistry::get('CatTiposDirectorios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatTiposDirectorios);

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
