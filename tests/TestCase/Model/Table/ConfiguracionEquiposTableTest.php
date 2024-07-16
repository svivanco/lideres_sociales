<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConfiguracionEquiposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConfiguracionEquiposTable Test Case
 */
class ConfiguracionEquiposTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConfiguracionEquiposTable
     */
    public $ConfiguracionEquipos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.configuracion_equipos',
        'app.cat_equipos',
        'app.cat_equipos_categorias',
        'app.cat_tipos_equipos',
        'app.ope_inventarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ConfiguracionEquipos') ? [] : ['className' => 'App\Model\Table\ConfiguracionEquiposTable'];
        $this->ConfiguracionEquipos = TableRegistry::get('ConfiguracionEquipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ConfiguracionEquipos);

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
