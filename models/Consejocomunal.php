<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "consejocomunal".
 *
 * @property integer $idConsejoComunal
 * @property string $NombreConsejoComunal
 * @property string $fechaInscripcionConsejoComunal
 * @property integer $Parroquias_idParroquias
 *
 * @property Parroquias $parroquiasIdParroquias
 * @property Persona[] $personas
 * @property Solicitudes[] $solicitudes
 */
class Consejocomunal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'consejocomunal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NombreConsejoComunal', 'fechaInscripcionConsejoComunal', 'Parroquias_idParroquias'], 'required'],
            [['fechaInscripcionConsejoComunal'], 'safe'],
            [['Parroquias_idParroquias'], 'integer'],
            [['NombreConsejoComunal'], 'string', 'max' => 50],
            [['Parroquias_idParroquias'], 'exist', 'skipOnError' => true, 'targetClass' => Parroquias::className(), 'targetAttribute' => ['Parroquias_idParroquias' => 'idParroquias']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idConsejoComunal' => 'Id Consejo Comunal',
            'NombreConsejoComunal' => 'Nombre Consejo Comunal',
            'fechaInscripcionConsejoComunal' => 'Fecha Inscripcion Consejo Comunal',
            'Parroquias_idParroquias' => 'Parroquias',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParroquiasIdParroquias()
    {
        return $this->hasOne(Parroquias::className(), ['idParroquias' => 'Parroquias_idParroquias']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['ConsejoComunal_idConsejoComunal' => 'idConsejoComunal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitudes()
    {
        return $this->hasMany(Solicitudes::className(), ['ConsejoComunal_idConsejoComunal' => 'idConsejoComunal']);
    }

}
