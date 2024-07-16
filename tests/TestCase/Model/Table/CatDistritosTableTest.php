<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatDistritosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatDistritosTable Test Case
 */
class CatDistritosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatDistritosTable
     */
    public $CatDistritos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_distritos',
        'app.cat_secciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatDistritos') ? [] : ['className' => 'App\Model\Table\CatDistritosTable'];
        $this->CatDistritos = TableRegistry::get('CatDistritos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatDistritos);

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
