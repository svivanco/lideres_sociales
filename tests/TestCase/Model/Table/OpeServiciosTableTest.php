<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OpeServiciosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OpeServiciosTable Test Case
 */
class OpeServiciosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OpeServiciosTable
     */
    public $OpeServicios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ope_servicios',
        'app.cat_folios',
        'app.ope_mantenimientos_generales',
        'app.ope_prestaciones',
        'app.cat_tipos_prestaciones',
        'app.cat_estatus',
        'app.cat_empleados',
        'app.cat_unidades',
        'app.cat_unidades_centrales',
        'app.cat_tipos_unidades_centrales',
        'app.cat_municipios',
        'app.cat_localidades',
        'app.cat_jurisdicciones',
        'app.cat_direcciones',
        'app.not_notificaciones',
        'app.cat_directorios',
        'app.ope_inventarios',
        'app.configuracion_equipos',
        'app.cat_equipos',
        'app.cat_equipos_categorias',
        'app.cat_tipos_equipos',
        'app.co_usuarios',
        'app.co_grupos',
        'app.co_menus',
        'app.co_grupos_co_menus',
        'app.co_permisos',
        'app.co_grupos_co_permisos',
        'app.co_usuarios_co_grupos',
        'app.configuracion_sistemas_operativos',
        'app.cat_sistemas_operativos',
        'app.cat_versiones',
        'app.cat_arquitecturas',
        'app.cat_proveedores',
        'app.cat_programas',
        'app.cat_recursos',
        'app.cat_partidas',
        'app.ope_detalle_inventarios',
        'app.cat_puestos',
        'app.ope_detalle_prestaciones',
        'app.cat_categorias_servicios',
        'app.cat_tipos_oficios',
        'app.cat_tipos_servicios',
        'app.ope_detalle_servicios',
        'app.cat_categorias_servicios_cat_tipos_servicios',
        'app.ope_oficios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OpeServicios') ? [] : ['className' => 'App\Model\Table\OpeServiciosTable'];
        $this->OpeServicios = TableRegistry::get('OpeServicios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OpeServicios);

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
