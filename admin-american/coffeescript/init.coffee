'use strict'

app = angular.module "karlMaslo",[
	'ngSanitize',
	'ngRoute',
	'ngCookies',
	'ngCkeditor'
]

app.config ['$routeProvider', (routeProvier) ->
	routeP = routeProvier	
	routeP.when '/', {
		templateUrl : 'resources/assets/vista/login/login.html'
		controller : 'LoginCrl'
	}
	routeP.when '/login', {
		templateUrl : 'resources/assets/vista/login/login.html',
		controller : 'LoginCrl'
	}
	routeP.when '/vista/principal/', {
		templateUrl : 'resources/assets/vista/bienvenida/bienvenida.html',
		controller : ''
	}
	routeP.when '/usuario', {
		templateUrl : 'resources/assets/vista/usuario/usuario.html',
		controller : ''
	}
	routeP.when '/usuario/formulario/', {
		templateUrl : 'resources/assets/vista/usuario/formulario.html',
		controller : ''
	}
	routeP.when '/noticia', {
		templateUrl : 'resources/assets/vista/noticia/noticia.html',
		controller : ''
	}
	routeP.when '/noticia/formulario/', {
		templateUrl : 'resources/assets/vista/noticia/formulario.html',
		controller : ''
	}
	routeP.when '/bibliografia', {
		templateUrl : 'resources/assets/vista/bibliografia/bibliografia.html',
		controller : ''
	}
	routeP.otherwise redirecTo : '/login'
	return
]

app.run ['$rootScope','$location', '$cookieStore','$http', (rootScope,location,cookieStore,http) ->	
	rootScope.globals = cookieStore.get('globals') || {}

	http.defaults.headers.common['Authorization'] = 'Basic ' + rootScope.globals.currentUser.authdata if rootScope.globals.currentUser

	rootScope.$on '$locationChangeStart', (event, next, current) ->		
		location.path('/login') if location.path()!= '/login' && !rootScope.globals.currentUser
		return
	return
]