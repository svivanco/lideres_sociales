<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatMotivosVisitasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatMotivosVisitasTable Test Case
 */
class CatMotivosVisitasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatMotivosVisitasTable
     */
    public $CatMotivosVisitas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_motivos_visitas',
        'app.ope_visitas',
        'app.ope_visitas_cat_motivos_visitas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatMotivosVisitas') ? [] : ['className' => 'App\Model\Table\CatMotivosVisitasTable'];
        $this->CatMotivosVisitas = TableRegistry::get('CatMotivosVisitas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatMotivosVisitas);

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
