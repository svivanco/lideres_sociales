<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CatLocalidade Entity
 *
 * @property int $id
 * @property int $cat_municipio_id
 * @property string $clave
 * @property string $name
 * @property string $latitud
 * @property string $longitud
 * @property float $lat
 * @property float $lng
 * @property string $altitud
 * @property bool $activo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\CatMunicipio $cat_municipio
 * @property \App\Model\Entity\CatPersona[] $cat_personas
 */
class CatLocalidade extends Entity
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
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
