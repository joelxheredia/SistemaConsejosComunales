<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solicitudes".
 *
 * @property integer $idSolicitudes
 * @property string $fechaRealizacion
 * @property integer $Persona_cedulaPersona
 * @property integer $ConsejoComunal_idConsejoComunal
 * @property integer $TipoSolicitud_idTipoSolicitud
 * @property string $codReferecia
 *
 * @property EstadoSolicitudes[] $estadoSolicitudes
 * @property Consejocomunal $consejoComunalIdConsejoComunal
 * @property Persona $personaCedulaPersona
 * @property Tiposolicitud $tipoSolicitudIdTipoSolicitud
 */
class Solicitudes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solicitudes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['fechaRealizacion'], 'safe'],
            [['Persona_cedulaPersona', 'ConsejoComunal_idConsejoComunal', 'TipoSolicitud_idTipoSolicitud'], 'integer'],
            [['codReferecia'], 'string', 'max' => 15],
            [['ConsejoComunal_idConsejoComunal'], 'exist', 'skipOnError' => true, 'targetClass' => Consejocomunal::className(), 'targetAttribute' => ['ConsejoComunal_idConsejoComunal' => 'idConsejoComunal']],
            [['Persona_cedulaPersona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['Persona_cedulaPersona' => 'cedulaPersona']],
            [['TipoSolicitud_idTipoSolicitud'], 'exist', 'skipOnError' => true, 'targetClass' => Tiposolicitud::className(), 'targetAttribute' => ['TipoSolicitud_idTipoSolicitud' => 'idTipoSolicitud']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'idSolicitudes' => 'Solicitud',
            'fechaRealizacion' => 'Fecha de Solicitud',
            'Persona_cedulaPersona' => 'Cédula Jefe de Familia',
            'ConsejoComunal_idConsejoComunal' => 'Consejo Comunal',
            'TipoSolicitud_idTipoSolicitud' => 'Tipo Solicitud',
            'codReferecia' => 'Código de Referecia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoSolicitudes()
    {
        return $this->hasMany(EstadoSolicitudes::className(), ['Solicitudes_idSolicitudes' => 'idSolicitudes']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsejoComunalIdConsejoComunal()
    {
        return $this->hasOne(Consejocomunal::className(), ['idConsejoComunal' => 'ConsejoComunal_idConsejoComunal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaCedulaPersona()
    {
        return $this->hasOne(Persona::className(), ['cedulaPersona' => 'Persona_cedulaPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoSolicitudIdTipoSolicitud()
    {
        return $this->hasOne(Tiposolicitud::className(), ['idTipoSolicitud' => 'TipoSolicitud_idTipoSolicitud']);
    }
}
