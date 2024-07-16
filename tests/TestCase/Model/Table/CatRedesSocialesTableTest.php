<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatRedesSocialesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatRedesSocialesTable Test Case
 */
class CatRedesSocialesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatRedesSocialesTable
     */
    public $CatRedesSociales;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_redes_sociales',
        'app.cat_personas',
        'app.cat_municipios',
        'app.cat_estados',
        'app.cat_localidades',
        'app.cat_colonias',
        'app.cat_personas_cat_colonias',
        'app.cat_secciones',
        'app.cat_distritos',
        'app.cat_cargos',
        'app.ope_personas_redes_sociales',
        'app.cat_actividades',
        'app.cat_personas_cat_actividades',
        'app.cat_temas',
        'app.cat_personas_cat_temas',
        'app.cat_personas_cat_redes_sociales'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatRedesSociales') ? [] : ['className' => 'App\Model\Table\CatRedesSocialesTable'];
        $this->CatRedesSociales = TableRegistry::get('CatRedesSociales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatRedesSociales);

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
