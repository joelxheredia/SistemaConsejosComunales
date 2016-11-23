<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $cedulaPersona
 * @property string $primerNombre
 * @property string $segundoNombre
 * @property string $primerApellido
 * @property string $segundoApelllido
 * @property string $fechaNacimiento
 * @property integer $edad
 * @property string $sexo
 * @property string $direccion
 * @property string $incapacidad
 * @property string $pensionado
 * @property integer $TipoIdentificacion_idTipoIdentificacion
 * @property integer $NivelInstruccion_idNivelInstruccion
 * @property integer $EstadosCiviles_idEstadosCiviles
 * @property integer $Cargo_idCargo
 * @property integer $ConsejoComunal_idConsejoComunal
 * @property integer $Persona_cedulaPersona
 *
 * @property Cargo $cargoIdCargo
 * @property Consejocomunal $consejoComunalIdConsejoComunal
 * @property Estadosciviles $estadosCivilesIdEstadosCiviles
 * @property Nivelinstruccion $nivelInstruccionIdNivelInstruccion
 * @property Persona $personaCedulaPersona
 * @property Persona[] $personas
 * @property Tipoidentificacion $tipoIdentificacionIdTipoIdentificacion
 * @property Solicitudes[] $solicitudes
 * @property Usuario[] $usuarios
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['primerNombre', 'primerApellido', 'fechaNacimiento', 'edad', 'sexo', 'TipoIdentificacion_idTipoIdentificacion', 'NivelInstruccion_idNivelInstruccion', 'EstadosCiviles_idEstadosCiviles', 'Cargo_idCargo', 'ConsejoComunal_idConsejoComunal'], 'required'],
            [['fechaNacimiento'], 'safe'],
            [['edad', 'TipoIdentificacion_idTipoIdentificacion', 'NivelInstruccion_idNivelInstruccion', 'EstadosCiviles_idEstadosCiviles', 'Cargo_idCargo', 'ConsejoComunal_idConsejoComunal', 'Persona_cedulaPersona'], 'integer'],
            [['primerNombre', 'segundoNombre', 'primerApellido', 'segundoApelllido'], 'string', 'max' => 30],
            [['sexo'], 'string', 'max' => 10],
            [['direccion'], 'string', 'max' => 100],
            [['incapacidad', 'pensionado'], 'string', 'max' => 4],
            [['Cargo_idCargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['Cargo_idCargo' => 'idCargo']],
            [['ConsejoComunal_idConsejoComunal'], 'exist', 'skipOnError' => true, 'targetClass' => Consejocomunal::className(), 'targetAttribute' => ['ConsejoComunal_idConsejoComunal' => 'idConsejoComunal']],
            [['EstadosCiviles_idEstadosCiviles'], 'exist', 'skipOnError' => true, 'targetClass' => Estadosciviles::className(), 'targetAttribute' => ['EstadosCiviles_idEstadosCiviles' => 'idEstadosCiviles']],
            [['NivelInstruccion_idNivelInstruccion'], 'exist', 'skipOnError' => true, 'targetClass' => Nivelinstruccion::className(), 'targetAttribute' => ['NivelInstruccion_idNivelInstruccion' => 'idNivelInstruccion']],
            [['Persona_cedulaPersona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['Persona_cedulaPersona' => 'cedulaPersona']],
            [['TipoIdentificacion_idTipoIdentificacion'], 'exist', 'skipOnError' => true, 'targetClass' => Tipoidentificacion::className(), 'targetAttribute' => ['TipoIdentificacion_idTipoIdentificacion' => 'idTipoIdentificacion']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cedulaPersona' => 'Cédula',
            'primerNombre' => 'Primer Nombre',
            'segundoNombre' => 'Segundo Nombre',
            'primerApellido' => 'Primer Apellido',
            'segundoApelllido' => 'Segundo Apelllido',
            'fechaNacimiento' => 'Fecha Nacimiento',
            'edad' => 'Edad',
            'sexo' => 'Sexo',
            'direccion' => 'Dirección',
            'incapacidad' => 'Incapacidad',
            'pensionado' => 'Pensionado',
            'TipoIdentificacion_idTipoIdentificacion' => 'Tipo Identificacion',
            'NivelInstruccion_idNivelInstruccion' => 'Nivel Instruccion',
            'EstadosCiviles_idEstadosCiviles' => 'Estado Civil',
            'Cargo_idCargo' => 'Cargo',
            'ConsejoComunal_idConsejoComunal' => 'Consejo Comunal',
            'Persona_cedulaPersona' => 'Persona Cedula Persona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargoIdCargo()
    {
        return $this->hasOne(Cargo::className(), ['idCargo' => 'Cargo_idCargo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsejoComunalIdConsejoComunal()
    {
        return $this->hasOne(Consejocomunal::className(), ['idConsejoComunal' => 'ConsejoComunal_idConsejoComunal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadosCivilesIdEstadosCiviles()
    {
        return $this->hasOne(Estadosciviles::className(), ['idEstadosCiviles' => 'EstadosCiviles_idEstadosCiviles']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNivelInstruccionIdNivelInstruccion()
    {
        return $this->hasOne(Nivelinstruccion::className(), ['idNivelInstruccion' => 'NivelInstruccion_idNivelInstruccion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaCedulaPersona()
    {
        return $this->hasOne(Persona::className(), ['cedulaPersona' => 'Persona_cedulaPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['Persona_cedulaPersona' => 'cedulaPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoIdentificacionIdTipoIdentificacion()
    {
        return $this->hasOne(Tipoidentificacion::className(), ['idTipoIdentificacion' => 'TipoIdentificacion_idTipoIdentificacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitudes()
    {
        return $this->hasMany(Solicitudes::className(), ['Persona_cedulaPersona' => 'cedulaPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['Persona_cedulaPersona' => 'cedulaPersona']);
    }
}
