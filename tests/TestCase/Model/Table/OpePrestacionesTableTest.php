<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OpePrestacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OpePrestacionesTable Test Case
 */
class OpePrestacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OpePrestacionesTable
     */
    public $OpePrestaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ope_prestaciones',
        'app.cat_folios',
        'app.ope_mantenimientos_generales',
        'app.ope_servicios',
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
        'app.ope_solicitudes',
        'app.ope_detalle_inventarios',
        'app.cat_puestos',
        'app.ope_detalle_prestaciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OpePrestaciones') ? [] : ['className' => 'App\Model\Table\OpePrestacionesTable'];
        $this->OpePrestaciones = TableRegistry::get('OpePrestaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OpePrestaciones);

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
