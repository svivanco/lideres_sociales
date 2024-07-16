<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OpeDetalleServiciosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OpeDetalleServiciosTable Test Case
 */
class OpeDetalleServiciosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OpeDetalleServiciosTable
     */
    public $OpeDetalleServicios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ope_detalle_servicios',
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
        'app.cat_dictamen_folios',
        'app.cat_categorias_servicios',
        'app.cat_tipos_oficios',
        'app.cat_tipos_servicios',
        'app.cat_categorias_servicios_cat_tipos_servicios',
        'app.co_atendio_usuarios',
        'app.historial_ope_servicios',
        'app.co_usuarios_acompanantes',
        'app.ope_servicios_co_usuarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OpeDetalleServicios') ? [] : ['className' => 'App\Model\Table\OpeDetalleServiciosTable'];
        $this->OpeDetalleServicios = TableRegistry::get('OpeDetalleServicios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OpeDetalleServicios);

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
