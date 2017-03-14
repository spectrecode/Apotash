// Generated by CoffeeScript 1.10.0
app.controller('LoginCrl', [
  '$scope', '$http', '$timeout', '$rootScope', '$location', 'AuthenticationService', function(scope, http, timeout, rootScope, location, AuthenticationService) {
    scope.msnjlogin = '';
    scope.auth_token = '';
    scope.nameform = 'loginForm';
    scope.setup = function() {
      var $height, data, result, url;
      $height = $(window).height();
      $('body').css('height', $height + 'px');
      data = {
        nameform: scope.nameform
      };
      url = './controller/login/formulario.php';
      result = http.post(url, data);
      result.success(function(response) {
        scope.auth_token = response.token;
      });
      result.error(function(error) {
        console.log(error);
      });
      scope.validacion();
    };
    scope.validacion = function() {
      $("#login").validate({
        rules: {
          usuario: "required",
          password: "required"
        },
        messages: {
          usuario: "Usuario obligatorio",
          password: "Contraseña obligatorio"
        }
      });
    };
    scope.borrarMensaje = function() {
      $(".inner-alert").fadeOut("slow");
      if ($(".inner-alert .alert").hasClass("exito")) {
        $(".inner-alert .alert").removeClass("exito");
      }
      if ($(".inner-alert .alert").hasClass("error")) {
        $(".inner-alert .alert").removeClass("error");
      }
    };
    scope.mostrarError = function(info) {
      if ($(".inner-alert .alert").hasClass("exito")) {
        $(".inner-alert .alert").removeClass("exito");
      }
      if ($(".inner-alert .alert").hasClass("error") === false) {
        $(".inner-alert .alert").addClass("error");
      }
      $(".inner-alert").fadeIn("slow");
      timeout(scope.borrarMensaje, 5000);
    };
    scope.enviarDatos = function(data) {
      if ($("#login").valid()) {
        AuthenticationService.Login(data.usuario, data.password, scope.auth_token, scope.nameform, function(response) {
          console.log(response);
          if (response.success) {
            AuthenticationService.SetCredentials(data.usuario, data.password, response.nombreUser);
            location.path('/bienvenida');
          } else {
            scope.msnjlogin = response.message;
            scope.mostrarError();
          }
        });
      } else {
        scope.msnjlogin = 'El usuario y/o contraseña son incorrectos';
        scope.mostrarError();
      }
    };
    AuthenticationService.ClearCredentials();
    timeout(scope.setup, 200);
    window.addEventListener("resize", scope.setup);
  }
]);