<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatEmpleadosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatEmpleadosTable Test Case
 */
class CatEmpleadosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatEmpleadosTable
     */
    public $CatEmpleados;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_empleados',
        'app.cat_unidades',
        'app.cat_puestos',
        'app.co_usuarios',
        'app.co_grupos',
        'app.co_menus',
        'app.co_grupos_co_menus',
        'app.co_permisos',
        'app.co_grupos_co_permisos',
        'app.co_grupos_co_usuarios',
        'app.co_usuarios_co_grupos',
        'app.ope_inventarios',
        'app.ope_prestaciones',
        'app.ope_servicios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatEmpleados') ? [] : ['className' => 'App\Model\Table\CatEmpleadosTable'];
        $this->CatEmpleados = TableRegistry::get('CatEmpleados', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatEmpleados);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
