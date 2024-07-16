<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OpeVisitasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OpeVisitasTable Test Case
 */
class OpeVisitasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OpeVisitasTable
     */
    public $OpeVisitas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ope_visitas',
        'app.cat_personas',
        'app.co_usuarios',
        'app.cat_nivel_academicos',
        'app.co_grupos',
        'app.co_menus',
        'app.co_grupos_co_menus',
        'app.co_permisos',
        'app.co_grupos_co_permisos',
        'app.co_usuarios_co_grupos',
        'app.cat_unidades',
        'app.cat_tipos_unidades_centrales',
        'app.cat_jurisdicciones',
        'app.cat_municipios',
        'app.cat_estados',
        'app.cat_localidades',
        'app.cat_ocupaciones',
        'app.cat_nivel_estudios',
        'app.cat_localidad_nacimiento',
        'app.ope_enfermedades_personas',
        'app.cat_enfermedades',
        'app.ope_enfermedadesl_personas',
        'app.cat_calificaciones_servicios',
        'app.cat_tipos_calificaciones_servicios',
        'app.cat_tipos_calificaciones_servicios_cat_calificaciones_servicios',
        'app.cat_motivos_visitas',
        'app.ope_visitas_cat_motivos_visitas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OpeVisitas') ? [] : ['className' => 'App\Model\Table\OpeVisitasTable'];
        $this->OpeVisitas = TableRegistry::get('OpeVisitas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OpeVisitas);

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
