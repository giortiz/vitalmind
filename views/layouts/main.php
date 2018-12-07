<?php
/* @var $this \yii\web\View */
/* @var $content string */
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;
use webvimark\modules\UserManagement\models\User;
//echo "<pre>";
//$elrol = User::hasRole($roles);
//var_dump($elrol);
//die;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => ' my-navbar navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right '],
        'items' => [
            ['label' => 'Principal', 'url' => ['/site/index']],
                        [
                'label' => 'Menú',
                'items' => [
                    
                    ['label' => '', 'url' => ['/alumnos']],
                    ['label' => 'Children', 'url' => ['/children']],
                ],
            ],
            ['label' => 'Acerca de', 'url' => ['/site/about']],
            ['label' => 'Contacto', 'url' => ['/site/contact']],
 
            Yii::$app->user->isGuest ? (
                ['label' => 'Iniciar Sesión', 'url' => ['/user-management/auth/login']]
            ) : (
                [
                'encodeLabels'=>false,
                'activateParents'=>true,
                'label' => 'Opciones',
                'items' => [
                            ['label'=>'Login', 'url'=>['/user-management/auth/login']],
                            ['label'=>'CerrarSesión('.Yii::$app->user->identity->username.')' , 'url'=>['/user-management/auth/logout']],
                            ['label'=>'Registration', 'url'=>['/user-management/auth/registration']],
                            ['label'=>'Change own password', 'url'=>['/user-management/auth/change-own-password']],
                            ['label'=>'Password recovery', 'url'=>['/user-management/auth/password-recovery']],
                            ['label'=>'E-mail confirmation', 'url'=>['/user-management/auth/confirm-email']],
                            User::hasPermission($permission, $superAdminAllowed = true) ? ( 
                                 GhostMenu::widget([
                                'encodeLabels'=>false,
                                'activateParents'=>true,
                                'items' => [
                                    [
                                        'label' => 'Administrador',
                                        'items'=>UserManagementModule::menuItems()
                                    ],  ],
                                    ]) ) 
                            : (['label' => ''] ) 
                    ],
        ])
            
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>