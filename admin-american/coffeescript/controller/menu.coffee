app.controller 'menuPrincipalCrtl',['$scope','$location','$timeout','$http', '$rootScope','$routeParams','$cookieStore', (scope,location2,timeout,http,rootScope,routeParams,cookieStore) ->
	scope.data = cookieStore.get('globals')
	##console.log scope.data.currentUser
	scope.nombreUser = scope.data.currentUser.nombreUser
	scope.perfilUser = scope.data.currentUser.perfil
	scope.photoUser = scope.data.currentUser.photo
	scope.setup = () ->
		h = $(window).height()
		$("#menuLeft").css("min-height",h)
		## fin de la funcion
		return
	scope.setup()
	## fin del controlador
	return
]
