<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estadosciviles".
 *
 * @property integer $idEstadosCiviles
 * @property string $decripcion
 *
 * @property Persona[] $personas
 */
class Estadosciviles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estadosciviles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['decripcion'], 'required'],
            [['decripcion'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEstadosCiviles' => 'Id Estados Civiles',
            'decripcion' => 'Decripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['EstadosCiviles_idEstadosCiviles' => 'idEstadosCiviles']);
    }
}
