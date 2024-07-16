<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatCargosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatCargosTable Test Case
 */
class CatCargosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatCargosTable
     */
    public $CatCargos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_cargos',
        'app.cat_personas',
        'app.cat_municipios',
        'app.cat_estados',
        'app.cat_localidades',
        'app.cat_colonias',
        'app.cat_personas_cat_colonias',
        'app.cat_secciones',
        'app.cat_distritos',
        'app.ope_personas_redes_sociales',
        'app.cat_actividades',
        'app.cat_personas_cat_actividades',
        'app.cat_temas',
        'app.cat_personas_cat_temas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatCargos') ? [] : ['className' => 'App\Model\Table\CatCargosTable'];
        $this->CatCargos = TableRegistry::get('CatCargos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatCargos);

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
