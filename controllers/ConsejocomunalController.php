<?php

namespace app\controllers;

use Yii;
use app\models\Consejocomunal;
use app\models\ConsejocomunalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Parroquias;
use app\models\Municipios;
use app\models\EstadosVenezuela;
use app\models\BuscarConsejoForm;
use app\models\Usuario;
use app\models\Tiposolicitud;
use app\models\Solicitudes;
use yii\filters\AccessControl;

/**
 * ConsejocomunalController implements the CRUD actions for Consejocomunal model.
 */
class ConsejocomunalController extends Controller
{
    /**
     * @inheritdoc
     */
 /*   public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    */
    public function behaviors(){
        return [
            'access'=>[
                'class'=> AccessControl::className(),
                //acciones que se veran afectadas
                'only'=>['create','logout'],
                'rules'=>[
                 [
                 //el administrador tiene privilegios sobre las siguientes acciones
                 'actions'=>['create','logout'],
                 //Esta propiedad establece que tiene permisos
                 'allow'=>true,
                 //Usuarios autenticados, el signo ? es para invitados
                 'roles'=>['@'],
                 //Este metodo nos permite establecer un filtro sobre la identidad del usuario y asi establecer si tiene permisos o no
                 'matchCallback'=> function ($rule,$action){
                    //lamada al metodo que comprueba si es administrador
                    return Usuario::isUserFundacomunal(Yii::$app->user->identity->idUsuario);
                 },
                ],
            ],
            ],
            //Controla el modo en que se accede a las accioines
            // a las accioines solo se puede acceder por post
            'verbs'=>[
                'class'=>VerbFilter::className(),
                'actions'=>[
                    'logout'=>['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Consejocomunal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConsejocomunalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionContacto(){
        $usuario = new Usuario();
        if($usuario->load(Yii::$app->request->post())){

            echo $usuario->emailForm;
            echo $usuario->name;
            
          $usuario->contactohome("consejoscomunalesve@gmail.com");

            return $this->redirect(['site/contacto']);
        }

    }

    /**
     * Displays a single Consejocomunal model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Consejocomunal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($e)
    {

     
        $model = new Consejocomunal();
        $usuario= new Usuario();
        $usuariovocero;
        $passwordvocero;
       // $parroquias = Parroquias::find()->all();
       // $municipios = Municipios::find()->all();
        $municipios= new Municipios();

          if(!Yii::$app->user->isGuest){

        $usesion=Yii::$app->user->identity->idUsuario;
        $usuarioses= Usuario::find()->where(['idUsuario'=>$usesion])->one();
        $e=$usuarioses->personaCedulaPersona->consejoComunalIdConsejoComunal->parroquiasIdParroquias->municipiosIdMunicipios->estadosIdEstados->idEstadosVenezuela;
        $ne=$usuarioses->personaCedulaPersona->consejoComunalIdConsejoComunal->parroquiasIdParroquias->municipiosIdMunicipios->estadosIdEstados->descripcionEstados;
        }
//
        if ($model->load(Yii::$app->request->post()) && $usuario->load(Yii::$app->request->post()) &&$model->save()) {
            //*********************ESTO GENERA EL USUARIO Y LA CONTRASEÑA DEL VOCERO
            echo $model->NombreConsejoComunal;
            $array=explode(" ",$model->NombreConsejoComunal);
            print_r($array);
            //$usuariovocero=$array[0].$array[1]."_".$model->idConsejoComunal;
            $passwordvocero=$this->generaPass(6);
           // echo "Usuario: ".$usuariovocero." "."Password ".$passwordvocero;
            echo "<br>";
            $usuario->nombreUsuario=$usuario->correoElectronico;
            $usuario->contrasena=$passwordvocero;
            $usuario->fechaCreacion=date('Y-m-d');

            echo $usuario->nombreUsuario." ".$usuario->contrasena." ".$usuario->fechaCreacion." ".$usuario->correoElectronico;
            //GUARDANDO USUARIO DEL VOCERO
            
            $usuario->save();
            $usuario->contact($usuario->correoElectronico);
            //***************************************************************************

           //return $this->redirect(['view', 'id' => $model->idConsejoComunal]);
            return $this->redirect(['site/login']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'municipios' => $municipios,
                'usuario' => $usuario,

                'e'=>$e,

                'est' => $e,
                'ne'=> $ne,

                
            ]);
        }
    }



    public function actionVerificarcarta(){


         $solicitud= new Solicitudes();   
         $encontrada= " ";
         if($solicitud->load(Yii::$app->request->post())){
            //$encontrada="La carta fue emitida el: ";
            $encontrada= Solicitudes::find()->where(['codReferecia'=>$solicitud->codReferecia])->one();

            if($encontrada){

                 $consej= Consejocomunal::findOne($solicitud->ConsejoComunal_idConsejoComunal);

                 //$nombre = $consej->NombreConsejoComunal;

                $encontrada="La Carta fue emitida por el consejo comunal "/*.$consejos->NombreConsejoComunal*/;
            }else{
                 $encontrada="La referencia no corresponde con ninguna carta emitida por consejos comunales";
            }
         }

        
        return $this->render('verificarcarta', ["model"=>$solicitud,"resul"=>$encontrada,]);
    }

     public function actionListarparroquias($id)
    {
        $cantParroquias= Parroquias::find()->where(['Municipios_idMunicipios'=>$id])->count();
        $parroquias= Parroquias::find()->where(['Municipios_idMunicipios'=>$id])->all();

        if($cantParroquias>0){
            foreach ( $parroquias as $p) {
                echo "<option value='".$p->idParroquias."'>".$p->NombreParroquia."</option>";
            }
        }else{
                echo "<option>-</option>";
        }
       
    }

      public function actionListarconsejosp($id)
    {
        $cantConsejos= Consejocomunal::find()->where(['Parroquias_idParroquias'=>$id])->count();
        $consejos= Consejocomunal::find()->where(['Parroquias_idParroquias'=>$id])->all();

        if( $cantConsejos>0){
            foreach ( $consejos as $p) {
                echo "<option value='".$p->idConsejoComunal."'>".$p->NombreConsejoComunal."</option>";
            }
        }else{
                echo "<option>-</option>";
        }
       
    }

    public function actionListarmunicipios($id)
    {
        $cantParroquias= Municipios::find()->where(['Estados_idEstados'=>$id])->count();
        $parroquias= Municipios::find()->where(['Estados_idEstados'=>$id])->all();

        if($cantParroquias>0){
            foreach ( $parroquias as $p) {
                echo "<option value='".$p->idMunicipios."'>".$p->nombreMunicipios."</option>";
            }
        }else{
                echo "<option>-</option>";
        }
       
    }

    /**
     * Updates an existing Consejocomunal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idConsejoComunal]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Consejocomunal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Consejocomunal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Consejocomunal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Consejocomunal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected  function generaPass($longitudPass){
    //Se define una cadena de caractares. Te recomiendo que uses esta.
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    //Obtenemos la longitud de la cadena de caracteres
    $longitudCadena=strlen($cadena);
     
    //Se define la variable que va a contener la contraseña
    $pass = "";
    //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras

     
    //Creamos la contraseña
    for($i=1 ; $i<=$longitudPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos=rand(0,$longitudCadena-1);
     
        //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
}


    /**
    * Listar consejos comunales por información de ubicación
    *
    * @return mixed
    */
    public function actionListarconsejo()
    {
        //$consejos = Consejocomunal::find()->all();
        //$parroquias = Parroquias::find()->all();
        //$municipios = Municipios::find()->all();
        $estadosVenezuela = EstadosVenezuela::find()->all();
        $buscar = new BuscarConsejoForm();
        
        if(Yii::$app->request->post()){
            echo $buscar->buscar;
            $request = Yii::$app->request; 
            $buscar->buscar = $request->post('buscar');  
            $buscar->parroquia = $request->post('parroquia');    
            $buscar->estado = $request->post('estado');
            $buscar->municipio = $request->post('municipio'); 
        }
        return $this->render('listar', [
                //'consejos' => $consejos,
                //'parroquias' => $parroquias,
                //'municipios' => $municipios,
                'estadosVenezuela' => $estadosVenezuela,
                'buscar' => $buscar,
            ]);
    }

    public function actionListarconsejof(){

    if(!Yii::$app->user->isGuest){

       $usesion=Yii::$app->user->identity->idUsuario;
          $usuario= Usuario::find()->where(['idUsuario'=>$usesion])->one();

    $e=$usuario->personaCedulaPersona->consejoComunalIdConsejoComunal->parroquiasIdParroquias->municipiosIdMunicipios->estadosIdEstados->idEstadosVenezuela;
    }

 

       $estadosVenezuela = EstadosVenezuela::find()->all();
        $buscar = new BuscarConsejoForm();
        
        if(Yii::$app->request->post()){
            echo $buscar->buscar;
            $request = Yii::$app->request; 
            $buscar->buscar = $request->post('buscar');  
            $buscar->parroquia = $request->post('parroquia');    
            $buscar->estado = $request->post('estado');
            $buscar->municipio = $request->post('municipio'); 
        }
        return $this->render('listar', [
                //'consejos' => $consejos,
                //'parroquias' => $parroquias,
                //'municipios' => $municipios,
                'estadosVenezuela' => $estadosVenezuela,
                'buscar' => $buscar,
                'usesion' => $e,
            ]); 
    }


}
