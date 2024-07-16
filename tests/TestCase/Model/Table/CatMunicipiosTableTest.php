<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatMunicipiosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatMunicipiosTable Test Case
 */
class CatMunicipiosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatMunicipiosTable
     */
    public $CatMunicipios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_municipios',
        'app.cat_localidades',
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
        $config = TableRegistry::exists('CatMunicipios') ? [] : ['className' => 'App\Model\Table\CatMunicipiosTable'];
        $this->CatMunicipios = TableRegistry::get('CatMunicipios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatMunicipios);

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
