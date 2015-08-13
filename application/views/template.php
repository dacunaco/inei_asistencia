<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es" ng-app="adminApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title ng-bind="'..:: SHIPPER | '+ title +' ::..'"></title>

    <!-- Bootstrap Core CSS -->
    <!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css">-->
    <link href="<?= base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link rel="stylesheet" href="<?= base_url()?>assets/bower_components/metisMenu/dist/metisMenu.css">

    <!-- Timeline CSS -->
    <link href="<?= base_url()?>assets/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url()?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/bower_components/ngprogress/ngProgress.css">

    <!-- Custom Fonts -->
    <link href="<?= base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    
    <link href="<?= base_url()?>assets/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/custom.css" rel="stylesheet">

    <link rel="shortcut icon" href="<?= base_url()?>favicon.png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#/">SHIPPER</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user fa-fw"></i> <?= $usuario ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="user/logout"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="menuPrincipal">
                        <?php 
                            foreach ($menu as $data) {?>
                                <li>
                                    <a href="#/<?php isset($data['url']) ? $data['url'] : '#' ?>"><i class="<?= $data['icon']?> fa-lg"></i> <?= $data['label']?> <?= isset($data['submenu']) ? '<span class="fa arrow"></span>' : '' ?></a>

                                    <?php 
                                            if(isset($data['submenu'])){?>
                                                <ul class="nav nav-second-level">
                                                    <?php foreach ($data['submenu'] as $submenu) { ?>
                                                        <li><a href="#/<?= $data['url']?>/<?= $submenu['surl']?>"><?= $submenu['label']?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            <?php }
                                        }
                                    ?>
                                </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" ng-bind="title"></h1>
                </div>
                <div class="col-md-12">
                    <ol class="page-breadcrumb breadcrumb">
                        <i class="fa fa-home"></i>&nbsp;
                        <li ng-repeat="breadcrumb in breadcrumbs.get() track by breadcrumb.path" ng-class="{ active: $last }">
                          <a ng-if="!$last" ng-href="#{{ breadcrumb.path }}" ng-bind="breadcrumb.label" class="margin-right-xs"></a>
                          <span ng-if="$last" ng-bind="breadcrumb.label"></span>
                        </li>                       
                    </ol>
                </div>
            </div>
            <div class="row page page-home" ng-view=""></div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
   

    <!-- Custom Theme JavaScript -->
    

    <script src="<?= base_url()?>assets/bower_components/angular/angular.js" type="text/javascript"></script>
	<script src="<?= base_url()?>assets/bower_components/angular-animate/angular-animate.js"></script>
	<script src="<?= base_url()?>assets/bower_components/angular-cookies/angular-cookies.js"></script>
	<script src="<?= base_url()?>assets/bower_components/angular-resource/angular-resource.js"></script>
	<script src="<?= base_url()?>assets/bower_components/angular-route/angular-route.js"></script>
	<script src="<?= base_url()?>assets/bower_components/angular-sanitize/angular-sanitize.js"></script>
	<script src="<?= base_url()?>assets/bower_components/angular-touch/angular-touch.js"></script>
	<script src="<?= base_url()?>assets/bower_components/ngprogress/build/ngProgress.js"></script>
	<script src="<?= base_url()?>assets/bower_components/ng-breadcrumbs/dist/ng-breadcrumbs.js"></script>
    <script src="<?= base_url()?>assets/bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
	<script src="<?= base_url()?>assets/bower_components/angular-bootstrap/angular-locale_es-pe.js"></script>
    <script src="<?= base_url()?>assets/bower_components/underscore/underscore.js"></script>
    <script src="<?= base_url()?>assets/bower_components/angular-timer/dist/angular-timer.min.js"></script>
    <script src="<?= base_url()?>assets/bower_components/momentjs/min/moment.min.js"></script>
    <script src="<?= base_url()?>assets/bower_components/momentjs/min/locales.min.js"></script>
	<script src="<?= base_url()?>assets/bower_components/humanize-duration/humanize-duration.js"></script>
    <script src="<?= base_url()?>dist/scripts.min.js"></script>
    <script src="<?= base_url()?>dist/controllers.min.js"></script>
    <script src="<?= base_url()?>dist/services.min.js"></script>
    <script src="<?= base_url()?>dist/auxiliars.min.js"></script>
    <script src="<?= base_url()?>assets/bower_components/metisMenu/dist/metisMenu.js"></script>

    <script src="<?= base_url()?>assets/dist/js/sb-admin-2.js"></script>

    <script type="text/javascript">
        $(function() {
            $('#menuPrincipal').metisMenu();
        });
        
    </script>
</body>

</html>
