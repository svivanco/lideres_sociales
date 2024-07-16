<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatLocalidadesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatLocalidadesTable Test Case
 */
class CatLocalidadesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatLocalidadesTable
     */
    public $CatLocalidades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_localidades',
        'app.cat_municipios',
        'app.cat_unidades_centrales'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatLocalidades') ? [] : ['className' => 'App\Model\Table\CatLocalidadesTable'];
        $this->CatLocalidades = TableRegistry::get('CatLocalidades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatLocalidades);

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
