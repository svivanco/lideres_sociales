<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/**
 * CatMunicipio Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\CatLocalidade[] $cat_localidades
 * @property \App\Model\Entity\CatPersona[] $cat_personas
 * @property \App\Model\Entity\CatUnidade[] $cat_unidades
 */
class CatMunicipio extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_virtual = ['lideres','coordinadores','promotores'];
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected function _getLideres() // Lideres municipales
    {
        $catPersonas = TableRegistry::get('CatPersonas')
            ->find()
            ->where(
            [
                'CatPersonas.cat_municipio_id'=>$this->_properties['id'],
                'CatPersonas.cat_cargo_id'=> "4e52048b-c814-4d61-977e-31c5b6b7b8ca"
            ]
        )->count();
        return $catPersonas;

    }
    protected function _getCoordinadores() // coordinadores
    {
        $catPersonas = TableRegistry::get('CatPersonas')
            ->find()
            ->where(
                [
                    'CatPersonas.cat_municipio_id'=>$this->_properties['id'],
                    'CatPersonas.cat_cargo_id'=> "bf294131-c603-47e0-b315-7df7455716a7"
                ]
            )->count();
        return $catPersonas;

    }

    protected function _getPromotores() //Promotores
    {
        $catPersonas = TableRegistry::get('CatPersonas')
            ->find()
            ->where(
                [
                    'CatPersonas.cat_municipio_id'=>$this->_properties['id'],
                    'CatPersonas.cat_cargo_id'=> "3b4b8a85-02d8-49e5-94df-64c4247187f8"
                ]
            )->count();
        return $catPersonas;

    }
}

