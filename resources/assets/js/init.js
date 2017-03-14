// javascript
var imagenesGaleriaIndex = function(){
    $(".caja-hover-galeria").click(zoomImg);
    $(".btn-cerrar-img").click(btnCerrar);
    $(".caja-hover-not").mouseover(mouseZoom);
    $(".caja-hover-not").mouseout(mouseoutZoom);
    // clic buscador
    $('input.style-box-search').hide();
    $("#box-search img").click(openSearch);
    // menu collapse
    $("a.line-burguer").click(menuCollapse);
    // menu gotoUp
    $(".btnGoUp").click(gotoUp);
}
$(document).ready(imagenesGaleriaIndex);
// funcion ampliar imagenes de galerias
var zoomImg = function(){
    $(".modal-img").css("display","block");
    var imageZ = $(".imageZoom");
    var imageN = $(this).prev().attr("src");
    imageZ.attr("src",imageN);
}
var btnCerrar = function(){
    $(".modal-img").fadeOut(300);
}

var mouseZoom =  function(){
    $(this).prev().addClass("scale-img");
}
var mouseoutZoom =  function(){
    $(this).prev().removeClass("scale-img");
    $(this).prev().css("transition:all .2s");
}
// FIN funcion mostrar imagenes ampliadas
// Inicio abrir buscador
var openSearch =  function(){
    $("input.style-box-search").slideToggle("fast");
}
// Fin abrir buscador
// menu collapse
var menuCollapse =  function(){
    $("ul.menu-collapse").slideToggle(500);
}
// fin menu collapse
// boton go to up
var gotoUp =  function(){
    $("html, body").animate({ 
            scrollTop: 0 
        }, 1500,"linear");
}
// fin boton go to up
$(document).ready(function() {
    topScroll = ""; 
    timeOut = ""; 
    htmlbody = $('html,body'); 
    valor = 0; 
    topScroll = $("#ancla").offset().top; 
    //x|alert(">>>"+$("#ancla").height()); 
    timeOut = 1500; 
    htmlbody.animate({ 
        scrollTop: topScroll
    }, timeOut, 'easeInOutQuint');
});

$(document).ready(function() {
    $(".banner").lightSlider({
        item: 1,
        slideMove: 1, // slidemove will be 1 if loop is true
        slideMargin: 0,
 
        // addClass: '',
        mode: "slide",
        useCSS: true,
        cssEasing: 'ease-in-out', //'cubic-bezier(0.25, 0, 0.25, 1)',//
 
        speed: 1200, //ms'
        auto: true,
        loop: true,
        slideEndAnimation: true,
        pause: 5000,
 
        keyPress: true,
        controls: true,

        pager: true,
        enableTouch:true,
        freeMove:true,
        galleryMargin: 5,
        thumbMargin: 5,
        currentPagerPosition: 'middle',
    });
});
// funcionalidad slider gallery noticias index
$(document).ready(function() {
    $(".sliderNoticias").lightSlider({
        item: 3,
        autoWidth: false,
        slideMove: 1, // slidemove will be 1 if loop is true
        slideMargin: 10,
 
        // addClass: '',
        mode: "slide",
        useCSS: true,
        cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//

        speed: 400, //ms'
        loop: true,
        slideEndAnimation: true,
        pause: 2000,

        pager: false,
        galleryMargin: 5,
        thumbMargin: 5,
        currentPagerPosition: 'middle',
 
        responsive : [
            {
                breakpoint: 768,
                settings: {
                    item: 2,
                }
            },
        ]
    });
});

// funcionalidad slider galeria index
$(document).ready(function() {
    $(".sliderGaleria").lightSlider({
        item: 5,
        autoWidth: false,
        slideMove: 1, // slidemove will be 1 if loop is true
        slideMargin: 10,
 
        // addClass: '',
        mode: "slide",
        useCSS: true,
        cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
 
        speed: 400, //ms'
        loop: true,
        slideEndAnimation: true,
        pause: 2000,
 
        pager: false,
        galleryMargin: 5,
        thumbMargin: 5,
        currentPagerPosition: 'middle',
 
        // enableTouch:false,
        // enableDrag:false,
        freeMove:false,
 
        responsive : [
            {   breakpoint: 768,
                settings: {
                    item: 3,
                },
            },
            {   breakpoint: 426,
                settings: {
                    item: 1,
                }
            }
        ]
    });
});

// validacion formulario

$( document ).ready(function() {
	$("#contacto form").validate({
		debug: false,

		rules: {
			"name": {
				required: true,
                minlength:3,
				// lettersonly: true
			},
			"mail": {
				required: true,
				email: true,
                minlength:8
			},
			"adress": {
				required: true,
                min:5
			},
			"telf": {
				required: true,
				number: true,
                max:9
			},
			"comment": {
				required: true,
				// email: true,
				maxlength:140
			},
		},
		messages: {
			"name": {
				required: "Escriba su nombre",
                minlength:"Escriba un nombre valido",
				name:""
			},
			"mail": {
				required: "Escriba su e-mail.",
                minlength:"Escriba un nombre valido",
				email: ""
            },
            "adress": {
                required: "Escriba su dirección",
                min: "Escriba una dirección válida",
                adress: ""
            },
            "telf": {
                required: "Escriba su número de contacto",
                telf: ""
            },
            "comment": {
                required: "Deje su comentario",
                text: "",
                maxlength:140
            },
            submitHandler: function(form) {
                    form.submit();
            }
		},
	})
});
