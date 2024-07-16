<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CatPersona Entity
 *
 * @property string $id
 * @property string $cat_municipio_id
 * @property string $cat_localidade_id
 * @property string $cat_colonias_id
 * @property string $cat_seccione_id
 * @property string $cat_cargo_id
 * @property string $nombre
 * @property string $paterno
 * @property string $materno
 * @property int $edad
 * @property string $sexo
 * @property string $telefono
 * @property string $email
 * @property string $red_social
 * @property string $tiempo_residencia
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\CatRangosPersona $cat_rangos_persona
 * @property \App\Model\Entity\CatMunicipio $cat_municipio
 * @property \App\Model\Entity\CatLocalidade $cat_localidade
 * @property \App\Model\Entity\CatColonia[] $cat_colonias
 * @property \App\Model\Entity\CatZonasInfluencia $cat_zonas_influencia
 * @property \App\Model\Entity\CatNivelAcademico $cat_nivel_academico
 * @property \App\Model\Entity\CatActividade[] $cat_actividades
 * @property \App\Model\Entity\CatCapacidade[] $cat_capacidades
 * @property \App\Model\Entity\CatCausasSociale[] $cat_causas_sociales
 * @property \App\Model\Entity\CatPreparacionArea[] $cat_preparacion_areas
 * @property \App\Model\Entity\CatTema[] $cat_temas
 * @property \App\Model\Entity\CatPartidosPolitico[] $cat_partidos_politicos
 * @property \App\Model\Entity\CatRedesSociale[] $cat_redes_sociales
 * @property \App\Model\Entity\CatGradosParticipacione[] $cat_grados_participaciones
 */
class CatPersona extends Entity
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

    protected $_virtual = ['nombre_completo','edad'];
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected function _getNombreCompleto()
    {
        $nombre_completo = $this->nombre." ".$this->paterno." ".$this->materno;
        return $nombre_completo;
    }
    protected function _getEdad()
    {
        if($this->_properties['fecha_nacimiento']){
            $fecha_nacimiento = $this->_properties['fecha_nacimiento']->format('d-m-Y');
            $dias = explode("-",$fecha_nacimiento,3);
            $dias = mktime(0,0,0,$dias[1],$dias[0],$dias[2]);
            $edad = (int)((time()-$dias)/31556926);
            return $edad;
        }
    }
}
