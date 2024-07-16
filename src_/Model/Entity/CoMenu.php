<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CoMenu Entity.
 *
 * @property int $id
 * @property int $co_menu_id
 * @property string $name
 * @property string $destino
 * @property int $posicion
 * @property bool $activo
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\CoMenu[] $co_menus
 * @property \App\Model\Entity\CoGrupo[] $co_grupos
 */
class CoMenu extends Entity
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
        'id' => false,
    ];
}
