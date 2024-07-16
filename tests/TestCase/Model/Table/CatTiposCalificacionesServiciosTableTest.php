<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatTiposCalificacionesServiciosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatTiposCalificacionesServiciosTable Test Case
 */
class CatTiposCalificacionesServiciosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatTiposCalificacionesServiciosTable
     */
    public $CatTiposCalificacionesServicios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_tipos_calificaciones_servicios',
        'app.cat_calificaciones_servicios',
        'app.cat_tipos_calificaciones_servicios_cat_calificaciones_servicios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatTiposCalificacionesServicios') ? [] : ['className' => 'App\Model\Table\CatTiposCalificacionesServiciosTable'];
        $this->CatTiposCalificacionesServicios = TableRegistry::get('CatTiposCalificacionesServicios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatTiposCalificacionesServicios);

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
