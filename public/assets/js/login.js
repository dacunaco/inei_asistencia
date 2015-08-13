var login = angular.module('loginApp', ['ngAnimate', 'ngMaterial'])
  .controller('loginController', function ($http, $scope, authFactory, $window, $timeout, $location, $mdSidenav, $mdDialog) {
    $scope.toggleSidenav = function(menuId) {
        $mdSidenav(menuId).toggle();
    };

    $scope.mostrarAlerta = function(mensaje) {
      alert = $mdDialog.alert()
        .title('Mensaje del Sistema')
        .content(mensaje)
        .ok('Cerrar');

      $mdDialog
          .show( alert )
          .finally(function() {
            alert = undefined;
          });
    }

    $scope.login = function(user){
    	$scope.mostrarAlerta('Validando datos...');
        $timeout(function() {
        	authFactory.login(user).then(function(res){
                console.log(res);
                if(res.data.rep == 1){
                    $scope.mostrarAlerta('Datos correctos. Redireccionando...');
                    $timeout(function() {
                        $window.location.reload();
                      }, 1000);
                }else if(res.data.rep == 0){
                    $timeout(function() {
                        $scope.mostrarAlerta(res.data.msg);
                      }, 10);
                    
                }
	        });
        }, 1000);
    };
  })
  .factory("authFactory", function ($http, $q){
	return {
		login: function(user)
		{
			var deferred;
            deferred = $q.defer();
            $http({
                method: 'POST',
                url: 'usuario/iniciar_sesion',
                data: "username=" + user.username + "&password=" + user.password,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })
            .then(function(res){
                deferred.resolve(res);
            })
            .then(function(error){
                deferred.reject(error);
            });

            return deferred.promise;
		}
	}
  });