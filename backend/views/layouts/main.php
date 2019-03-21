<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <link rel="icon" href="sys/icon.png">-->
    <?=$this->registerLinkTag(['rel'=>'icon', 'type'=>'image/png', 'href'=>Url::to('/sys/icon.png')]);?>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
    <script src="<?=Url::to('/plugins/ckfinder/ckfinder.js')?>"></script>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <?=Html::a(Html::img(Url::to('/sys/fav.png'), ['class' => 'icon', 'height' => 40, 'width' => 40]), ['site/index'], ['class' => 'logo'])?>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="far fa-envelope"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="<?=Url::to('/sys/icon.png')?>" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="<?=Url::to('/sys/icon.png')?>" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                AdminLTE Design Team
                                                <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="<?=Url::to('/sys/icon.png')?>" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Developers
                                                <small><i class="fa fa-clock-o"></i> Today</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="<?=Url::to('/sys/icon.png')?>" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Sales Department
                                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="<?=Url::to('/sys/icon.png')?>" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Reviewers
                                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="far fa-bell"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                            page and may cause design problems
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-red"></i> 5 new members joined
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-red"></i> You changed your username
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-tasks"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Create a nice theme
                                                <small class="pull-right">40%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">40% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Some task I need to do
                                                <small class="pull-right">60%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Make beautiful transitions
                                                <small class="pull-right">80%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">80% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?=Url::to('/sys/icon.png')?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?=Yii::$app->user->identity->username?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?=Url::to('/sys/icon.png')?>" class="img-circle" alt="User Image">

                                <p>
                                    <?= Yii::$app->user->identity->Nome ?>
                                    <small>Membro desde <?= Yii::$app->user->identity->created_at ?></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
<!--                            <li class="user-body">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-xs-4 text-center">-->
<!--                                        <a href="#">Followers</a>-->
<!--                                    </div>-->
<!--                                    <div class="col-xs-4 text-center">-->
<!--                                        <a href="#">Sales</a>-->
<!--                                    </div>-->
<!--                                    <div class="col-xs-4 text-center">-->
<!--                                        <a href="#">Friends</a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                 /.row -->
<!--                            </li>-->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
<!--                                    <a href="#" class="btn btn-default btn-flat">Profile</a>-->
                                    <?=Html::a('Perfil', ['users/view', 'id' => Yii::$app->user->identity->getId()], ['class' => 'btn btn-default btn-flat'])?>
                                </div>
                                <div class="pull-right">
<!--                                    <a id="sair" class="btn btn-default btn-flat">Sair</a>-->
                                    <?= Html::a('Sair', ['site/logout'], ['data' => ['method' => 'post'], 'class' => 'btn btn-default btn-flat']) ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel" >

<!--                <div class="pull-left image">-->
<!--                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
<!--                </div>-->
<!--                <div class="pull-left info">-->
<!--                    <p>Ailton Duarte</p>-->
<!--                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
<!--                </div>-->
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
<!--             /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Menus De Navegação</li>

                <li class="active">
                    <?=Html::a('<i class="fas fa-chart-line"></i><span>Dashboard</span>', ['site/index'])?>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fas fa-warehouse"></i> <span>Propriedades</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><?=Html::a('<i class="fas fa-home"></i> Imoveis/Terrenos', ['propriedade/'])?></li>
                        <li><?=Html::a('<i class="fas fa-user-tie"></i> Clientes', ['dono/'])?></li>
                        <li><?=Html::a('<i class="far fa-images"></i> Galeria', ['imagens/'])?></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-restroom"></i>
                        <span>Recrutamentos</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">novo</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
<!--                        <i class="fa fa-files-o"></i>-->
                        <i class="fas fa-thumbs-up"></i>
                        <span> Avaliações</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">novo</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-file-signature"></i>
                        <span>Legalizações</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fas fa-globe"></i> <span>Site</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><?=Html::a('<i class="fas fa-eye"></i> <span>Visitar O Site</span>', 'http://imoafrica.cv', ['target' => '_blank'])?></li>
                        <li><a href="#"><i class="fas fa-phone"></i> Contactos</a></li>
                        <li><?=Html::a('<i class="fas fa-users"></i> Usuarios', ['users/'])?></li>
<!--                        <li class="treeview">-->
<!--                            <a href="#"><i class="fa fa-circle-o"></i> Level One-->
<!--                                <span class="pull-right-container">-->
<!--                  <i class="fa fa-angle-left pull-right"></i>-->
<!--                </span>-->
<!--                            </a>-->
<!--                            <ul class="treeview-menu">-->
<!--                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>-->
<!--                                <li class="treeview">-->
<!--                                    <a href="#"><i class="fa fa-circle-o"></i> Level Two-->
<!--                                        <span class="pull-right-container">-->
<!--                      <i class="fa fa-angle-left pull-right"></i>-->
<!--                    </span>-->
<!--                                    </a>-->
<!--                                    <ul class="treeview-menu">-->
<!--                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>-->
<!--                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>-->
<!--                                    </ul>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>-->
                    </ul>
                </li>

                <li class="header">ACESSOS</li>
                <li><?=Html::a('<i class="fas fa-bug" style="color:red;"></i> <span>Reportar Problema</span>', ['bugreport/index'])?></li>
<!--                <li><a><i class="fas fa-bug" style="color:red;"></i> <span>Senha: </span>--><?php //=$this->params['senha']?><!--</a></li>-->
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Painel De Controle</small>
            </h1>
<!--            <ol class="breadcrumb">-->
<!--                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>-->
<!--                <li class="active">Dashboard</li>-->
<!--            </ol>-->
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>

        </section>

        <!-- Main content -->
        <section class="content">

            <?= $content ?>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Versão</b> 2.0
        </div>
        <strong>Copyright &copy; <?=date('Y');?> <a href="https://innovatmedia.com" target="_blank">iMedia innovative media</a>.</strong> Todos os direitos reservados.
    </footer>



<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
