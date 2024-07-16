<?php
namespace App\Test\TestCase\Controller;

use App\Controller\OpeInventariosController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\OpeInventariosController Test Case
 */
class OpeInventariosControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ope_inventarios',
        'app.configuracion_equipos',
        'app.cat_equipos',
        'app.cat_equipos_categorias',
        'app.cat_tipos_equipos',
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
        'app.co_grupos_co_usuarios',
        'app.co_usuarios_co_grupos',
        'app.ope_prestaciones',
        'app.ope_servicios',
        'app.ope_mantenimientos_generales',
        'app.configuracion_sistemas_operativos',
        'app.cat_sistemas_operativos',
        'app.cat_versiones',
        'app.cat_arquitecturas',
        'app.cat_proveedores',
        'app.cat_programas',
        'app.cat_recursos',
        'app.cat_partidas',
        'app.ope_solicitudes',
        'app.ope_detalle_inventarios'
    ];

    /**
     * Test getData method
     *
     * @return void
     */
    public function testGetData()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
