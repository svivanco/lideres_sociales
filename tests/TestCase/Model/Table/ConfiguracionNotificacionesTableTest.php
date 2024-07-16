<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConfiguracionNotificacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConfiguracionNotificacionesTable Test Case
 */
class ConfiguracionNotificacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConfiguracionNotificacionesTable
     */
    public $ConfiguracionNotificaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.configuracion_notificaciones',
        'app.co_grupos',
        'app.co_menus',
        'app.co_grupos_co_menus',
        'app.co_permisos',
        'app.co_grupos_co_permisos',
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
        'app.configuracion_sistemas_operativos',
        'app.cat_sistemas_operativos',
        'app.cat_versiones',
        'app.cat_arquitecturas',
        'app.cat_proveedores',
        'app.cat_programas',
        'app.cat_recursos',
        'app.cat_partidas',
        'app.historial_equipos_piezas',
        'app.ope_servicios',
        'app.cat_folios',
        'app.ope_mantenimientos_generales',
        'app.ope_prestaciones',
        'app.cat_tipos_prestaciones',
        'app.ope_detalle_prestaciones',
        'app.cat_dictamen_folios',
        'app.cat_categorias_servicios',
        'app.cat_tipos_oficios',
        'app.cat_tipos_servicios',
        'app.ope_detalle_servicios',
        'app.cat_categorias_servicios_cat_tipos_servicios',
        'app.co_atendio_usuarios',
        'app.co_usuarios_co_grupos',
        'app.historial_ope_servicios',
        'app.ope_anexos',
        'app.co_usuarios_acompanantes',
        'app.ope_servicios_co_usuarios',
        'app.historial_ope_inventarios',
        'app.cat_puestos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ConfiguracionNotificaciones') ? [] : ['className' => 'App\Model\Table\ConfiguracionNotificacionesTable'];
        $this->ConfiguracionNotificaciones = TableRegistry::get('ConfiguracionNotificaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ConfiguracionNotificaciones);

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
