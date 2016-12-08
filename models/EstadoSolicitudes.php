<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_solicitudes".
 *
 * @property integer $idEstado_Solicitud
 * @property string $fechaEstado
 * @property integer $Solicitudes_idSolicitudes
 * @property integer $Estados_idEstados
 * @property integer $Persona_CedulaPersonaVocero
 *
 * @property Estados $estadosIdEstados
 * @property Solicitudes $solicitudesIdSolicitudes
 * @property Persona $personaCedulaPersonaVocero
 */
class EstadoSolicitudes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_solicitudes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fechaEstado', 'Solicitudes_idSolicitudes', 'Estados_idEstados'], 'required'],
            [['fechaEstado'], 'safe'],
            [['Solicitudes_idSolicitudes', 'Estados_idEstados', 'Persona_CedulaPersonaVocero'], 'integer'],
            [['Estados_idEstados'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['Estados_idEstados' => 'idEstados']],
            [['Solicitudes_idSolicitudes'], 'exist', 'skipOnError' => true, 'targetClass' => Solicitudes::className(), 'targetAttribute' => ['Solicitudes_idSolicitudes' => 'idSolicitudes']],
            [['Persona_CedulaPersonaVocero'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['Persona_CedulaPersonaVocero' => 'cedulaPersona']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEstado_Solicitud' => 'Id Estado  Solicitud',
            'fechaEstado' => 'Fecha Estado',
            'Solicitudes_idSolicitudes' => 'Solicitudes Id Solicitudes',
            'Estados_idEstados' => 'Estados Id Estados',
            'Persona_CedulaPersonaVocero' => 'Persona  Cedula Persona Vocero',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadosIdEstados()
    {
        return $this->hasOne(Estados::className(), ['idEstados' => 'Estados_idEstados']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitudesIdSolicitudes()
    {
        return $this->hasOne(Solicitudes::className(), ['idSolicitudes' => 'Solicitudes_idSolicitudes']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaCedulaPersonaVocero()
    {
        return $this->hasOne(Persona::className(), ['cedulaPersona' => 'Persona_CedulaPersonaVocero']);
    }
}
