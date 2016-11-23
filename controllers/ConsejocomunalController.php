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
/**
 * ConsejocomunalController implements the CRUD actions for Consejocomunal model.
 */
class ConsejocomunalController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
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
    public function actionCreate()
    {
        $model = new Consejocomunal();
        $usuario= new Usuario();
        $usuariovocero;
        $passwordvocero;
       // $parroquias = Parroquias::find()->all();
       // $municipios = Municipios::find()->all();
        $municipios= new Municipios();

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

           return $this->redirect(['view', 'id' => $model->idConsejoComunal]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'municipios' => $municipios,
                'usuario' => $usuario,
                
            ]);
        }
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
        //$buscar->buscar ='hola';
        if($buscar->load(Yii::$app->request->post()) && $buscar->validate()){
            
        }
        return $this->render('listar', [
                //'consejos' => $consejos,
                //'parroquias' => $parroquias,
                //'municipios' => $municipios,
                'estadosVenezuela' => $estadosVenezuela,
                'buscar' => $buscar,
            ]);
    }

}
