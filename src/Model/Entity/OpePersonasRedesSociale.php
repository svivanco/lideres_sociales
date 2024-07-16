<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OpePersonasRedesSociale Entity
 *
 * @property string $id
 * @property string $cat_persona_id
 * @property string $cat_redes_sociale_id
 * @property string $enlace
 * @property bool $activo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\CatPersona $cat_persona
 * @property \App\Model\Entity\CatRedesSociale $cat_redes_sociale
 */
class OpePersonasRedesSociale extends Entity
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
