<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatEstadosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatEstadosTable Test Case
 */
class CatEstadosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatEstadosTable
     */
    public $CatEstados;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_estados',
        'app.cat_municipios',
        'app.cat_localidades',
        'app.cat_unidades',
        'app.cat_tipos_unidades_centrales',
        'app.co_usuarios',
        'app.co_grupos',
        'app.co_menus',
        'app.co_grupos_co_menus',
        'app.co_permisos',
        'app.co_grupos_co_permisos',
        'app.co_usuarios_co_grupos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatEstados') ? [] : ['className' => 'App\Model\Table\CatEstadosTable'];
        $this->CatEstados = TableRegistry::get('CatEstados', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatEstados);

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
