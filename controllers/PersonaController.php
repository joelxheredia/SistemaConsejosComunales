<?php

namespace app\controllers;

use Yii;
use app\models\persona;
use app\models\personaSearch;
use app\models\Usuario;
use app\models\Parroquias;
use app\models\Municipios;
use app\models\EstadosVenezuela;
use app\models\ConsejoComunal;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PersonaController implements the CRUD actions for persona model.
 */
class PersonaController extends Controller
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
     * Lists all persona models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new personaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single persona model.
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
     * Creates a new persona model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new persona();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $usuario = Usuario::findOne($id);
            $usuario->Persona_cedulaPersona = $model->cedulaPersona;
            $usuario->update();
            return $this->redirect(['view', 'id' => $model->cedulaPersona]);
        } else {
            return $this->render('create', [
                'model' => $model, 
            ]);
        }
    }

    public function actionRegistrarfamilia(){
        $model = new persona();
        $municipios= new Municipios();
        $usuario= new Usuario();
        $estadosV = new Estadosvenezuela();
        $parroquias = new Parroquias();
        
       

        /*Codigo necesario informacion de ubicacion*/

        /*Codigo necesario jefe de familia*/
       
         
         if ($model->load(Yii::$app->request->post())&&$usuario->load(Yii::$app->request->post())) {

            $model->Cargo_idCargo=1;//para que no les de error pero en realidad es 3
            
            $fechan=date("Y",strtotime($model->fechaNacimiento));
            $model->edad=intval(date("Y"))-intval($fechan);
            
            $usuario->rol=3; 
            
            $model->save();
            $usuario->save();
            $request = Yii::$app->request;
            $numero = 1;
            while($request->post('persona'.$numero.'-tipoidentificacion')){
                $miembro = new persona();
                $miembro->cedulaPersona =$request->post('persona'.$numero.'-cedula');
                $miembro->primerNombre =$request->post('persona'.$numero.'-primernombre');
                $miembro->segundoNombre =$request->post('persona'.$numero.'-segundonombre');
                $miembro->primerApellido =$request->post('persona'.$numero.'-segundonombre');
                $miembro->segundoApelllido =$request->post('persona'.$numero.'-segundoapellido');
                $miembro->fechaNacimiento =$request->post('persona'.$numero.'-fechanacimiento');
                $miembro->edad = 15;
                $miembro->sexo =$request->post('persona'.$numero.'-sexo');
                $miembro->incapacidad =$request->post('persona'.$numero.'-discapacidad');
                $miembro->pensionado =$request->post('persona'.$numero.'-pensionado');
                $miembro->TipoIdentificacion_idTipoIdentificacion =$request->post('persona'.$numero.'-tipoidentificacion');
                $miembro->NivelInstruccion_idNivelInstruccion =$request->post('persona'.$numero.'-nivelinstuccion');
                $miembro->EstadosCiviles_idEstadosCiviles =$request->post('persona'.$numero.'-estadocivil');
                $miembro->Cargo_idCargo =1;
                $miembro->ConsejoComunal_idConsejoComunal =$model->ConsejoComunal_idConsejoComunal;
                $miembro->Persona_cedulaPersona =$model->cedulaPersona;
                $miembro->save();
                $numero++;

                }
                return $this->redirect(['site/index']);

         }
        

        /*Codigo miembros de la familia*/
        
        /*Codigo Datos de la cuenta*/

         return $this->render('Registrarfamilia', [
                'model' => $model, 
                'municipios' => $municipios,
                'usuario'=>$usuario,
                'estadosV'=>$estadosV,
                'parroquias' =>$parroquias,
       
              
            ]);
    }

    /**
     * Updates an existing persona model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cedulaPersona]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing persona model.
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
     * Finds the persona model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return persona the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = persona::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
