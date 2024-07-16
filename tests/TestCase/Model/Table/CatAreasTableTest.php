<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatAreasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatAreasTable Test Case
 */
class CatAreasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatAreasTable
     */
    public $CatAreas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_areas',
        'app.cat_personales'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatAreas') ? [] : ['className' => 'App\Model\Table\CatAreasTable'];
        $this->CatAreas = TableRegistry::get('CatAreas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatAreas);

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
