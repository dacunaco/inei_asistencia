<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en" ng-app="administradorApp">
  <head>
    <meta charset="utf-8">
    <title>.:: INEI | Panel ::.</title>
    <link rel="stylesheet" href="<?= base_url()?>assets/admin/angular-material.min.css">
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
        <a ng-click="redirect(item.action)">
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
          <md-button aria-label="Abrir opciones" ng-click="showOptions($event)">
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
                <input type="text" id="dni" name="dni" ng-model="datos.dni" autofocus ng-required="true"/>
              </md-input-container>
            </form>
            <div class="bs-callout bs-callout-{{(codigo == 0) ? 'danger' : (codigo == 2) ? 'info' : (codigo == 1) ? 'success' : 'warning'}} md-whiteframe-z2" ng-show="mensaje">
              <h4>Mensaje : {{mensaje | uppercase}}</h4>
              <div layout="row" ng-show="resultado" layout-padding>
                <div layout="column" flex="25" layout-align="center center">
                  <img ng-show="foto == true" class="img-perfil md-whiteframe-z2" src="assets/photos/{{dni}}.jpg" alt="{{dni}}" width="180">
                  <ng-md-icon ng-show="foto == false" style="fill:#0080FF" size="180" icon="account_circle"></ng-md-icon>
                </div>
                <div flex>
                  <h4 style="text-align: center">{{proyecto}}</h4>
                  <ul>
                    <li>{{nombre | uppercase}}</li>
                    <li>{{dni | uppercase}}</li>
                    <li>{{cargo | uppercase}}</li>
                  </ul>
                  <h2 style="text-align: center">{{fecha_hora}}</h2>
                </div>
              </div>
            </div>
          </md-content>
      </md-content>
    </div>
    
    <!-- Angular Material Dependencies -->
    <script src="<?= base_url()?>assets/admin/angular.min.js"></script>
    <script src="<?= base_url()?>assets/admin/angular-animate.min.js"></script>
    <script src="<?= base_url()?>assets/admin/angular-aria.min.js"></script>

    <script src="<?= base_url()?>assets/admin/angular-material.min.js"></script>
    <script src="<?= base_url()?>assets/admin/angular-material-icons.min.js"></script> 
    <script src="<?= base_url()?>dist/scripts.min.js"></script>
  </body>
</html>
