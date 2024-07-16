<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CatPersonasController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CatPersonasController Test Case
 */
class CatPersonasControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_personas',
        'app.cat_nivel_academicos',
        'app.cat_capacidades',
        'app.cat_personas_cat_capacidades',
        'app.cat_preparacion_areas',
        'app.cat_personas_cat_preparacion_areas',
        'app.cat_temas',
        'app.cat_personas_cat_temas'
    ];

    /**
     * Test getData method
     *
     * @return void
     */
    public function testGetData()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
