<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estadosvenezuela".
 *
 * @property integer $idEstadosVenezuela
 * @property string $descripcionEstados
 *
 * @property Municipios[] $municipios
 */
class Estadosvenezuela extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estadosvenezuela';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcionEstados'], 'required'],
            [['descripcionEstados'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEstadosVenezuela' => 'Id Estados Venezuela',
            'descripcionEstados' => 'Descripcion Estados',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipios()
    {
        return $this->hasMany(Municipios::className(), ['Estados_idEstados' => 'idEstadosVenezuela']);
    }
}
