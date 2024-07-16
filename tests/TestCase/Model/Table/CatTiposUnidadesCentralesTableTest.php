<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatTiposUnidadesCentralesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatTiposUnidadesCentralesTable Test Case
 */
class CatTiposUnidadesCentralesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatTiposUnidadesCentralesTable
     */
    public $CatTiposUnidadesCentrales;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_tipos_unidades_centrales',
        'app.cat_unidades',
        'app.cat_jurisdicciones',
        'app.cat_municipios',
        'app.cat_localidades',
        'app.cat_personas',
        'app.co_usuarios',
        'app.cat_nivel_academicos',
        'app.co_grupos',
        'app.co_menus',
        'app.co_grupos_co_menus',
        'app.co_permisos',
        'app.co_grupos_co_permisos',
        'app.co_usuarios_co_grupos',
        'app.cat_ocupaciones',
        'app.cat_nivel_estudios',
        'app.cat_localidad_nacimiento',
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
        $config = TableRegistry::exists('CatTiposUnidadesCentrales') ? [] : ['className' => 'App\Model\Table\CatTiposUnidadesCentralesTable'];
        $this->CatTiposUnidadesCentrales = TableRegistry::get('CatTiposUnidadesCentrales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatTiposUnidadesCentrales);

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
