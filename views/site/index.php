<?php

/* @var $this yii\web\View */

$this->title = 'hw_Output_Document(hw_document)rganización Comunal';
?>
<div class="site-index" id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

    <div class="jumbotron text-center cabecera" style="background-image: url('img/fondo.png')">
      <h1>Comunales</h1>
      <p>El poder comunitario,la participación y el protaginismo popular, sus decisiones son, de carácter vinculante para el consejo comunal</p>
      <form class="form-inline">
        <input type="email" class="form-control" size="50" placeholder="Buscar Consejo Comunal" required>
        <a href="  <?php  echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/consejocomunal/listarconsejo " type="button" class="btn btn-lg">Buscar</a>
      </form>
    </div>


<!-- Container (Seccion 1 Principal) -->
    <div id="about" class="container-fluid">
      <div class="row "> <!--slideanim">-->
        <div class="col-sm-4 col-xs-12">
          <div class="panel panel-default text-center">
            <div class="panel-heading">
              <h1>Verifica</h1>
            </div>
            <div class="panel-body row" >
              
              <p><strong>Valida </strong> las cartas otorgadas por el Consejo Comunal</p>
              <img src="img/check.png" class="img-rounded" alt="Verifica" width="30%" height="30%">
            </div>
            <div class="panel-footer">
              <button class="btn btn-lg">Verificar</button>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-xs-12">
          <div class="panel panel-default text-center">
            <div class="panel-heading">
              <h1>Encuentra</h1>
            </div>
            <div class="panel-body">
              <p><strong> Los diferentes</strong>  Consejos Comunales</p>
              <img src="img/buscar.png" class="img-rounded" alt="Buscar" width="40%" height="40%">
            </div>
            <div class="panel-footer">
              <input type="email" class="form-control" size="50" placeholder="Buscar Consejo Comunal" required>
              <a href="  <?php  echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/consejocomunal/listarconsejo " type="button" class="btn btn-lg">Buscar</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-xs-12">
          <div class="panel panel-default text-center">
            <div class="panel-heading">
              <h1>Conoce</h1>
            </div>
            <div class="panel-body">
              <p><strong> Los pasos</strong>  para la cosntitución de un nuevo Consejos Comunales</p>
              <img src="img/pasos.png" class="img-rounded" alt="Pasos" width="40%" height="40%">
            </div>
            <div class="panel-footer">
              <button class="btn btn-lg">Ver</button>
            </div>
          </div>
        </div>
      </div>
    </div>

<div id="funda" class="container-fluid bg-grey">
  <h2 class="text-center">Funda Comunal</h2>
  <div class="row text-center">    
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo"></span>
    </div>
    <div class="col-sm-8 text-center">
      <h3><strong>¿Que es un Consejo Comunal?</strong></h3>
      <h4 > Es la forma de organización más avanzada que pueden darse los vecinos deuna determinada comunidadpara asumir el ejercicio real del poder popular .</h4><br>
    </div>
    <div class="col-sm-12">
      <h4>Pasos para conformar un nuevo Consejo Comunal</h4>
      <div class="container-fluid text-center panel">
        <div class="row "> <!--slideanim"> -->
          <div class="col-sm-4">
            <img src="img/paso1.png" class="img-rounded" alt="Paso1" >
            <p>Conformar equipo promotor</p>
          </div>
          <div class="col-sm-4">
            <img src="img/paso2.png" class="img-rounded" alt="Paso2" >
            <p>Difundir el alcance, objetivos y fines del Consejo Comunal</p>
          </div>
          <div class="col-sm-4">
            <img src="img/paso3.png" class="img-rounded" alt="Paso3" >
            <p>Elaborar el croquis del ámbito geográfico de la comunidad</p>
          </div>          
        </div>
        <div class="row">
          <div class="col-sm-4">
            <img src="img/paso4.png" class="img-rounded" alt="Paso4" >
            <p>Elegir el equipo electoral provicional en asamblea ciudadana</p>
          </div>
          <div class="col-sm-4">
            <img src="img/paso5.png" class="img-rounded" alt="Paso5" >
            <p>Elegir voceros y voceras en asamblea constitutiva</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <h3><strong>¿Eres coordinador Estadal?</strong></h3>
      </div>
      <div class="col-sm-4">
        <h4>Registra los Consejos Comunales de tu jurisdicción</h4>
      </div>
      <div class="col-sm-4">
          <button href="  <?php  echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/consejocomunal/create " type="button" class="btn btn-lg">Registrar</button>
      </div>     
    </div>
  </div>
</div>

<!-- Container (Services Section) -->
  <div id="vocero"class="container-fluid text-center">
    <h2>Voceros</h2>
    <h4>Que hacer si ya tienes el Consejo Comunal de tu comunidad constituido pero aun no estas registrado en el sistema</h4>
    <div class="row "> <!--slideanim"> -->
      <div class="col-sm-4">
        <img src="img/logo-fundacomunal.png" class="logo" alt="Fundacomunal" >
        <h4>Dirigite a la sede mas cercana de FundaComunal</h4>
      </div>
      <div class="col-sm-4">
        <img src="img/recaudos.png" class="logo" alt="Recaudos" >
        <h4>Consigna el acta constitutiva, correo electrónico del Consejo Comunal</h4>      
      </div>
      <div class="col-sm-4">
        <img src="img/confirmar.png" class="logo" alt="Confirmar cuenta" >
        <h4>Ingresa al correo electronico suministrado y verifica la cuenta</h4>      
      </div>
    </div>
    <div class="row "> <!--slideanim">-->
      <div class="col-sm-6 col-xs-12">
        <div class="panel panel-default text-center">    
          <div class="panel-body">
            <h4><strong>Consulta </strong> por diversos criterios los miembros de tu Consejo Comunal</h4>
          </div>
          <div class="panel-heading">
            <h1>Consulta</h1>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xs-12">
        <div class="panel panel-default text-center">    
          <div class="panel-body">
            <h4><strong>Genera </strong> el cuadero electoral y otros reportes de tu Consejo Comunal</h4>
          </div>
          <div class="panel-heading">
            <h1>Genera</h1>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Container (Portfolio Section) -->
  <div id="familia" class="container-fluid text-center bg-grey">
    <h2>Familias</h2>
    <div class="row text-center "> <!--slideanim"> -->
      <div class="col-sm-4">
        <div class="caja">
          <p>Busca tu Consejo Comunal y registra a os miembros de tu familia</p>
          <input type="email" class="form-control" size="50" placeholder="Buscar Consejo Comunal" required>
          <button class="btn btn-lg">Buscar</button>
          <br><br>
          <p>No conoce el nombre del Consejo Comunal, realiza una busqueda por Estado, Municio o parroquia</p>
          <button class="btn btn-lg">Buscar</button>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="caja">        
          <p><strong>Verifica</strong> Si tu familia ya se encuentra registrada en el Consejo Comunal de tu comunidad</p>
          <img src="img/familia.png" alt="Familia">
          <button class="btn btn-lg">Verficar familia</button>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="caja">        
          <p><strong>Registrate</strong></p>          
          <p>Tu familia aún no se encuentra registrada en el Consejo Comunal de tu comunidad? o no posees cuenta para ingresar al sistema?</p>
          <img src="img/agregar.png" alt="Registrar">
          <button class="btn btn-lg">Registrar familia</button>
        </div>
      </div>
    </div>
  </div>

<!-- Container (Contact Section) -->
  <div id="contacto" class="container-fluid ">
    <h2 class="text-center">CONTACTO</h2>
    <div class="row">
      <div class="col-sm-5">
        <p>Póngase en contacto con nosotros y nos pondremos en contacto con usted en 24 horas..</p>
        <p><span class="glyphicon glyphicon-map-marker"></span> Caracas, VE</p>
        <p><span class="glyphicon glyphicon-phone"></span> +58 21212345678</p>
        <p><span class="glyphicon glyphicon-envelope"></span> contacto@comunal.com</p>
      </div>
      <div class="col-sm-7 "> <!-- slideanim">  -->
        <div class="row">
          <div class="col-sm-6 form-group">
            <input class="form-control" id="name" name="name" placeholder="Nombre" type="text" required>
          </div>
          <div class="col-sm-6 form-group">
            <input class="form-control" id="name" name="name" placeholder="Apellido" type="text" required>
          </div>
          <div class="col-sm-6 form-group">
            <input class="form-control" id="state" name="state" placeholder="Estado" type="text" required>
          </div>
          <div class="col-sm-6 form-group">
            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
          </div>
          <div class="col-sm-12 form-group">
            <input class="form-control" id="asunto" name="asunto" placeholder="Asunto" type="text" required>
          </div>
        </div>
        <textarea class="form-control" id="comments" name="comments" placeholder="Comentario" rows="5"></textarea><br>
        <div class="row">
          <div class="col-sm-12 form-group">
            <button class="btn btn-default pull-right" type="submit">Enviar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <footer class="container-fluid text-center">
    <a href="#myPage" title="To Top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
  </footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>


<!--  <div class="jumbotron">
    <h1>Congratulations!</h1>

    <p class="lead">You have successfully created your Yii-powered application.</p>

    <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
</div>

<div class="body-content">

    <div class="row">
        <div class="col-lg-4">
            <h2>Heading</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>

            <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
        </div>
        <div class="col-lg-4">
            <h2>Heading</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>

            <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
        </div>
        <div class="col-lg-4">
            <h2>Heading</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>

            <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
        </div>
    </div>

</div>-->


<!-- Container (About Section) 
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>About Company Page</h2><br>
      <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <br><button class="btn btn-default btn-lg">Get in Touch</button>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-signal logo"></span>
    </div>
  </div>
</div>
-->