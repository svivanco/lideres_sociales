<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatTiposServiciosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatTiposServiciosTable Test Case
 */
class CatTiposServiciosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatTiposServiciosTable
     */
    public $CatTiposServicios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_tipos_servicios',
        'app.ope_detalle_servicios',
        'app.cat_categorias_servicios',
        'app.cat_categorias_servicios_cat_tipos_servicios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatTiposServicios') ? [] : ['className' => 'App\Model\Table\CatTiposServiciosTable'];
        $this->CatTiposServicios = TableRegistry::get('CatTiposServicios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatTiposServicios);

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
