<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OpeViaticosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OpeViaticosTable Test Case
 */
class OpeViaticosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OpeViaticosTable
     */
    public $OpeViaticos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ope_viaticos',
        'app.cat_tipos_responsables_gastos',
        'app.cat_tipos_comisiones',
        'app.cat_tipos_viajes',
        'app.cat_ciudades',
        'app.cat_estados',
        'app.cat_paises',
        'app.co_usuarios',
        'app.co_grupos',
        'app.co_menus',
        'app.co_grupos_co_menus',
        'app.co_permisos',
        'app.co_grupos_co_permisos',
        'app.co_grupos_co_usuarios',
        'app.cat_estatus',
        'app.op_observaciones',
        'app.ope_anexos_viaticos',
        'app.ope_cargos_partidas',
        'app.cat_partidas',
        'app.ope_conclusiones',
        'app.ope_personal_viaticos',
        'app.cat_personales',
        'app.cat_tipos_integrantes',
        'app.cat_niveles_puestos',
        'app.cat_puestos',
        'app.cat_cargos',
        'app.cat_areas',
        'app.ope_viaticos_cat_areas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OpeViaticos') ? [] : ['className' => 'App\Model\Table\OpeViaticosTable'];
        $this->OpeViaticos = TableRegistry::get('OpeViaticos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OpeViaticos);

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
