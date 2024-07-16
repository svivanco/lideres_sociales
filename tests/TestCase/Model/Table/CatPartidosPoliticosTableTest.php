<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatPartidosPoliticosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatPartidosPoliticosTable Test Case
 */
class CatPartidosPoliticosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatPartidosPoliticosTable
     */
    public $CatPartidosPoliticos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_partidos_politicos',
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
        'app.cat_personas_cat_partidos_politicos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatPartidosPoliticos') ? [] : ['className' => 'App\Model\Table\CatPartidosPoliticosTable'];
        $this->CatPartidosPoliticos = TableRegistry::get('CatPartidosPoliticos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatPartidosPoliticos);

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
