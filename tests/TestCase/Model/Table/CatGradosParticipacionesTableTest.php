<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatGradosParticipacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatGradosParticipacionesTable Test Case
 */
class CatGradosParticipacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatGradosParticipacionesTable
     */
    public $CatGradosParticipaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_grados_participaciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatGradosParticipaciones') ? [] : ['className' => 'App\Model\Table\CatGradosParticipacionesTable'];
        $this->CatGradosParticipaciones = TableRegistry::get('CatGradosParticipaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatGradosParticipaciones);

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
