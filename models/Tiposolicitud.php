<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tiposolicitud".
 *
 * @property integer $idTipoSolicitud
 * @property string $descripcionTipoSolicitud
 *
 * @property Solicitudes[] $solicitudes
 */
class Tiposolicitud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tiposolicitud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcionTipoSolicitud'], 'required'],
            [['descripcionTipoSolicitud'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTipoSolicitud' => 'Id Tipo Solicitud',
            'descripcionTipoSolicitud' => 'Descripcion Tipo Solicitud',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitudes()
    {
        return $this->hasMany(Solicitudes::className(), ['TipoSolicitud_idTipoSolicitud' => 'idTipoSolicitud']);
    }
}
