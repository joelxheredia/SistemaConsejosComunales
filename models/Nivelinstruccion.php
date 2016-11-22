<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nivelinstruccion".
 *
 * @property integer $idNivelInstruccion
 * @property string $descripcion
 *
 * @property Persona[] $personas
 */
class Nivelinstruccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nivelinstruccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNivelInstruccion' => 'Id Nivel Instruccion',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['NivelInstruccion_idNivelInstruccion' => 'idNivelInstruccion']);
    }
}
