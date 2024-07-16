<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatEquiposCategoriasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatEquiposCategoriasTable Test Case
 */
class CatEquiposCategoriasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatEquiposCategoriasTable
     */
    public $CatEquiposCategorias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_equipos_categorias',
        'app.cat_equipos',
        'app.configuracion_equipos',
        'app.cat_tipos_equipos',
        'app.ope_inventarios',
        'app.cat_estatus',
        'app.cat_unidades',
        'app.cat_unidades_centrales',
        'app.cat_tipos_unidades_centrales',
        'app.cat_municipios',
        'app.cat_localidades',
        'app.cat_jurisdicciones',
        'app.cat_direcciones',
        'app.not_notificaciones',
        'app.cat_directorios',
        'app.cat_empleados',
        'app.cat_puestos',
        'app.co_usuarios',
        'app.co_grupos',
        'app.co_menus',
        'app.co_grupos_co_menus',
        'app.co_permisos',
        'app.co_grupos_co_permisos',
        'app.co_usuarios_co_grupos',
        'app.ope_prestaciones',
        'app.cat_folios',
        'app.ope_mantenimientos_generales',
        'app.ope_servicios',
        'app.cat_dictamen_folios',
        'app.cat_categorias_servicios',
        'app.cat_tipos_oficios',
        'app.cat_tipos_servicios',
        'app.ope_detalle_servicios',
        'app.cat_categorias_servicios_cat_tipos_servicios',
        'app.co_atendio_usuarios',
        'app.historial_ope_servicios',
        'app.co_usuarios_acompanantes',
        'app.ope_servicios_co_usuarios',
        'app.cat_tipos_prestaciones',
        'app.ope_detalle_prestaciones',
        'app.configuracion_sistemas_operativos',
        'app.cat_sistemas_operativos',
        'app.cat_versiones',
        'app.cat_arquitecturas',
        'app.cat_proveedores',
        'app.cat_programas',
        'app.cat_recursos',
        'app.cat_partidas',
        'app.ope_detalle_inventarios',
        'app.cat_piezas',
        'app.cat_tipo_piezas',
        'app.cat_piezas_cat_tipo_piezas',
        'app.historial_ope_inventarios',
        'app.ope_interno_inventarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatEquiposCategorias') ? [] : ['className' => 'App\Model\Table\CatEquiposCategoriasTable'];
        $this->CatEquiposCategorias = TableRegistry::get('CatEquiposCategorias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatEquiposCategorias);

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
