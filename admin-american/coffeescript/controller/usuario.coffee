app.controller 'miusuarioCrtl',['$scope','$http','$timeout','$rootScope','$routeParams','$cookieStore','$location','AuthenticationService',(scope,http,timeout,rootScope,routeParams,cookieStore,location2,AuthenticationService) ->
	scope.fechaactual = "" 
	scope.dameFechaActual = () ->
		meses = new Array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre')
		diasSemana = new Array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado')
		f = new Date
		scope.fechaactual = diasSemana[f.getDay()] + ', ' + f.getDate() + ' de ' + meses[f.getMonth()] + ' de ' + f.getFullYear()
		console.log(scope.fechaactual)
		## fin de la función
		return
	scope.salirAdmin = () ->
		url = './controller/usuario/salir.php'
		result = http.post(url)
		result.success (response) ->
			location2.path('/login')
			return
		result.error (error) ->
			console.log(error)
			return
		## fin de la funciòn
		return
	scope.editarmiUser = () ->
		url = './controller/usuario/miuser.php'
		result = http.post(url)
		result.success (response) ->
			cookieStore.put('codigo',response.id)
			cookieStore.put('nom_accion',"Editar")
			cookieStore.put('miform',1)
			location2.path('/usuario/formulario/')
			return
		result.error (error) ->
			console.log(error)
			return
		## fin de la funcion
		return
	scope.dameFechaActual()
	## Fin del controlador
	return
]
app.controller 'editarUsuarioCrtl',['$scope','$http','$timeout','$rootScope','$routeParams','$cookieStore','$location','AuthenticationService',(scope,http,timeout,rootScope,routeParams,cookieStore,location2,AuthenticationService) ->
	if (cookieStore.get('codigo'))
		scope.codigo = cookieStore.get('codigo')
	else
		scope.codigo = -1
	if (cookieStore.get('nom_accion'))
		scope.nom_accion = cookieStore.get('nom_accion')
	else
		scope.nom_accion = ""
	scope.miform = cookieStore.get('miform')
	##alert scope.miform
	##alert scope.codigo
	scope.rutaBrench = ""
	scope.form = []
	scope.form = {}
	scope.class_mess = ""
	scope.tipouser = 0
	scope.nametipouser = 0
	scope.checkboxModel = {
		value1 : true
	}
	scope.checkboxSexo = {
		value1 : false
	}
	scope.formData = new FormData()
	scope.rutaImg = "resources/assets/image/usuario/"
	scope.url = "controller/usuario/procesar.php"
	scope.borrarMensaje = () ->
		$(".inner-alert").fadeOut("slow")
		return
	scope.mostrarError = () ->
		## si existe la clase exito
		if (scope.class_mess=="exito")
			if $(".inner-alert .alert").hasClass("error")
				$(".inner-alert .alert").removeClass("error")
				$(".inner-alert .alert").addClass(scope.class_mess)				
		else
			## si no existe la clase error
			if $(".inner-alert .alert").hasClass("exito")
				$(".inner-alert .alert").removeClass("exito")
				$(".inner-alert .alert").addClass(scope.class_mess)
		## finalmente lo hacemos aparecer	
		$(".inner-alert").fadeIn("slow")
		timeout scope.borrarMensaje, 3000
		return
	scope.setup = () ->
		scope.editorOptions = {
			language : 'ru'
			##uiColor: '#000000'
		}
		scope.$on "ckeditor.ready", (event) ->
			scope.isReady = true
			return
		$(".cke_contents").css("height","200")
		scope.validacion()
		## fin de la funcion
		return
	scope.validacion = ()->
		jQuery.validator.addMethod("reservaDate", (value, element) -> 
			return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/)
		)
		$("#formuser").validate({
			rules: {
				nombre: "required",
				usuario: "required",
				a_paterno: "required",
				movil: "required",
				comentario: "required",
				email: {
					required: true,
					email: true
				},
				password: "required",
				password2: {
					equalTo: "#password"
				}
			},
			messages: {
				nombre: "Ingrese su nombre",
				apellido: "Ingrese un correo válido",
				celular: "Ingrese su mensaje",
				email: "Ingrese su email",
				comentario: "Ingrese su comentario"
			}
		});
		return
	scope.procesarForm = (data) ->
		if ($("#formuser").valid())
			## alert scope.codigo
			scope.formData.append("nombre", data.nombre)
			scope.formData.append("a_paterno", data.a_paterno)
			scope.formData.append("a_materno", data.a_materno)
			scope.formData.append("email", data.email)
			scope.formData.append("movil", data.movil)
			scope.formData.append("telefono", data.telefono)
			scope.formData.append("usuario", data.usuario)
			scope.formData.append("password", data.password)
			scope.formData.append("password2", data.password2)

			scope.formData.append("file_portada", $("#file_portada")[0].files[0])
			scope.formData.append("act_img_portada", scope.form.act_img_portada)
			
			scope.formData.append("tipouser", scope.tipouser)

			scope.formData.append("acceso", scope.checkboxModel.value1)
			scope.formData.append("sexo", scope.checkboxSexo.value1)

			scope.formData.append("codigo", scope.codigo)

			$.ajax({
				url: scope.url,
				type: "post",
				dataType: "html",
				data: scope.formData,
				cache: false,
				contentType: false,
				processData: false
			}).done((res,status) ->
				
				console.log res
				response = JSON.parse(res)
				console.log response	
				if (response.success)
					scope.codigo = response.codigo			
					scope.nom_accion = "Editar"	
					cookieStore.put('codigo',scope.codigo)			
					cookieStore.put('nom_accion',"Editar")
					timeout scope.detalle, 1500
				## imprimimos mensaje
				$(".inner-alert .alert p").html("<strong>"+response.message+"</strong>")
				scope.class_mess = response.class_mess
				## fin de impresión
				scope.mostrarError()			
				return 
			)
		else
			$(".inner-alert .alert p").html("<strong>Debe completar los campos obligatorios</strong>")
			scope.class_mess = "error"
			scope.mostrarError()
		return
	scope.activarCaja = (cod,name,cajaId) ->
		##alert cajaId
		seleccionado = $("#"+cajaId+" .seleccionado")
		seleccionado.text(name)
		return
	scope.clickcaja = (e) ->
        lista = $(this).find("ul")
        triangulo = $(this).find("span:last-child")
        e.preventDefault()
        $(this).find("ul").toggle()
        if lista.is(":hidden")
            triangulo.removeClass("triangulosup").addClass("trianguloinf")
        else
            triangulo.removeClass("trianguloinf").addClass("triangulosup")
        return
    scope.clickli = (e)->
        texto = $(this).text()
        ##console.log $(this).find("a").data("id")
        scope.tipouser = $(this).find("a").data("id")
        seleccionado = $(this).parent().prev()
        lista = $(this).closest("ul")
        triangulo = $(this).parent().next()
        e.preventDefault()
        e.stopPropagation()
        seleccionado.text(texto)
        lista.hide()
        triangulo.removeClass("triangulosup").addClass("trianguloinf")

        return
	scope.detalle = () ->
		data = {
			codigo : scope.codigo
		}
		url = './controller/usuario/detalle.php'
		result = http.post(url,data)
		result.success (response) ->
			##console.log response			
			scope.form = response[0]
			if scope.form.acceso == "1"
				scope.checkboxModel.value1 	= true
			else
				scope.checkboxModel.value1 	= false
			if scope.form.sexo == "1"
				scope.checkboxSexo.value1 	= true
			else
				scope.checkboxSexo.value1 	= false
			scope.codigo 				= scope.form.codigo
			scope.tipouser 		    	= scope.form.tipouser
			scope.nametipouser 			= scope.form.nametipouser
			scope.rutaBrench            = scope.form.rutaBrench
			## console.log ">>>"+scope.checkboxModel.value1
			## limpiamos el input file de portada
			$fileupload = $('#file_portada')
			$fileupload.wrap('<form>').closest('form').get(0).reset()
			$fileupload.unwrap()

			##$fileupload.replaceWith($fileupload.val('').clone(true));
			##if (scope.codigo > 0)
			scope.activarCaja(scope.tipouser,scope.nametipouser,"tipouser")
			return
		result.error (error) ->
			console.log(error)
			return
		## fin de la funcion
		return
	scope.detalle2 = () ->
		data = {
			codigo : scope.codigo
		}
		url = './controller/usuario/midetalle.php'
		result = http.post(url,data)
		result.success (response) ->
			##console.log response			
			scope.form = response[0]
			if scope.form.acceso == "1"
				scope.checkboxModel.value1 	= true
			else
				scope.checkboxModel.value1 	= false
			if scope.form.sexo == "1"
				scope.checkboxSexo.value1 	= true
			else
				scope.checkboxSexo.value1 	= false
			scope.codigo 				= scope.form.codigo
			scope.tipouser 		    	= scope.form.tipouser
			scope.nametipouser 			= scope.form.nametipouser
			scope.rutaBrench            = scope.form.rutaBrench
			## console.log ">>>"+scope.checkboxModel.value1
			## limpiamos el input file de portada
			$fileupload = $('#file_portada')
			$fileupload.wrap('<form>').closest('form').get(0).reset()
			$fileupload.unwrap()

			##$fileupload.replaceWith($fileupload.val('').clone(true));
			##if (scope.codigo > 0)
			scope.activarCaja(scope.tipouser,scope.nametipouser,"tipouser")
			return
		result.error (error) ->
			console.log(error)
			return
		## fin de la funcion
		return
	## Activamos nuestro combo

	$("#tipouser").click(scope.clickcaja)
	$("#tipouser").on("click", "li", scope.clickli)
	## Activamos la funcion de detalle
	if scope.miform == 1
		scope.detalle2()
	else
		scope.detalle()
	timeout scope.setup, 500
	## fin del controlador
	return
]
app.controller 'listarUsuarioCrtl',['$scope','$http','$timeout','$rootScope','$cookieStore','$location','AuthenticationService',(scope,http,timeout,rootScope,cookieStore,location,AuthenticationService) ->
	scope.form = []
	scope.form = {}
	scope.datos = []
	scope.datos = {}
	scope.range = []
	scope.numpage = 1
	##console.log cookieStore.get 'globals'	
	scope.listar = (page,filtro) ->
		data = {
			page : page,
			filtro : filtro
		}
		##console.log data
		url = './controller/usuario/listar.php'
		result = http.post(url,data)
		result.success (response) ->
			##console.log response
			if (response!="false")
				scope.datos = response['usuario']
				##console.log response['paginado']
				i = 0
				total = response['paginado'].total_paginas
				while i < total
					scope.range.push i
					i++
			else
				scope.datos = {}
			return
		result.error (error) ->
			console.log(error)
			return
		## fin de la funcion
		return
	scope.buscar = (data) ->
		scope.range = []
		scope.listar(scope.numpage,data.buscarArt)
		## fin de la funcion
		return
	scope.agregar = () ->
		cookieStore.put('codigo',-1)
		cookieStore.put('nom_accion',"Agregar")
		cookieStore.put('miform',0)
		location.path('/usuario/formulario/')
		## fin de la funcion
		return
	scope.cambiarEstado = (estado,id) ->		
		data = {
			codigo : id,	
			valor : estado,
			variable : 'acceso'
		}		
		url = './controller/usuario/act_listado.php'
		result = http.post(url,data)
		result.success (response) ->
			##console.log response
			scope.range = []		
			scope.listar(scope.numpage,'')
			scope.form.buscarArt = ""
			return
		result.error (error) ->
			console.log error
			return
		## fin de la funcion
		return
	scope.editar = (id) ->
		cookieStore.put('codigo',id)
		cookieStore.put('nom_accion',"Editar")
		cookieStore.put('miform',0)
		location.path('/usuario/formulario/')
		## fin de la funcion
		return
	scope.eliminar = (id) ->
		## fin de la funcion
		data = {
			codigo : id
		}		
		url = './controller/usuario/eliminar.php'
		result = http.post(url,data)
		result.success (response) ->
			alert ("Se eliminó correctamente")
			scope.range = []			
			scope.listar(scope.numpage,'')
			scope.form.buscarArt = ""
			return
		result.error (error) ->
			console.log error
			return
		## fin de la funcion
		return
	scope.paginar = (page) ->
		scope.range = []
		scope.listar(page,'')
		## fin de la funcion
		return
	scope.listar(scope.numpage,'')
	## fin del controlador
	return
]