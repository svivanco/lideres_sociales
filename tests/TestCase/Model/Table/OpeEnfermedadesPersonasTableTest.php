<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OpeEnfermedadesPersonasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OpeEnfermedadesPersonasTable Test Case
 */
class OpeEnfermedadesPersonasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OpeEnfermedadesPersonasTable
     */
    public $OpeEnfermedadesPersonas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ope_enfermedades_personas',
        'app.co_usuarios',
        'app.cat_nivel_academicos',
        'app.co_grupos',
        'app.co_menus',
        'app.co_grupos_co_menus',
        'app.co_permisos',
        'app.co_grupos_co_permisos',
        'app.co_usuarios_co_grupos',
        'app.cat_personas',
        'app.cat_unidades',
        'app.cat_tipos_unidades_centrales',
        'app.cat_jurisdicciones',
        'app.cat_municipios',
        'app.cat_estados',
        'app.cat_localidades',
        'app.cat_ocupaciones',
        'app.cat_nivel_estudios',
        'app.cat_localidad_nacimiento',
        'app.cat_enfermedades',
        'app.ope_enfermedadesl_personas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OpeEnfermedadesPersonas') ? [] : ['className' => 'App\Model\Table\OpeEnfermedadesPersonasTable'];
        $this->OpeEnfermedadesPersonas = TableRegistry::get('OpeEnfermedadesPersonas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OpeEnfermedadesPersonas);

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
