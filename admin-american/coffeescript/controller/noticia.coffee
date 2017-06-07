app.controller 'editarNoticiaCrtl',['$scope','$http','$timeout','$rootScope','$routeParams','$cookieStore','$location','AuthenticationService',(scope,http,timeout,rootScope,routeParams,cookieStore,location2,AuthenticationService) ->
	if (cookieStore.get('codigo'))
		scope.codigo = cookieStore.get('codigo')
	else
		scope.codigo = -1
	if (cookieStore.get('nom_accion'))
		scope.nom_accion = cookieStore.get('nom_accion')
	else
		scope.nom_accion = ""
	##alert scope.codigo
	scope.form = []
	scope.form = {}

	scope.form_en = []
	scope.form_en = {}
	scope.listcat = []
	scope.listcat = {}
	scope.class_mess = ""
	scope.not_tag = ""
	scope.tip_multimedia = 0
	scope.categoria = 0
	scope.name_tip_multimedia = ""
	scope.checkboxModel = {
		value1 : false
	}
	scope.checkboxDestacado = {
		value1 : false
	}
	scope.checkboxModel_en = {
		value1 : false
	}
	scope.checkboxDestacado_en = {
		value1 : false
	}
	scope.formData = new FormData()
	scope.rutaImg = "resources/assets/image/noticias/"
	scope.url = "controller/noticia/procesar.php"
	scope.listgal = []
	scope.mostrarIdioma = (id) ->
		if id == 1
			$("#inner-espanol").css("display","block")
			$("#inner-ingles").css("display","none")
			$("#btn-espanol").removeClass("active").addClass("active")
			$("#btn-ingles").removeClass("active")
		else
			$("#inner-espanol").css("display","none")
			$("#inner-ingles").css("display","block")
			$("#btn-ingles").removeClass("active").addClass("active")
			$("#btn-espanol").removeClass("active")
		return
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
		timeout scope.borrarMensaje, 8000
		return
	scope.setup = () ->
		scope.editorOptions = {
			language : 'ru'
			##uiColor: '#000000'
		}
		$("#f_publicacion").datepicker({ 
			dateFormat: 'yy-mm-dd' 
		})
		$("#f_publicacion_en").datepicker({ 
			dateFormat: 'yy-mm-dd' 
		})
		scope.$on "ckeditor.ready", (event) ->
			scope.isReady = true
			return
		$(".cke_contents").css("height","200")
		scope.listarGaleria()
		## fin de la funcion
		return
	scope.validarCaracteres = (titulo) ->
		numTitulo = titulo.length
		## console.log descripcion
		###
		if descripcion == undefined || descripcion == null
			numDescripcion = 0
			alert numDescripcion
		else
			numDescripcion = descripcion.length
		###
		errorMsn = true
		miMsn = ''
		if (numTitulo > 65)
			errorMsn = false
			miMsn+= 'Título sobrepasa los 65 caracteres. '
			##alert numTitulo
		###
		if (numDescripcion > 209)
			errorMsn = false
			miMsn+= 'Descripción corta sobrepasa los 160 caracteres'
			##alert numDescripcion
		###
		if errorMsn == false
			scope.class_mess = "error"
			$(".inner-alert .alert p").html("<strong>"+miMsn+"</strong>")
			scope.mostrarError()
		## fin de la funcion
		return errorMsn
	scope.procesarForm_en = (data) ->
		scope.formData.append("titulo", data.titulo_en)
		scope.formData.append("frase", data.frase_en)
		scope.formData.append("url_seo", data.url_seo_en)
		##scope.formData.append("order", data.order)
		scope.formData.append("order", 1)
		scope.formData.append("f_publicacion", data.f_publicacion_en)
		scope.formData.append("descrip_superior", data.descrip_superior_en)
		scope.formData.append("descrip_inferior", data.descrip_inferior_en)

		scope.formData.append("file_portada", $("#file_portada_en")[0].files[0])		
		scope.formData.append("act_img_portada", scope.form.act_img_portada_en)

		scope.formData.append("galeria", $("#galeria")[0].files[0])		


		##scope.formData.append("tip_multimedia", scope.tip_multimedia)
		##scope.formData.append("categoria", scope.categoria)
		scope.formData.append("categoria", 1) ## lo seteamos por defecto a una categoria

		##scope.formData.append("mul_fileImagen", $("#mul_fileImagen_en")[0].files[0])
		##scope.formData.append("act_mul_imagen", scope.form.act_mul_imagen_en)
		## alert(scope.form.act_mul_imagen)

		##scope.formData.append("mul_video", data.mul_video_en)
		##scope.formData.append("estado", scope.checkboxModel_en.value1)
		##scope.formData.append("destacado", scope.checkboxDestacado_en.value1)
		scope.formData.append("codigo", scope.codigo)

		respuestaCaracter = scope.validarCaracteres(data.titulo_en)
		url_en = "controller/noticia/procesar_en.php"
		if respuestaCaracter
			$.ajax({
				url: url_en,
				type: "post",
				dataType: "html",
				data: scope.formData,
				cache: false,
				contentType: false,
				processData: false
			}).done((res,status) ->
				
				##console.log res
				response = JSON.parse(res)
				##console.log response
				scope.codigo = response.codigo			
				scope.nom_accion = "Editar"	
				cookieStore.put('codigo',scope.codigo)			
				cookieStore.put('nom_accion',"Editar")

				$fileupload2 = $('#galeria')
				$fileupload2.wrap('<form>').closest('form').get(0).reset()
				$fileupload2.unwrap()
				## imprimimos mensaje
				$(".inner-alert .alert p").html("<strong>"+response.message+"</strong>")
				scope.class_mess = response.class_mess
				## fin de impresión
				timeout scope.detalle_en, 1500
				timeout scope.detalle, 1500
				timeout scope.listarGaleria, 1500
				scope.mostrarError()			
				return 
			)
		## fin de la funcion
		return
	scope.procesarForm = (data) ->
		## alert scope.codigo
		scope.formData.append("titulo", data.titulo)
		scope.formData.append("frase", data.frase)
		scope.formData.append("url_seo", data.url_seo)
		##scope.formData.append("order", data.order)
		scope.formData.append("order", 1)
		scope.formData.append("f_publicacion", data.f_publicacion)
		scope.formData.append("descrip_superior", data.descrip_superior)
		scope.formData.append("descrip_inferior", data.descrip_inferior)

		scope.formData.append("file_portada", $("#file_portada")[0].files[0])		
		scope.formData.append("act_img_portada", scope.form.act_img_portada)

		scope.formData.append("galeria", $("#galeria")[0].files[0])		


		##scope.formData.append("tip_multimedia", scope.tip_multimedia)
		##scope.formData.append("categoria", scope.categoria)
		scope.formData.append("categoria", 1) ## lo seteamos por defecto a una categoria

		##scope.formData.append("mul_fileImagen", $("#mul_fileImagen")[0].files[0])
		##scope.formData.append("act_mul_imagen", scope.form.act_mul_imagen)
		## alert(scope.form.act_mul_imagen)

		scope.formData.append("mul_video", data.mul_video)
		scope.formData.append("estado", scope.checkboxModel.value1)
		scope.formData.append("destacado", scope.checkboxDestacado.value1)
		scope.formData.append("codigo", scope.codigo)

		respuestaCaracter = scope.validarCaracteres(data.titulo)

		if respuestaCaracter
			$.ajax({
				url: scope.url,
				type: "post",
				dataType: "html",
				data: scope.formData,
				cache: false,
				contentType: false,
				processData: false
			}).done((res,status) ->
				
				## console.log res
				response = JSON.parse(res)
				## console.log response
				scope.codigo = response.codigo			
				scope.nom_accion = "Editar"	
				cookieStore.put('codigo',scope.codigo)			
				cookieStore.put('nom_accion',"Editar")
				$fileupload2 = $('#galeria')
				$fileupload2.wrap('<form>').closest('form').get(0).reset()
				$fileupload2.unwrap()		
				## imprimimos mensaje
				$(".inner-alert .alert p").html("<strong>"+response.message+"</strong>")
				scope.class_mess = response.class_mess
				## fin de impresión
				timeout scope.detalle, 1500
				timeout scope.listarGaleria, 1500
				scope.mostrarError()			
				return 
			)
		## fin de la funcion
		return
	scope.activarCaja = (cod,name,cajaId) ->
		##alert cajaId
		if cajaId == "tipomultimedia"
			seleccionado = $(".cajaselect .seleccionado")
			seleccionado.text(name)
			$(".multimedia").fadeOut("slow", ()->
	        	$("#multimedia-"+cod).fadeIn("slow")
	        )
		else
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
    scope.clickli2 = (e)->
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
    scope.clickli3 = (e)->
        texto = $(this).text()
        ##console.log $(this).find("a").data("id")
        scope.tip_multimedia = $(this).find("a").data("id")
        
        $(".multimedia3").fadeOut("slow", ()->
        	$("#multimedia3-"+scope.tip_multimedia).fadeIn("slow")
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
    scope.clickli = (e)->
        texto = $(this).text()
        ##console.log $(this).find("a").data("id")
        scope.categoria = $(this).find("a").data("id")
        seleccionado = $(this).parent().prev()
        lista = $(this).closest("ul")
        triangulo = $(this).parent().next()
        e.preventDefault()
        e.stopPropagation()
        seleccionado.text(texto)
        lista.hide()
        triangulo.removeClass("triangulosup").addClass("trianguloinf")

        return
   	scope.categoria = (id) ->
   		data = {
   			codigo : id
   		}
   		url = './controller/noticia/categoria.php'
   		result = http.post(url,data)
   		result.success (response) ->
   			scope.listcat = response.categoria
   			## console.log response
   			return
   		result.error (error) ->
   			return
   		return
   	scope.listarGaleria = () ->
   		data = {
   			codigo : scope.codigo
   		}
   		url = './controller/noticia/galeria.php'
   		result = http.post(url,data)
   		result.success (response) ->
   			scope.listgal = response['listgal']
   			console.log response
   			return
   		result.error (error) ->
   			console.log(error)
   			return
   		return
	scope.detalle = () ->
		data = {
			codigo : scope.codigo
		}
		url = './controller/noticia/detalle.php'
		result = http.post(url,data)
		result.success (response) ->
			## console.log response			
			scope.form = response[0]
			scope.checkboxModel.value1 	= scope.form.estado
			scope.checkboxDestacado.value1 	= scope.form.destacado
			scope.codigo 				= scope.form.codigo
			scope.categoria 		    = scope.form.categoria
			scope.namecategoria 		= scope.form.namecategoria
			scope.checkboxDestacado.value1 	= scope.form.destacado
			## console.log ">>>"+scope.checkboxModel.value1
			## limpiamos el input file de portada
			$fileupload = $('#file_portada')
			$fileupload.wrap('<form>').closest('form').get(0).reset()
			$fileupload.unwrap()

			##$fileupload2 = $('#mul_fileImagen')
			##$fileupload2.wrap('<form>').closest('form').get(0).reset()
			##$fileupload2.unwrap()
			##$fileupload.replaceWith($fileupload.val('').clone(true));
			##if (scope.codigo > 0)
			## scope.activarCaja(scope.tip_multimedia,scope.name_tip_multimedia, "tipomultimedia")
			## scope.activarCaja(scope.categoria,scope.namecategoria,"categoria")
			return
		result.error (error) ->
			console.log(error)
			return
		## fin de la funcion
		return
	scope.detalle_en = () ->
		data = {
			codigo : scope.codigo
		}
		url = './controller/noticia/detalle_en.php'
		result = http.post(url,data)
		result.success (response) ->
			console.log response			
			scope.form_en = response[0]
			scope.checkboxModel_en.value1 	= scope.form.estado
			scope.checkboxDestacado_en.value1 	= scope.form.destacado
			scope.codigo 				= scope.form.codigo
			scope.categoria 		    = scope.form.categoria
			scope.namecategoria_en 		= scope.form.namecategoria
			scope.checkboxDestacado_en.value1 	= scope.form.destacado
			$fileupload = $('#file_portada_en')
			$fileupload.wrap('<form>').closest('form').get(0).reset()
			$fileupload.unwrap()

			

			##$fileupload2 = $('#mul_fileImagen_en')
			##$fileupload2.wrap('<form>').closest('form').get(0).reset()
			##$fileupload2.unwrap()
			##$fileupload.replaceWith($fileupload.val('').clone(true));
			##if (scope.codigo > 0)
			##scope.activarCaja(scope.tip_multimedia,scope.name_tip_multimedia, "tipomultimedia_en")
			##scope.activarCaja(scope.categoria,scope.namecategoria,"categoria_en")
			return
		result.error (error) ->
			console.log(error)
			return
		## fin de la funcion
		return
	scope.eliminar = (id) ->
		## fin de la funcion
		data = {
			codigo : id
		}		
		url = './controller/noticia/eliminar-galeria.php'
		result = http.post(url,data)
		result.success (response) ->
			alert ("Se eliminó correctamente")
			scope.listarGaleria()
			return
		result.error (error) ->
			console.log error
			return
		## fin de la funcion
		return
	## Activamos nuestro combo

	$("#categoria").click(scope.clickcaja)
	$("#categoria").on("click", "li", scope.clickli)

	$("#tipomultimedia").click(scope.clickcaja)
	$("#tipomultimedia").on("click", "li", scope.clickli2)

	$("#tipomultimedia2").click(scope.clickcaja)
	$("#tipomultimedia2").on("click", "li", scope.clickli3)
	## Activamos la funcion de detalle
	scope.detalle()
	scope.detalle_en()
	scope.categoria(-1)
	timeout scope.setup, 500
	## fin del controlador
	return
]
app.controller 'listarNoticiaCrtl',['$scope','$http','$timeout','$rootScope','$cookieStore','$location','AuthenticationService',(scope,http,timeout,rootScope,cookieStore,location,AuthenticationService) ->
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
		url = './controller/noticia/listar.php'
		result = http.post(url,data)
		result.success (response) ->
			##console.log response
			if (response!="false")
				scope.datos = response['listado']
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
		location.path('/noticia/formulario/')
		## fin de la funcion
		return
	scope.cambiarEstado = (estado,id) ->		
		data = {
			codigo : id,	
			valor : estado,
			variable : 'estado'
		}		
		url = './controller/noticia/act_listado.php'
		result = http.post(url,data)
		result.success (response) ->
			scope.range = []		
			scope.listar(scope.numpage,'')
			scope.form.buscarArt = ""
			return
		result.error (error) ->
			console.log error
			return
		## fin de la funcion
		return
	scope.cambiarDestacado = (destacado,id) ->		
		data = {
			codigo : id,	
			valor : destacado,
			variable : 'destacado'
		}		
		url = './controller/noticia/act_listado.php'
		result = http.post(url,data)
		result.success (response) ->
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
		location.path('/noticia/formulario/')
		## fin de la funcion
		return
	scope.eliminar = (id) ->
		## fin de la funcion
		data = {
			codigo : id
		}		
		url = './controller/noticia/eliminar.php'
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
	scope.order = (e,order,id) ->
		if (e.which==13)
			data = {
				codigo : id,	
				valor : order,
				variable : 'order'
			}
			url = './controller/noticia/act_listado.php'
			result = http.post(url,data)
			result.success (response) ->
				scope.range = []
				scope.listar(scope.numpage,'')
				scope.form.buscarArt = ""
				alert "Se actualizo"
				return
			result.error (error) ->
				console.log error
				return
		## fin de la funcion
		return
	scope.listar(scope.numpage,'')
	## fin del controlador
	return
]