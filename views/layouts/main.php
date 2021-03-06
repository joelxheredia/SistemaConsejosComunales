<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;


?>
<?php
         $this->registerJsFile("http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js");
         $this->registerJsFile('http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyBl1izE1b8j0M8y1GuX-VvbvOMmG27fFoA');
         $this->registerJs('
          load();
          ');

         AppAsset::register($this);

        ?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    //Yii::$app->controller->id
<!-- 
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
   echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->nombreUsuario . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    
    NavBar::end();
    ?>
-->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

        <?php if(Yii::$app->controller->id=='site' && Yii::$app->controller->action->id== 'index'){?>
        <a class="navbar-brand" href="#myPage">Comunales</a>
        <?php }else{?>
      <a class="navbar-brand" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl();?>/site/index">Comunales</a>
        <?php }?>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <?php if(Yii::$app->controller->id=='site' && Yii::$app->controller->action->id== 'index'){?>
        <li><a href="#funda">FUNDACOMUNAL</a></li>
        <li><a href="#vocero">VOCEROS</a></li>
        <li><a href="#familia">FAMILIAS</a></li>
        <li><a href="#contacto">CONTACTO</a></li>
        <?php  
        }
        if(Yii::$app->user->isGuest){
            echo "<li> <a href='".Yii::$app->getUrlManager()->getBaseUrl()."/site/login/'> INICIAR SESION</a></li>";
        }
        else{  
            echo  '<li> '. Html::beginForm(['/site/logout'], 'post'/*, ['class' => 'navbar-form']*/).
            Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->nombreUsuario . ')',
                    ['class' => 'btn btn-link']
            ).
            Html::endForm().' </li>';
        }
        ?>

      </ul>
    </div>
  </div>
</nav>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
