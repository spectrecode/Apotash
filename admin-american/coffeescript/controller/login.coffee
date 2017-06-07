app.controller 'LoginCrl',['$scope','$http','$timeout','$rootScope','$location','AuthenticationService',(scope,http,timeout,rootScope,location,AuthenticationService) ->
	scope.msnjlogin 	= ''
	scope.auth_token 	= ''
	scope.captcha 		= ''
	scope.nameform 		= 'loginForm'
	## calculamos el alto
	scope.setup = ()->
		$height = $(window).height()
		altologin = $height - 75 ## corresponde al alto del footer
		$('.inner-login').css 'min-height', altologin+'px'
		$('body').css 'min-height', $height+'px'
		## Generemos nuestro token
		data = {
			nameform : scope.nameform
		}

		url = './controller/login/formulario.php'
		result = http.post(url,data)
		result.success (response) ->
			scope.auth_token = response.token
			scope.captcha = response.captcha
			##console.log scope.captcha
			return
		result.error (error) ->
			console.log(error)
			return
		## Cargamos la libreria para validación
		scope.validacion()
		## fin de la funcion
		return
	##Reset login status 
	scope.validacion = ()->
		$("#login").validate({
			rules: {
				usuario: "required",
				captcha: "required",
				password: "required"
			},
			messages: {
				usuario: "",
				captcha: "",
				password: ""
			}
		});
		return
	scope.borrarMensaje = ()->
		$(".inner-alert").fadeOut("slow")
		if $(".inner-alert .alert").hasClass("exito")
			$(".inner-alert .alert").removeClass("exito")
		## si no existe la clase error
		if $(".inner-alert .alert").hasClass("error")
			$(".inner-alert .alert").removeClass("error")
		return
	scope.mostrarError = (info) ->
		## si existe la clase exito
		if $(".inner-alert .alert").hasClass("exito")
			$(".inner-alert .alert").removeClass("exito")
		## si no existe la clase error
		if $(".inner-alert .alert").hasClass("error") == false
			$(".inner-alert .alert").addClass("error")
		## finalmente lo hacemos aparecer	
		$(".inner-alert").fadeIn("slow")
		## despues de unos segundos hacemos desaparecer el mensaje
		timeout scope.borrarMensaje, 5000
		return
	scope.enviarDatos = (data)->
		##console.log data
		if ($("#login").valid())
			AuthenticationService.Login data.usuario,data.password,scope.auth_token ,scope.nameform,data.captcha, (response) -> 
				##console.log(response)
				if response.success
					AuthenticationService.SetCredentials data.usuario,data.password, response.nombreUser, response.perfil, response.photoUser
					location.path('/vista/principal')
				else
					##console.log(response.message)
					scope.msnjlogin = response.message
					scope.mostrarError()
					##scope.dataLoading = false
				return
		else
			scope.msnjlogin = 'Sus credenciales no son correctas'
			scope.mostrarError()
		## fin de la funcion
		return

	## llamamos a las funciones
	## limpiamos las variables de sessión
	AuthenticationService.ClearCredentials()
	## Cargamos el alto en nuestro div
	timeout scope.setup, 200
	## ajustamos el alto cada vez que redimensionamos
	window.addEventListener("resize", scope.setup)
	## fin del controlador
	return
]