<html lang="en" ng-app="loginApp">
  <head>
    <title>.:: INEI | Asistencia ::.</title>
    <link rel="stylesheet" href="<?= base_url()?>assets/bower_components/angular-material/angular-material.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic">
    <meta name="viewport" content="initial-scale=1" />
    <link rel="stylesheet" href="<?= base_url()?>assets/custom.css">
    <link href="<?= base_url()?>assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  </head>
  <body layout="column" ng-controller="loginController">
    <div layout="column" layout-align="center center" layout-fill="layout-fill">
      <div layout="column" class="loginBox md-whiteframe-z1">
        <md-toolbar>
          <h2 class="md-toolbar-tools"><span>Iniciar sesión</span></h2>
        </md-toolbar>
        <form name="loginForm" novalidate ng-submit="login(user)">
          <md-content layout="column" class="md-padding">
            <md-input-container class="md-icon-float">
              <label>Usuario</label>
              <md-icon md-svg-src="<?= base_url()?>assets/images/icons/svg/0114-user.svg" class="name"></md-icon>
              <input type="text" name="username" ng-model="user.username" autofocus ng-required="true" />
            </md-input-container>
            <md-input-container class="md-icon-float">
              <label>Contraseña</label>
              <md-icon md-svg-src="<?= base_url()?>assets/images/icons/svg/0143-key2.svg" class="password"></md-icon>
              <input type="password" ng-model="user.password" ng-required="true" />
            </md-input-container>
            <div layout="row" layout-align="center center" style="padding-top:20px;">
              <md-button class="md-raised md-primary" ng-disabled="loginForm.$invalid">Ingresar</md-button>
              <div flex="flex"></div>
              <md-button  md-no-ink="md-no-ink">¿ Olvidaste contraseña ?</md-button>
            </div>
          </md-content>
        </form>
      </div>
    </div>
    <!--<md-toolbar layout="row">
      <div class="md-toolbar-tools">
        <md-button ng-click="toggleSidenav('left')" hide-gt-sm class="md-icon-button">
          <md-icon aria-label="Menu" md-svg-icon="https://s3-us-west-2.amazonaws.com/s.cdpn.io/68133/menu.svg"></md-icon>
        </md-button>
        <h1>Sistema Integral de Asistencia</h1>
      </div>
    </md-toolbar>-->
    <!-- Angular Material Dependencies -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-aria.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/0.9.4/angular-material.min.js"></script>-->
  
    <script type="text/ng-template" id="message.tmpl.html"><md-dialog aria-label="Mensaje del sistema">
      <form>
      <md-toolbar>
        <div class="md-toolbar-tools">
          <h2>Mensaje del sistema</h2>
          <span flex></span>
          <md-button class="md-icon-button" ng-click="close()">
            <ng-md-icon size="24" icon="clear" aria-label="Cerrar"></ng-md-icon>
          </md-button>
        </div>
      </md-toolbar>
      <md-dialog-content style="max-width:400px;max-height:100%;">
        <div layout="column" layout-align="center center" layout-padding>
          <md-progress-circular class="md-warn" md-mode="indeterminate"></md-progress-circular>
          <h4>{{mensaje}}</h4>
        </div>
      </md-dialog-content>

      <div class="md-actions" layout="row">
        <md-button ng-click="close()">
          Cerrar
        </md-button>
      </div>
      </form>
    </md-dialog>
    </script>

    <script src="<?= base_url()?>assets/bower_components/angular/angular.min.js"></script>
    <script src="<?= base_url()?>assets/bower_components/angular-animate/angular-animate.min.js"></script>
    <script src="<?= base_url()?>assets/bower_components/angular-aria/angular-aria.min.js"></script>

    <script src="<?= base_url()?>assets/bower_components/angular-material/angular-material.min.js"></script>
    <script src="<?= base_url()?>assets/admin/angular-material-icons.min.js"></script>

    <script src="<?= base_url()?>dist/scripts.min.js"></script>
  </body>
</html>