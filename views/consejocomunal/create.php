<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Consejocomunal */

$this->title = 'Create Consejocomunal';
$this->params['breadcrumbs'][] = ['label' => 'Consejo Comunal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consejocomunal-create">

    <h1 class="text-center">Registrar Consejo Comunal<!--<?php /*Html::encode($this->title) */?>--></h1>

    <?= $this->render('_form', [
        'model' => $model,
       	'municipios' => $municipios,
       	'usuario'=>$usuario,
    ]) ?>

    <div id="map" style="height: 450px; width:600px"></div>
   <input class='btn btn-primary' type="button" name="iniciar" id="iniciar" value="Iniciar de nuevo" onclick="javascript:iniciar();">
   <input class='btn btn-primary' type="button" name="borrar" id="borrar" value="borrar marca" onclick="javascript:borrar();">
   <input class='btn btn-primary' type="button" name="guardar" id="guardar" value="Finalizar" onclick="javascript:guardar();">
   <input class='btn btn-primary' type="button" name="ver" id="ver" value="Ver area seleccionada"  onmousedown="javascript:crear_poligono();javascript:mostrar();" onmouseup="javascript:ocultar();">
   <div id="mostrar">
<?php
         $this->registerJsFile("http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js");
         $this->registerJsFile('http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyBl1izE1b8j0M8y1GuX-VvbvOMmG27fFoA');
         $this->registerJs('
          load();


          ');
        ?>
  </div>
</div>

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

</div>
