<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatCalificacionesServiciosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatCalificacionesServiciosTable Test Case
 */
class CatCalificacionesServiciosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatCalificacionesServiciosTable
     */
    public $CatCalificacionesServicios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_calificaciones_servicios',
        'app.ope_visitas',
        'app.cat_tipos_calificaciones_servicios',
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
        $config = TableRegistry::exists('CatCalificacionesServicios') ? [] : ['className' => 'App\Model\Table\CatCalificacionesServiciosTable'];
        $this->CatCalificacionesServicios = TableRegistry::get('CatCalificacionesServicios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatCalificacionesServicios);

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
