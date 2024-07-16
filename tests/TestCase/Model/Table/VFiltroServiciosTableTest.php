<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VFiltroServiciosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VFiltroServiciosTable Test Case
 */
class VFiltroServiciosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VFiltroServiciosTable
     */
    public $VFiltroServicios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.v_filtro_servicios',
        'app.ope_servicios',
        'app.cat_folios',
        'app.ope_mantenimientos_generales',
        'app.co_usuarios',
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
        'app.ope_interno_inventarios',
        'app.cat_piezas',
        'app.ope_detalle_inventarios',
        'app.cat_estatus',
        'app.cat_tipo_piezas',
        'app.cat_piezas_cat_tipo_piezas',
        'app.cat_equipos_cat_piezas',
        'app.cat_tipos_equipos',
        'app.cat_marcas',
        'app.configuracion_sistemas_operativos',
        'app.cat_sistemas_operativos',
        'app.cat_versiones',
        'app.cat_arquitecturas',
        'app.cat_proveedores',
        'app.cat_programas',
        'app.cat_recursos',
        'app.cat_partidas',
        'app.historial_equipos_piezas',
        'app.ope_inventario_origen',
        'app.ope_anexos_correspondencias',
        'app.cat_tipos_oficios',
        'app.cat_categorias_servicios',
        'app.cat_tipos_servicios',
        'app.ope_detalle_servicios',
        'app.ope_detalle_dictamen_servicios',
        'app.ope_detalle_dictamen_servicios_cat_tipos_servicios',
        'app.ope_detalle_dictamen_servicios_ope_detalle_inventarios',
        'app.cat_categorias_servicios_cat_tipos_servicios',
        'app.ope_anexos_inventarios',
        'app.exp_ope_inventarios',
        'app.ope_prestaciones',
        'app.cat_tipos_prestaciones',
        'app.ope_detalle_prestaciones',
        'app.cat_puestos',
        'app.cat_nivel_academicos',
        'app.cat_directorio_empleados',
        'app.cat_tipos_directorios',
        'app.co_grupos',
        'app.co_menus',
        'app.co_grupos_co_menus',
        'app.co_permisos',
        'app.co_grupos_co_permisos',
        'app.co_usuarios_co_grupos',
        'app.ope_mantenimientos_generales_co_usuarios',
        'app.co_usuario_responsable',
        'app.co_atendio_usuarios',
        'app.historial_ope_servicios',
        'app.ope_anexos',
        'app.ope_encuestas_servicios',
        'app.configuracion_encuestas',
        'app.co_usuarios_acompanantes',
        'app.ope_servicios_co_usuarios',
        'app.co_usuario_atendios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VFiltroServicios') ? [] : ['className' => 'App\Model\Table\VFiltroServiciosTable'];
        $this->VFiltroServicios = TableRegistry::get('VFiltroServicios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VFiltroServicios);

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
