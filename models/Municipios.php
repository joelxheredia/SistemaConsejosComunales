<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "municipios".
 *
 * @property integer $idMunicipios
 * @property string $nombreMunicipios
 * @property integer $Estados_idEstados
 *
 * @property Estadosvenezuela $estadosIdEstados
 * @property Parroquias[] $parroquias
 */
class Municipios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'municipios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreMunicipios', 'Estados_idEstados'], 'required'],
            [['Estados_idEstados'], 'integer'],
            [['nombreMunicipios'], 'string', 'max' => 60],
            [['Estados_idEstados'], 'exist', 'skipOnError' => true, 'targetClass' => Estadosvenezuela::className(), 'targetAttribute' => ['Estados_idEstados' => 'idEstadosVenezuela']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idMunicipios' => 'Id Municipios',
            'nombreMunicipios' => 'Nombre Municipios',
            'Estados_idEstados' => 'Estados Id Estados',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadosIdEstados()
    {
        return $this->hasOne(Estadosvenezuela::className(), ['idEstadosVenezuela' => 'Estados_idEstados']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParroquias()
    {
        return $this->hasMany(Parroquias::className(), ['Municipios_idMunicipios' => 'idMunicipios']);
    }
}
