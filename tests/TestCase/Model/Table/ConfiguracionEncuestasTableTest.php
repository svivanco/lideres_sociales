<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConfiguracionEncuestasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConfiguracionEncuestasTable Test Case
 */
class ConfiguracionEncuestasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConfiguracionEncuestasTable
     */
    public $ConfiguracionEncuestas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.configuracion_encuestas',
        'app.ope_encuestas_servicios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ConfiguracionEncuestas') ? [] : ['className' => 'App\Model\Table\ConfiguracionEncuestasTable'];
        $this->ConfiguracionEncuestas = TableRegistry::get('ConfiguracionEncuestas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ConfiguracionEncuestas);

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
