app.factory('auxiliar', function ($modal) {
	var servicio = {
    objRemitente : {dni : '', nombres: ''},
    objConsignatario : {dni : '', nombres : ''},
    message : function (message, callback, button) {
      var modalInstance = $modal.open({
        templateUrl: 'views/partials/message.html',
        controller: 'messageController',
        resolve: {
          message: function () {
            return message; 
          },
          callback : function(){
            return callback;
          },
          button: function(){
            return button;
          }
        }
      });
    },
    modalTemplate : function (title, template, controller, size) {
      var modalInstance = $modal.open({
        templateUrl: template,
        controller: controller,
        size: size,
        resolve: {
          title: function () {
            return title; 
          }
        }
      });
    }
  };

  return servicio;
});