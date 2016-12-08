<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Parroquias;
use app\models\Municipios;
use app\models\Usuario;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Consejocomunal */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="row">
  <div class="col-sm-4">
  
  <div class="list-group">
  <a href="" class="list-group-item text-center"><h3>Consejos Comunales</h3></a>
  <a href=href="<?php echo Yii::$app->getUrlManager()->getBaseUrl();?>/consejocomunal/create" class="list-group-item">Registrar Consejo Comunal</a>
  <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl();?>/consejocomunal/listarconsejof" class="list-group-item">Listar Consejo Comunal</a>
  <a href="#" class="list-group-item">Contactar Vocero</a>
</div>


  </div>

  <div class="col-sm-8">

    <?php $form = ActiveForm::begin([
      'options' => ['class' => 'form-horizontal'],

    ]); ?>

    <div class="form-group">
      <label class="control-label col-sm-2"></label> 

    </div>

    <div class="form-group">

    <label class="control-label col-sm-2" >Municipio:</label>
    <div class="col-sm-4">

       <?= Html::activeDropDownList($municipios, 'idMunicipios',   ArrayHelper::map(Municipios::find()->where(['Estados_idEstados'=>$est])->all(),'idMunicipios','nombreMunicipios'),
          ['prompt'=>'Seleccione Municipio',
                'onchange'=>'$.post("'.Yii::$app->getUrlManager()->getBaseUrl().'/consejocomunal/listarparroquias?id="+$(this).val(), function(data){
                 $( "select#consejocomunal-parroquias_idparroquias" ).html( data );      
            });',
            'class' =>'form-control',

            ]
      ) ?>

     
    </div>
    <label class="control-label col-sm-2" for="email">Parroquia:</label>
    <div class="col-sm-4">
      <?= Html::activeDropDownList($model, 'Parroquias_idParroquias',ArrayHelper::map(Parroquias::find()->all(),'idParroquias','NombreParroquia'),
         ['prompt'=>'Seleccione Parroquia',
          'class' =>'form-control',
      ]) ?>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Nombre</label>
    <div class="col-sm-10"> 
      <?= Html::activeInput('text', $model, 'NombreConsejoComunal', ['class' => 'form-control', 'placeholder'=>'Nombre del Consejo Comunal', 'required'=> true]) ?>
      <?= Html::error($model, 'NombreConsejoComunal', ['class' => 'text-error']) ?>
    </div>

  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Fecha</label>
    <div class="col-sm-10"> 

       <?php 
        
        echo DatePicker::widget([ 
            'model' => $model,
            'attribute' => 'fechaInscripcionConsejoComunal',
            'language' => 'es',
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control', 'placeholder'=>'fecha incripción', 'required'=> true]
        ]);

      
    ?>
     
    </div>
  </div>

   <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Correo</label>
    <div class="col-sm-10"> 
      <?= Html::activeInput('email',$usuario, 'correoElectronico', ['class' => 'form-control', 'placeholder'=>'correoVocero@ejemplo.com', 'required'=> true]) ?>
      <?= Html::error($usuario, 'correoElectronico', ['class' => 'text-error']) ?>
    </div>
  </div> 
    
    <div class="form-group text-center">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-info' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<!--
<iframe src="https://www.google.com/maps/d/embed?mid=1WLm4ucnd6N9Gt5pSawFledkzZiU&hl=es" width="640" height="480"></iframe>
-->



<!--    <?php /*echo Yii::$app->getUrlManager()->getBaseUrl()."/consejocomunal/listarparroquias?id="."djn";*/ ?>-->

<script type="text/javascript">

function mostrar(){
   polygon.show();
}

function ocultar(){
   polygon.hide();
}

function pintar_poligono(cad_cor, color){
      //vector que contendra los puntos
   var vec_puntos=[0];
   var colores = ["#DAF7A6","#FFC300","#FF5733","#C70039","#900C3F","#581845","#FFAC33","#6A4209","#FDFD03","#9C9C0E","#879C0E","#55564F","#BFBFBB","#86CB7C","#12460A","#96E5C5","#00FF97","#00FF97","#D1FFFA","#277068","#3E7BC4","#0E4383","#8345DD","#A68DCA","#6800FF","#9B00FF","#441960","#FF009E","#DD6CB2","#FF0023","#4F4849"];
   vec_puntos.pop();
   if(cad_cor.length>1){ 
      //separa todos los puntos que contiene la cad_cor
      var elem = cad_cor.split("*");
      for (var i = 0; i < (elem.length); i++) { 
         //separa los puntos en latitud y longitud
         var aux=elem[i].split(","); 
         var lati=0+aux[0];
         var longi=0+aux[1].substring(1); 
         //crea el punto y lo agrega al final del vector          
         vec_puntos.push(new GLatLng (lati,"-"+longi));
      }
      //agrega como ultimo punto el primer punto contenido en el vector para cerrar el poligono
      vec_puntos.push(vec_puntos[0]);

      //crea el poligono
      //Esto creará un polígono sobre los vértices sacados del vector
      //con color de borde #669933, tamaño de borde 5 píxel, opacidad del borde 0.7
      //con color del relleno #996633 y opacidad del relleno 0.4.
      polygon = new GPolygon(vec_puntos, colores[color], 5, 0.7, colores[color], 0.4);

      //pinta el poligono
      map.addOverlay(polygon);   
   }

}

function crear_poligono(){ 
   //toma la cadena que contiene todos los puntos separados por *
   var cadena=getCookie("coordenadas");
   //vector que contendra los puntos
   var vec_puntos=[0];
   vec_puntos.pop();

   if(cadena.length>1){ 
      //separa todos los puntos que contiene la cadena
      var elem = cadena.split("*");
      for (var i = 0; i < (elem.length); i++) { 
         //separa los puntos en latitud y longitud
         var aux=elem[i].split(","); 
         var lati=0+aux[0];
         var longi=0+aux[1].substring(1); 
         //crea el punto y lo agrega al final del vector          
         vec_puntos.push(new GLatLng (lati,"-"+longi));
      }
      //agrega como ultimo punto el primer punto contenido en el vector para cerrar el poligono
      vec_puntos.push(vec_puntos[0]);

      //crea el poligono
      //Esto creará un polígono sobre los vértices sacados del vector
      //con color de borde #669933, tamaño de borde 5 píxel, opacidad del borde 0.7
      //con color del relleno #996633 y opacidad del relleno 0.4.
      polygon = new GPolygon(vec_puntos, "#669933", 5, 0.7, "#669933", 0.4);

      //pinta el poligono
      map.addOverlay(polygon);   
   }
}
function iniciar(){
         document.cookie="coordenadas="+"";
         load();
}
function guardar(){
   pintar_poligono("7.689217127736191,-69.78515625*7.580327791330129,-68.70849609375*6.948238638117019,-69.3896484375",8);
   pintar_poligono("8.928487062665504,-65.654296875*8.167993177231883,-64.5556640625*8.298470297067356,-66.07177734375",1);

   //Por ahora muestra la cadena que contiene los puntos
   $.post("miscript.php", { variable: getCookie("coordenadas") }, function(data){
   $("#mostrar").html(data);
   });
}
function borrar(){
   //Eliminar un punto de los seleccionados
      var cadena=getCookie("coordenadas");
      if(cadena.length>1){ 
         var elem = cadena.split("*");
         document.cookie="coordenadas="+"";
         for (var i = 0; i < (elem.length)-1; i++) { 
            if (i==0) {
               document.cookie="coordenadas="+getCookie("coordenadas")+elem[i];
            }else
               document.cookie="coordenadas="+getCookie("coordenadas")+"*"+elem[i];
         var aux=elem[i].split(","); 
      }
         
         var lati=0+aux[0];
         var longi=0+aux[1].substring(1);           
         var po = new GLatLng (lati,"-"+longi);
         cargar(po,map.getZoom());
         //crear_poligono();
      }    
}

function load() {
   if (GBrowserIsCompatible()) {
      map = new GMap2(document.getElementById("map"));
      map.addControl(new GLargeMapControl());
      map.addControl(new GMapTypeControl()); 
      map.setCenter(new GLatLng(7.427836528738338,-66.62109375), 6);      
      var point;
      point=map.getCenter();
      var marker = new GMarker(point); 

      var cadena=getCookie("coordenadas");
      if(cadena.length>1){ 
         var elem = cadena.split("*");
         for (var i = 0; i < (elem.length); i++) { 
            var aux=elem[i].split(","); 
            var lati=0+aux[0];
            var longi=0+aux[1].substring(1);           
            var point = new GPoint ("-"+longi,lati);
            marker = new GMarker(point);
            map.addOverlay(marker);
         }
      }

      GEvent.addListener(map, "click", function (overlay,point){
         marker = new GMarker(point);
         
         map.addOverlay(marker);         
         //concatenando valores de los puntos en los cookies x 
         if (getCookie("coordenadas").length==0) {
            document.cookie="coordenadas="+getCookie("coordenadas")+point.lat()+","+point.lng(); 
         }else{
            document.cookie="coordenadas="+getCookie("coordenadas")+"*"+point.lat()+","+point.lng();
            //polygon.hide();    
         }   
         marker.openInfoWindowHtml("<div style='font-size: 8pt; font-family: verdana'>" + point.lat() + "," + point.lng() + "</div>"); 
         //crear_poligono();
         //polygon.show();
   });
   }
}

function cargar(punto, zoom) {
   if (GBrowserIsCompatible()) {
      map = new GMap2(document.getElementById("map"));
      map.addControl(new GLargeMapControl());
      map.addControl(new GMapTypeControl()); 
      map.setCenter(punto, zoom);      
      var point;
      point=map.getCenter();
      var marker = new GMarker(point); 

      var cadena=getCookie("coordenadas");
      if(cadena.length>1){ 
         var elem = cadena.split("*");
         for (var i = 0; i < (elem.length); i++) { 
            var aux=elem[i].split(","); 
            var lati=0+aux[0];
            var longi=0+aux[1].substring(1);           
            var point = new GPoint ("-"+longi,lati);
            marker = new GMarker(point);
            map.addOverlay(marker);
         }
      }

      GEvent.addListener(map, "click", function (overlay,point){
         marker = new GMarker(point);
         
         map.addOverlay(marker);         
         //concatenando valores de los puntos en los cookies x 
         if (getCookie("coordenadas").length==0) {
            document.cookie="coordenadas="+getCookie("coordenadas")+point.lat()+","+point.lng(); 
         }else{
            document.cookie="coordenadas="+getCookie("coordenadas")+"*"+point.lat()+","+point.lng();
            //polygon.hide();    
         }   
         marker.openInfoWindowHtml("<div style='font-size: 8pt; font-family: verdana'>" + point.lat() + "," + point.lng() + "</div>"); 
         //crear_poligono();
         //polygon.show();
   });
   }
}

function getCookie(cname) {
         var name = cname + "=";
         var ca = document.cookie.split(';');
         for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') {
               c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
               return c.substring(name.length,c.length);
            }
         }
         return "";
}
</script>
