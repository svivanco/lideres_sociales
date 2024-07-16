<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CatColonia Entity
 *
 * @property string $id
 * @property int $codigo_postal
 * @property string $cat_estado_id
 * @property string $cat_municipio_id
 * @property string $ciudad
 * @property string $tipo_asentamiento
 * @property string $asentamiento
 * @property string $clave_oficina
 */
class CatColonia extends Entity
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
    
    
    protected $_virtual = ['name_completo'];

    protected function _getNameCompleto()
    {
        return $this->_properties['tipo_asentamiento'] . '  ' .$this->_properties['asentamiento'];
    }
    
}
