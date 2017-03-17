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
    // mapa piura
    $(".piura").click(goPiura);
    // mapa Lima
    $(".lima").click(goLima);
    // RESPONSIVE
    // nosotros responsive
    $(".somosMovile").click(somosUP);
    // mision responsive
    $(".misionMovile").click(misionMovile);
    // valores responsive
    $(".valorMovil").click(valorMovil);
    // talento responsive
    $(".talentoMovil").click(talentoMovil);
    // fosfato responsive
    $(".fosfatoMovil").click(fosfatoMovil);
    // sostenibilidad responsive
    $(".sostenibilidadMovil").click(sostenibilidadMovil);
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
// funcion goPiuraMap
var goPiura =  function(){
    $(".mapaLima").addClass("mapaOculto");
    $(".piuraMap").removeClass("mapaOculto");
}
// fin funcion goPiuraMap
// funcion goPiuraMap
var goLima =  function(){
    $(".piuraMap").addClass("mapaOculto");
    $(".mapaLima").removeClass("mapaOculto");
}
// fin funcion somosUP
// funcion somosUP
var somosUP =  function(){
    $("#nosotros").append($(".menuNosMovil"));
    $(".contenedorNosotros").slideToggle("slow");
}
// fin funcion somosUP
// funcion misionMovile
var misionMovile =  function(){
    $("#nosotros").append($(".menuNosMovil"));
    $(".mision").slideToggle("slow");
}
// fin funcion misionMovile
// funcion .valorMovil
var valorMovil =  function(){
    $("#nosotros").append($(".menuNosMovil"));
    $(".valores").slideToggle("slow");
}
// fin funcion .valorMovil
// funcion .talentoMovil
var talentoMovil =  function(){
    $("#nosotros").append($(".menuNosMovil"));
    $(".talento").slideToggle("slow");
}
// fin funcion .talentoMovil
// funcion .fosfatoMovil
var fosfatoMovil =  function(){
    $("#fosfatos").append($(".submenuFM"));
    $(".fosfatoProy").slideToggle("slow");
    // alert($(".galeriaRF").html())
}
// fin funcion .fosfatoMovil
// funcion .sostenibilidadMovil
var sostenibilidadMovil =  function(){
    function migaleriaSoS (){
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
        //fin de la funcion
    }
    $("#sostenibilidad").append($(".menuSosMovil"));
    $(".sostenibilidad-social").slideToggle("slow");
    $("#sostenibilidad .galerias").slideToggle("slow",function(){
        migaleriaSoS() 
    });
    // alert($(".galeriaRF").html())
}
// fin funcion .sostenibilidadMovil
// funcion ancla para submenus
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
// fin de funcion ancla para submenus
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
    function migaleriaSoS (){
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
        //fin de la funcion
    }

    migaleriaSoS();
});
$(document).ready(function() {
    $(".sliderSalud").lightSlider({
        item: 1,
        autoWidth: false,
        slideMove: 1, // slidemove will be 1 if loop is true
        slideMargin: 0,
 
        // addClass: '',
        mode: "slide",
        useCSS: true,
        cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
 
        speed: 400, //ms'
        loop: true,
        slideEndAnimation: true,
        pause: 2000,
 
        pager: true,
        controls: false,
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
$(document).ready(function() {
    $(".sliderNoticia").lightSlider({
        item: 1,
        autoWidth: false,
        slideMove: 1, // slidemove will be 1 if loop is true
        slideMargin: 0,
 
        // addClass: '',
        mode: "slide",
        useCSS: true,
        cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
 
        speed: 400, //ms'
        loop: true,
        slideEndAnimation: true,
        pause: 2000,
 
        pager: true,
        controls: true,
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
$(document).ready(function(){
    //alert(234);
    $(".verMas").click(function () {
        var _link = "controller/noticias.php"; 
        var paginacion = $("#paginar").attr("data-paginacion");
        //alert(paginacion);
        var form_data = {
            "paginacion" : paginacion  
        }

        $.ajax({
            type: "POST",
            data: form_data,
            url: _link
        }).done(function(response) {
            data = jQuery.parseJSON(response);
            console.log(data);
            $("#publicaciones").append(data.noticias);
            $("#paginar").attr("data-paginacion",data.paginacion);
            if (data.boolpagina == 0)
                $("#paginar").fadeOut("slow");
        });
        
    });
});