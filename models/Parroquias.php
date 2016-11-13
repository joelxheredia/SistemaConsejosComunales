<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parroquias".
 *
 * @property integer $idParroquias
 * @property string $NombreParroquia
 * @property integer $Municipios_idMunicipios
 *
 * @property Consejocomunal[] $consejocomunals
 * @property Municipios $municipiosIdMunicipios
 */
class Parroquias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parroquias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NombreParroquia', 'Municipios_idMunicipios'], 'required'],
            [['Municipios_idMunicipios'], 'integer'],
            [['NombreParroquia'], 'string', 'max' => 60],
            [['Municipios_idMunicipios'], 'exist', 'skipOnError' => true, 'targetClass' => Municipios::className(), 'targetAttribute' => ['Municipios_idMunicipios' => 'idMunicipios']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idParroquias' => 'Parroquia',
            'NombreParroquia' => 'Nombre Parroquia',
            'Municipios_idMunicipios' => 'Municipios Id Municipios',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsejocomunals()
    {
        return $this->hasMany(Consejocomunal::className(), ['Parroquias_idParroquias' => 'idParroquias']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipiosIdMunicipios()
    {
        return $this->hasOne(Municipios::className(), ['idMunicipios' => 'Municipios_idMunicipios']);
    }
}
