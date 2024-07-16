<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * CoUsuario Entity.
 *
 * @property int $id
 * @property string $nombre
 * @property string $paterno
 * @property string $materno
 * @property string $email
 * @property string $login
 * @property string $password
 * @property bool $activo
 * @property \Cake\I18n\Time $ultimo_acceso
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\CoGrupo[] $co_grupos
 */
class CoUsuario extends Entity
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

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected $_virtual = ['nombre_completo'];

    protected function _getNombreCompleto()
    {
        
    $titulo = "C.";
    if(!empty($this->_properties['cat_nivel_academico_id']))
       {
        $CatNivelAcademicos = TableRegistry::get('CatNivelAcademicos')->find()->where(['id'=>$this->_properties['cat_nivel_academico_id']])->first();
        $titulo = $CatNivelAcademicos->name;
       }

        return $titulo . '  ' .$this->_properties['nombre'] . '  ' .$this->_properties['paterno'].' '.$this->_properties['materno'];
    }

    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
