<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatUnidadesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatUnidadesTable Test Case
 */
class CatUnidadesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatUnidadesTable
     */
    public $CatUnidades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_unidades',
        'app.cat_unidades_centrales',
        'app.cat_direcciones',
        'app.cat_directorios',
        'app.cat_empleados',
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
        'app.ope_servicios',
        'app.ope_mantenimientos_generales'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatUnidades') ? [] : ['className' => 'App\Model\Table\CatUnidadesTable'];
        $this->CatUnidades = TableRegistry::get('CatUnidades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatUnidades);

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
