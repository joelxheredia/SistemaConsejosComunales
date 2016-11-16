<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cargo".
 *
 * @property integer $idCargo
 * @property string $nombreCargo
 * @property string $descripcionCargo
 *
 * @property Persona[] $personas
 */
class Cargo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cargo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreCargo'], 'required'],
            [['nombreCargo'], 'string', 'max' => 50],
            [['descripcionCargo'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCargo' => 'Id Cargo',
            'nombreCargo' => 'Nombre Cargo',
            'descripcionCargo' => 'Descripcion Cargo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['Cargo_idCargo' => 'idCargo']);
    }
}
