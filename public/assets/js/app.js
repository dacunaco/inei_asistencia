var app = angular.module('adminApp', ['ngAnimate',
    'ngCookies',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch',
    'ngProgress',
    'ng-breadcrumbs',
    'ui.bootstrap',
    'timer']);

app.config(function ($routeProvider) {
    $routeProvider
            .when('/home', {
                templateUrl: 'views/index.html',
                controller: '',
                title: 'Principal',
                label: 'Principal'
            })
            .otherwise({
                redirectTo: '/home'
            });
});
app.run(function ($rootScope, ngProgress, $location, breadcrumbs, $timeout, $templateCache, auxiliar, $window, $http) {
    $rootScope.breadcrumbs = breadcrumbs;

    $rootScope.$on('$routeChangeStart', function (event, next, current) {
        if (typeof (current) !== 'undefined') {
            $templateCache.remove(current.templateUrl);
        }
        ngProgress.start();
    });

    $rootScope.$on('$routeChangeSuccess', function (event, current, previous) {
        ngProgress.complete();
        if (current.hasOwnProperty('$$route')) {
            $rootScope.title = current.$$route.title;
        }
    });
});