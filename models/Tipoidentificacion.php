<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipoidentificacion".
 *
 * @property integer $idTipoIdentificacion
 * @property string $descripcion
 *
 * @property Persona[] $personas
 */
class Tipoidentificacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipoidentificacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTipoIdentificacion' => 'Id Tipo Identificacion',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['TipoIdentificacion_idTipoIdentificacion' => 'idTipoIdentificacion']);
    }
}
