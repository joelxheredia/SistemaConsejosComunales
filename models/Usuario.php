<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $idUsuario
 * @property string $nombreUsuario
 * @property string $contrasena
 * @property string $fechaCreacion
 * @property string $correoElectronico
 * @property integer $Persona_cedulaPersona
 *
 * @property Persona $personaCedulaPersona
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreUsuario', 'contrasena', 'fechaCreacion', 'correoElectronico'], 'required'],
            [['fechaCreacion'], 'safe'],
            [['Persona_cedulaPersona'], 'integer'],
            [['nombreUsuario', 'correoElectronico'], 'string', 'max' => 60],
            [['contrasena'], 'string', 'max' => 50],
            [['Persona_cedulaPersona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['Persona_cedulaPersona' => 'cedulaPersona']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'nombreUsuario' => 'Nombre Usuario',
            'contrasena' => 'Contrasena',
            'fechaCreacion' => 'Fecha Creacion',
            'correoElectronico' => 'Correo Electronico',
            'Persona_cedulaPersona' => 'Persona Cedula Persona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaCedulaPersona()
    {
        return $this->hasOne(Persona::className(), ['cedulaPersona' => 'Persona_cedulaPersona']);
    }

       public function getAuthKey()
    {
        return $this->idUsuario;
    }

     public function getId()
    {
        return $this->idUsuario;
    }

     public function validateAuthKey($authKey)
    {
        return $this->idUsuario === $authKey;
    }

       public static function findIdentity($id)
    {
        return self::findOne($id);
    }

     public static function findIdentityByAccessToken($token, $type = null)
    {
        
        throw new \yii\base\NotSupportedException();
        
    }
    public static function findByUsername($username){

        return self::findOne(['nombreUsuario'=>$username]);
    }
    public function validatePassword($password){
        return $this->contrasena===$password;
    }
}
