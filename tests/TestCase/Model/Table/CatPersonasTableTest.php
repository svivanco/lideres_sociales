<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatPersonasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatPersonasTable Test Case
 */
class CatPersonasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatPersonasTable
     */
    public $CatPersonas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_personas',
        'app.cat_rangos_personas',
        'app.cat_municipios',
        'app.cat_estados',
        'app.cat_localidades',
        'app.cat_colonias',
        'app.cat_personas_cat_colonias',
        'app.cat_zonas_influencias',
        'app.cat_nivel_academicos',
        'app.cat_actividades',
        'app.cat_personas_cat_actividades',
        'app.cat_capacidades',
        'app.cat_personas_cat_capacidades',
        'app.cat_causas_sociales',
        'app.cat_personas_cat_causas_sociales',
        'app.cat_preparacion_areas',
        'app.cat_personas_cat_preparacion_areas',
        'app.cat_temas',
        'app.cat_personas_cat_temas',
        'app.cat_partidos_politicos',
        'app.cat_personas_cat_partidos_politicos',
        'app.cat_redes_sociales',
        'app.cat_personas_cat_redes_sociales',
        'app.cat_grados_participaciones',
        'app.cat_personas_cat_grados_participaciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatPersonas') ? [] : ['className' => 'App\Model\Table\CatPersonasTable'];
        $this->CatPersonas = TableRegistry::get('CatPersonas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatPersonas);

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
