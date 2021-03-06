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
 * @property integer $rol
 *
 * @property Persona $personaCedulaPersona
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
        public $name;
        public $surname;
        public $state;
        public $emailForm;
        public $subject;
        public $body;
        public $contrasena2;

    public static function isUserFundacomunal($id){
        if(Usuario::findOne(['idUsuario'=>$id,'rol'=>1])){
            return true;
        } else {
            return false;
        }
    }
      public static function isUserVocero($id){
        if(Usuario::findOne(['idUsuario'=>$id,'rol'=>2])){
            return true;
        } else {
            return false;
        }
    }
      public static function isUserJefeFamilia($id){
        if(Usuario::findOne(['idUsuario'=>$id,'rol'=>3])){
            return true;
        } else {
            return false;
        }
    }
    public static function UbicacionUsuario($id){
        $usu = new Usuario();
        $usu=Usuario::findONe(['idUsuario'=>$id]);
        $pers= new Persona();
        $pers=Persona::findOne(['cedulaPersona'=>$usu->Persona_cedulaPersona]);
        $cons= new Consejocomunal();
        $cons= Consejocomunal::findOne(['idConsejoComunal'=>$pers->ConsejoComunal_idConsejoComunal]);
        $parr= new Parroquias();
        $parr=Parroquias::findOne(['idParroquias'=>$cons->Parroquias_idParroquias]);
        $municipio = new Municipios();
        $municipio=Municipios::findOne(['idMunicipios'=>$parr->Municipios_idMunicipios]);
        $estados= new Estadosvenezuela();
        $estados=Estadosvenezuela::findOne(['idEstadosVenezuela'=>$municipio->Estados_idEstados]);
        
        return $estados->idEstadosVenezuela;
    }
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
            [['name','surname','state','emailForm','subject','body','contransena2'], 'safe'],
            [['fechaCreacion'], 'safe'],
       //     [['contrasena2'],'compare','compareAtrribute'=>'contrasena','operator'=>'=','message'=>'las contraseñas no son iguales'],
            [['Persona_cedulaPersona', 'rol'], 'integer'],
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
            'rol' => 'Rol',
            'body'=>'',
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

    public function contact($email)
    {
    
        $this->emailForm="consejoscomunalesve@gmail.com";
        $this->name="Consejos Comunales Venezuela";
        $this->subject="Clave de Acceso";
        $this->body="Las siguientes son sus credenciales de usuario";
        $this->body.="Usuario ".$this->nombreUsuario." Contraseña ".$this->contrasena;
        $this->body.="Por favor complete sus datos en el siguiente enlace: http://localhost:9090/persona/create?id=".$this->idUsuario;

        $content= "<p>Email: ". $this->emailForm ."</p>";
        $content.="<p>Name: " . $this->name. "</p>";
        $content.="<p>subject: " . $this->subject . "</p>";
        $content.="<p>Body: " . $this->body. "</p>";

        if ($this->validate()) {
            Yii::$app->mailer->compose("@app/mail/layouts/html",["content"=>$content])
                ->setTo($email)
                ->setFrom([$this->emailForm => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }

     public function contactohome($email)
    {
    
      //  $this->emailForm="consejoscomunalesve@gmail.com";
        //$this->name="Consejos Comunales Venezuela";
        //$this->subject="Clave de Acceso";
        //$this->body="Las siguientes son sus credenciales de usuario";
        //$this->body.="Usuario ".$this->nombreUsuario." Contraseña ".$this->contrasena;
        //$this->body.="Por favor complete sus datos en el siguiente enlace: http://localhost:9090/persona/create?id=".$this->idUsuario;

        $content= "<p>Email: ". $this->emailForm ."</p>";
        $content.="<p>Nombre: " . $this->name. "</p>";
        $content.="<p>Asunto: " . $this->subject . "</p>";
        $content.="<p>Mensaje: " . $this->body. "</p>";

        //if ($this->validate()) {
            Yii::$app->mailer->compose("@app/mail/layouts/html",["content"=>$content])
                ->setTo($email)
                ->setFrom([$this->emailForm => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        //}
        return false;
    }
}
