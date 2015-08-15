<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en" ng-app="administradorApp">
  <head>
    <meta charset="utf-8">
    <title>.:: INEI | Panel ::.</title>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/angular_material/0.8.3/angular-material.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/custom.css">
    <link href="<?= base_url()?>assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  </head>
  <body layout="row" ng-controller="asistenciaController">
    <md-sidenav layout="column" class="md-sidenav-left md-whiteframe-z2" md-component-id="left" md-is-locked-open="$mdMedia('gt-md')">
      <md-toolbar class="md-tall md-hue-2">
        <span flex></span>
        <div layout="column" layout-align="center center" class="md-toolbar-tools-bottom inset">
          <user-avatar></user-avatar>
          <span></span>
          <div><?= $usuario?></div>
          <div><?= $correo?></div>
        </div>
      </md-toolbar>
      <md-list>
      <md-item ng-repeat="item in menu">
        <a>
          <md-item-content md-ink-ripple layout="row" layout-align="start center">
            <div class="inset">
              <ng-md-icon icon="{{item.icon}}"></ng-md-icon>
            </div>
            <div class="inset">{{item.title}}
            </div>
          </md-item-content>
        </a>
      </md-item>
    </md-list>
    </md-sidenav>
    <div layout="column" class="relative" layout-fill role="main">
      <md-button class="md-fab md-fab-bottom-right" aria-label="Add" ng-click="showAdd($event)">
        <ng-md-icon icon="add"></ng-md-icon>
      </md-button>
      <md-toolbar ng-show="!showSearch">
        <div class="md-toolbar-tools">
          <md-button ng-click="toggleSidenav('left')" hide-gt-md aria-label="Menu">
            <ng-md-icon icon="menu"></ng-md-icon>
          </md-button>
          <h3>
            O'Clock
          </h3>
          <span flex></span>
          <md-button aria-label="Search" ng-click="showSearch = !showSearch">
            <ng-md-icon icon="search"></ng-md-icon>
          </md-button>
          <md-button aria-label="Abrir opciones" ng-click="showOptios($event)">
            <ng-md-icon icon="more_vert"></ng-md-icon>
          </md-button>
        </div>
      </md-toolbar>
      <md-toolbar class="md-hue-1" ng-show="showSearch">
        <div class="md-toolbar-tools">
          <md-button ng-click="showSearch = !showSearch" aria-label="Atrás">
            <ng-md-icon icon="arrow_back"></ng-md-icon>
          </md-button>
          <h3 flex="10">
            Atrás
          </h3>
          <md-input-container md-theme="input" flex>
            <label>&nbsp;</label>
            <input ng-model="search.who" placeholder="Ingrese búsqueda">
          </md-input-container>
          <md-button aria-label="Search" ng-click="showSearch = !showSearch">
            <ng-md-icon icon="search"></ng-md-icon>
          </md-button>
          <md-button aria-label="Abrir opciones" ng-click="showListBottomSheet($event)">
            <ng-md-icon icon="more_vert"></ng-md-icon>
          </md-button>
        </div>
      </md-toolbar>
      <md-content layout="row">
          <md-content layout="column"  layout-align="top center" layout-fill="layout-fill" class="md-padding">
            <form name="asistenciaForm" novalidate ng-submit="asistencia(datos)">
              <md-input-container>
                <label>Ingrese el DNI</label>
                <input type="text" id="dni" name="dni" ng-model="datos.dni" autofocus/>
              </md-input-container>
            </form>
            <div class="bs-callout bs-callout-{{(codigo == 0) ? 'danger' : (codigo == 2) ? 'info' : (codigo == 1) ? 'success' : 'warning'}} md-whiteframe-z2" ng-show="mensaje">
              <h4>Mensaje : {{mensaje | uppercase}}</h4>
              <div layout="row" ng-show="mensaje" layout-padding>
                <div layout="column" flex="25" layout-align="center center">
                  <img class="img-perfil md-whiteframe-z2" src="<?= base_url()?>assets/photos/{{dni}}.jpg" alt="{{dni}}" width="180">
                </div>
                <div flex>
                  [flex]
                </div>
              </div>
            </div>
          </md-content>
      </md-content>
    </div>
    <!-- Angular Material Dependencies -->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.6/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.6/angular-animate.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.5/angular-aria.min.js"></script>

    <script src="//ajax.googleapis.com/ajax/libs/angular_material/0.8.3/angular-material.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-material-icons/0.5.0/angular-material-icons.min.js"></script> 
    <script src="<?= base_url()?>dist/scripts.min.js"></script>
  </body>
</html>
