<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatImportePartidasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatImportePartidasTable Test Case
 */
class CatImportePartidasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatImportePartidasTable
     */
    public $CatImportePartidas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_importe_partidas',
        'app.cat_puestos',
        'app.cat_personales',
        'app.cat_tipos_integrantes',
        'app.co_usuarios',
        'app.cat_niveles_puestos',
        'app.cat_cargos',
        'app.cat_areas',
        'app.co_grupos',
        'app.co_menus',
        'app.co_grupos_co_menus',
        'app.co_permisos',
        'app.co_grupos_co_permisos',
        'app.co_grupos_co_usuarios',
        'app.cat_partidas',
        'app.ope_cargos_partidas',
        'app.ope_viaticos',
        'app.cat_ejercicios',
        'app.cat_tipos_responsables_gastos',
        'app.cat_tipos_comisiones',
        'app.cat_tipos_viajes',
        'app.cat_ciudades_origenes',
        'app.cat_estados',
        'app.cat_paises',
        'app.cat_ciudades',
        'app.cat_ciudades_destinos',
        'app.cat_estatus',
        'app.ope_anexos_viaticos',
        'app.ope_conclusiones',
        'app.ope_observaciones',
        'app.ope_usuarios_viaticos',
        'app.historial_estatus_viaticos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatImportePartidas') ? [] : ['className' => 'App\Model\Table\CatImportePartidasTable'];
        $this->CatImportePartidas = TableRegistry::get('CatImportePartidas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatImportePartidas);

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
