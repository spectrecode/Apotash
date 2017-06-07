app.controller 'editarBibliografiaCrtl',['$scope','$http','$timeout','$rootScope','$routeParams','$cookieStore','$location','AuthenticationService',(scope,http,timeout,rootScope,routeParams,cookieStore,location2,AuthenticationService) ->
	scope.codigo = 7
	if (cookieStore.get('nom_accion'))
		scope.nom_accion = cookieStore.get('nom_accion')
	else
		scope.nom_accion = ""
	##alert scope.codigo
	scope.form = []
	scope.form = {}
	scope.class_mess = ""
	scope.tip_multimedia = 0
	scope.name_tip_multimedia = ""	
	scope.formData = new FormData()
	scope.rutaImg = "resources/assets/image/bibliografia/"
	scope.url = "controller/bibliografia/procesar.php"
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
		## fin de la funcion
		return
	scope.procesarForm = (data) ->		
		## alert scope.codigo
		scope.formData.append("titulo", data.titulo)
		scope.formData.append("frase", data.frase)
		##scope.formData.append("order", data.order)
		scope.formData.append("order", 1)
		scope.formData.append("f_publicacion", data.f_publicacion)
		scope.formData.append("descrip_superior", data.descrip_superior)
		scope.formData.append("descrip_inferior", data.descrip_inferior)

		scope.formData.append("file_portada", $("#file_portada")[0].files[0])		
		scope.formData.append("act_img_portada", scope.form.act_img_portada)
		
		scope.formData.append("tip_multimedia", scope.tip_multimedia)
		scope.formData.append("mul_fileImagen", $("#mul_fileImagen")[0].files[0])
		scope.formData.append("act_mul_imagen", scope.form.act_mul_imagen)
		## alert(scope.form.act_mul_imagen)

		scope.formData.append("mul_video", data.mul_video)
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
			response = JSON.parse(res)
			## console.log response
			scope.codigo = response.codigo			
			scope.nom_accion = "Editar"	
			cookieStore.put('codigo',scope.codigo)			
			cookieStore.put('nom_accion',"Editar")			
			## imprimimos mensaje
			$(".inner-alert .alert p").html("<strong>"+response.message+"</strong>")
			scope.class_mess = response.class_mess
			## fin de impresión
			timeout scope.detalle, 1500
			scope.mostrarError()			
			return 
		)
		return
	scope.activarCaja = (cod,name) ->
		seleccionado = $(".cajaselect .seleccionado")
		seleccionado.text(name)
		$(".multimedia").fadeOut("slow", ()->
        	$("#multimedia-"+cod).fadeIn("slow")
        )
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
        scope.tip_multimedia = $(this).find("a").data("id")
        
        $(".multimedia").fadeOut("slow", ()->
        	$("#multimedia-"+scope.tip_multimedia).fadeIn("slow")
        )
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
		url = './controller/bibliografia/detalle.php'
		result = http.post(url,data)
		result.success (response) ->
			scope.form = response[0]
			## console.log scope.form
			scope.codigo 				= scope.form.codigo
			scope.tip_multimedia 		= scope.form.tip_multimedia
			scope.name_tip_multimedia 	= scope.form.name_tip_multimedia

			$fileupload2 = $('#mul_fileImagen')
			$fileupload2.wrap('<form>').closest('form').get(0).reset()
			$fileupload2.unwrap()
			##$fileupload.replaceWith($fileupload.val('').clone(true));
			
			if (scope.codigo > 0)
				scope.activarCaja(scope.tip_multimedia,scope.name_tip_multimedia)			
			return
		result.error (error) ->
			console.log(error)
			return
		## fin de la funcion
		return
	## Activamos nuestro combo
	$(".cajaselect").click(scope.clickcaja)
	$(".cajaselect").on("click", "li", scope.clickli)
	## Activamos la funcion de detalle
	scope.detalle()
	timeout scope.setup, 500
	## fin del controlador
	return
]
