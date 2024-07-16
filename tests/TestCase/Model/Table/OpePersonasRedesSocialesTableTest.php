<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OpePersonasRedesSocialesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OpePersonasRedesSocialesTable Test Case
 */
class OpePersonasRedesSocialesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OpePersonasRedesSocialesTable
     */
    public $OpePersonasRedesSociales;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ope_personas_redes_sociales',
        'app.cat_personas',
        'app.cat_municipios',
        'app.cat_estados',
        'app.cat_localidades',
        'app.cat_colonias',
        'app.cat_personas_cat_colonias',
        'app.cat_secciones',
        'app.cat_distritos',
        'app.cat_cargos',
        'app.cat_actividades',
        'app.cat_personas_cat_actividades',
        'app.cat_temas',
        'app.cat_personas_cat_temas',
        'app.cat_redes_sociales'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OpePersonasRedesSociales') ? [] : ['className' => 'App\Model\Table\OpePersonasRedesSocialesTable'];
        $this->OpePersonasRedesSociales = TableRegistry::get('OpePersonasRedesSociales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OpePersonasRedesSociales);

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
