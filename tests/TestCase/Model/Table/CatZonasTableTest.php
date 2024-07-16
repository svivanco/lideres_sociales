<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatZonasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatZonasTable Test Case
 */
class CatZonasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatZonasTable
     */
    public $CatZonas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_zonas',
        'app.cat_municipios',
        'app.cat_estados',
        'app.cat_localidades',
        'app.cat_unidades',
        'app.cat_tipos_unidades_centrales',
        'app.co_usuarios',
        'app.co_grupos',
        'app.co_menus',
        'app.co_grupos_co_menus',
        'app.co_permisos',
        'app.co_grupos_co_permisos',
        'app.co_usuarios_co_grupos',
        'app.cat_zonas_cat_municipios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatZonas') ? [] : ['className' => 'App\Model\Table\CatZonasTable'];
        $this->CatZonas = TableRegistry::get('CatZonas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatZonas);

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
