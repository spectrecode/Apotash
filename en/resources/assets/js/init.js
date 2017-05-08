// javascript
var potash = function(){
    if ($('body,html').width() >= 768 ){
        galeria ();
        console.log(222);
    }
    else{
        $('body,html').off(galeria());
    }
    setTimeout(mostrarPagina, 1000);
    $(".caja-hover-not").mouseover(mouseZoom);
    $(".caja-hover-not").mouseout(mouseoutZoom);
    // clic buscador
    $('input.style-box-search').hide();
    $("#box-search img").click(openSearch);
    // menu collapse
    $("a.line-burguer").click(menuCollapse);
    // menu gotoUp
    $(".btnGoUp").click(gotoUp);
    // sub sub menu
    $(".sMenuSostenibilidad, .sMenuProy, .sMenuNosotros").click(subMenuCollapse);
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
    // salmuera responsive
    $(".salmueraMovil").click(salmueraMovil);
    // sostenibilidad responsive
    $(".sostenibilidadMovil").click(sostenibilidadMovil);
    // beca responsive
    $(".activeMovsos").click(activeMovsos);
    // beca-video responsive
    $(".activeMovsos").click(becaVideo);
    // salud responsive
    $(".actComun").click(actComun);
    // videos responsive
    $(".movVideoBtn").click(movVideoBtn);
    // oficina responsive
    // oficina responsive
    $(".activeBeca").click(oficina);
    // form contacto
    $("#btn-form").click(function(){
        if ($("#formcontacto").valid()){
            nombre = $("#name").val();
            adress = $("#adress").val();
            mail = $("#mail").val();
            telf = $("#telf").val();
            comment = $("#comment").val();
            form_data = {
                nombre : nombre,
                adress : adress,
                mail : mail,
                telf : telf,
                comment : comment
            }
            var _link = "controller/contacto/enviar.php"; 
            console.log(form_data);
            $.ajax({
                type: "POST",
                data: form_data,
                url: _link
            }).done(function(response) {
                data = jQuery.parseJSON(response);
                if (data.b_envio)
                    alert("Se envió el mensaje correctamente")
                else
                    alert("No se pudo enviar")
                $("#formcontacto")[0].reset();
            });
        }
    });
    // form val CV
    $("#btn-formCV").click(function(){
        if ($(".cv").valid()){
            // alert($("#name").val());
            formData = new FormData();
            formData.append("file", $("#filecv")[0].files[0]);
            formData.append("name2", $("#name2").val());
            formData.append("adress2", $("#adress2").val());
            formData.append("dni", $("#dni").val());
            formData.append("telf2", $("#telf2").val());
            formData.append("mail2", $("#mail2").val());
            formData.append("comment2", $("#comment2").val());            
            var _link = "controller/bolsa/procesar.php"; 
            console.log(formData);
            $.ajax({
                type: "POST",
                data: formData,
                url: _link,
                dataType: "html",
                cache: false, 
                contentType: false,
                processData: false
            }).done(function(response) {
                console.log(response);
                data = jQuery.parseJSON(response);
                if (data.b_envio)
                    alert("Se envió el mensaje correctamente")
                else
                    alert("No se pudo enviar")
                $(".cv")[0].reset();
                $fileupload = $('#filecv')
                $fileupload.wrap('<form>').closest('form').get(0).reset()
                $fileupload.unwrap()
                $("#labelCV span").html("Upload CV");
            });
        }
        return false;
    });
}
$(document).ready(potash);


 // btn cv

;( function ( document, window, index )
{
    var inputs = document.querySelectorAll( '.filecv' );
    Array.prototype.forEach.call( inputs, function( input )
    {
        var label    = input.nextElementSibling,
            labelVal = label.innerHTML;
        input.addEventListener( 'change', function( e )
        {
            var fileName = '';
            if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else
                fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
                label.querySelector( 'span' ).innerHTML = fileName;
            else
                label.innerHTML = labelVal;
        });

        // Firefox bug fix
        input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
        input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
    });


}( document, window, 0 ));

//  fin btn cv

function mostrarPagina(){
    $("#carga").fadeOut("slow");
    $("body").removeClass("no-scroll");
    $("#logo-ap").attr("src","./resources/assets/image/logo-ap-header.gif");
    $("#logo-apM").attr("src","./resources/assets/image/logo-ap-header.gif");
} 

$(document).ready(function() {
    $("#busqueda").keypress(function(e){
        var filtro = 1;
        if (e.which==13){
            filtro = $(this).val()
            top.location.href = "busqueda.php?filtro="+filtro;
        }
    });
    if ( $(".example-group").length > 0 ) {
        $(".example-group").fancybox({
                // Options will go here
            'transitionIn'  :   'elastic',
            'transitionOut' :   'elastic',
            'speedIn'       :   600, 
            'speedOut'      :   200, 
            'overlayShow'   :   false
        });
    }
    var map;
    function initMap(latitud,longitud) {
        if ( $("#map").length > 0 ) {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: latitud , lng: longitud},
                zoom: 18,
            });
            var image = './resources/assets/image/map-marker.png';
            var beachMarker = new google.maps.Marker({
                position: {lat: latitud, lng: longitud},
                map: map,
                icon: image
            });
        }
    }
    initMap(-12.096941, -77.037019)
    mostrarMapa = function(id){
        var midireccion = ""
        if (id==1){
            initMap(-12.096941, -77.037019);
            midireccion = "<b> Av. Victor Andrés Belaunde 147 </b>";
            midireccion+= "Torre Real Uno, Oficina 602 – San Isidro";
            midireccion+= "<br />";
            midireccion+= "<b> Telf: (01) 493 4225</b>";
            midireccion+= "<br />";
            midireccion+= "<b> Cel: 933534107</b>";
            $("#midireccion").html(midireccion);
        }
        if (id==2){
            initMap(-5.184439,-80.630773);
            midireccion = "<b> Mz. X. Lt. 6A, Zona Industrial </b>";
            midireccion+= "Distrito 26 de Octubre";
            midireccion+= "<br />";
            midireccion+= "<b> Piura </b>";
            midireccion+= "<br />";
            midireccion+= "<b> Perú </b>";
            $("#midireccion").html(midireccion);
        }
    }
});

var mouseZoom =  function(){
    $(this).prev().before().addClass("scale-img");
}
var mouseoutZoom =  function(){
    $(this).prev().before().removeClass("scale-img");
    $(this).prev().before().css("transition:all .2s");
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
    $("body").toggleClass("bloqueoMenu");
}
// fin menu collapse
// sub sub menu
var subMenuCollapse =  function(){
    // $("").slideToggle(500);
    $(".submenu-movil").toggleClass("subBlock");
}
// fin sub submenu
// boton go to up
var gotoUp =  function(){
    $("html, body").animate({ 
            scrollTop: 0 
        }, 1500,"linear");
}
// fin boton go to up
// funcion somosUP
var somosUP =  function(){
    // $("#nosotros").append($(".menuNosMovil"));
    $(".contenedorNosotros").slideToggle("slow");
}
// fin funcion somosUP
// funcion misionMovile
var misionMovile =  function(){
    // $("#nosotros").append($(".menuNosMovil"));
    $(".mision").slideToggle("slow");
}
// fin funcion misionMovile
// funcion .valorMovil
var valorMovil =  function(){
    // $("#nosotros").append($(".menuNosMovil"));
    $(".valores").slideToggle("slow");
}
// fin funcion .valorMovil
// funcion .talentoMovil
var talentoMovil =  function(){
    // $("#nosotros").append($(".menuNosMovil"));
    $(".talento").slideToggle("slow");
}
// fin funcion .talentoMovil
// funcion .fosfatoMovil
var fosfatoMovil =  function(){
    // $("#fosfatos").append($(".submenuFM"));
    $(".fosfatoProy").slideToggle("slow");
    // alert($(".galeriaRF").html())
}
// funcion .salmueraMovil
var salmueraMovil =  function(){
    // $("#salmuera").append($(".submenuFM"));
    $(".salmueraProy").slideToggle("slow");
}
var sostenibilidadMovil =  function(){
    // $("#sostenibilidad").append($(".menuSosMovil"));
    $(".sostenibilidad-social").slideToggle("slow");
    migaleriaSoS();
};
var activeMovsos =  function(){
    // $("#beca").append($(".menuMovSos"));
    $(".sSalud").slideToggle("slow");
    migaleriaSoS();
};
var becaVideo =  function(){
    // $("#beca").append($(".menuMovSos"));
    $(".programaBeca").slideToggle("slow");
    migaleriaSoS();
};
var actComun =  function(){
    // $("#comunicacion").append($(".menuMovSa"));
    $(".sSalud").slideToggle("slow");
    $(".contenedorSpots").slideToggle("slow");
    // migaleriaSoS();
};
var movVideoBtn =  function(){
    // $("#videos").append($(".menuMovVid"));
    $(".Videos").slideToggle("slow");
};
var oficina =  function(){
    // $("#oficina").append($(".MenuOficina"));
    $(".oficinaMovil").slideToggle("slow");
};
// fin funcion .fosfatoMovil
function galeria (){
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
            {   breakpoint: 992,
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
// funcion .sostenibilidadMovil
function migaleriaSoS (){
    console.log(3);
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
            // {   breakpoint: 768,
            //     settings: {
            //         item: 3,
            //     },
            // },
            {   breakpoint: 426,
                settings: {
                    item: 1,
                }
            }
        ]
    });
    //fin de la funcion
}
// fin funcion .sostenibilidadMovil
// funcion ancla para submenus
$(document).ready(function() {
    if ($("#ancla").length > 0){
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
    }
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
$(document).ready(function() {
    $(".sliderUno").lightSlider({
        item: 1,
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
                    item: 2,
                },
            },
            {   breakpoint: 425,
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
$(document).ready(function() {
    $(".boletinSos").lightSlider({
        item: 1,
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
        controls: true,
        galleryMargin: 5,
        thumbMargin: 5,
        currentPagerPosition: 'middle',
        freeMove:false,
    });
});
// validacion formulario

var valFC = function(){
    $("#formcontacto").validate({
        rules: {
            "name": {
                required: true,
                minlength:3
                // lettersonly: true
            },
            "mail": {
                required: true,
                email: true
            },
            "adress": {
                required: true,
            },
            "telf": {
                required: true,
                number: true,
                maxlength:9
            },
            "comment": {
                required: true,
                // email: true,
                maxlength:140
            },
        },
        messages: {
            "name": "Escriba un nombre válido",
            "mail": "Escriba su e-mail.",
            "adress": "Escriba su dirección",
            "telf": "Escriba un teléfono válido",
            "comment": "Deje su comentario"
        }
    })
}
var valFCV = function(){
    $("form.cv").validate({
        rules: {
            "name2": {
                required: true,
                minlength:3
                // lettersonly: true
            },
            "mail2": {
                required: true,
                email: true
            },
            "adress2": {
                required: true,
            },
            "telf2": {
                required: true,
                number: true,
                maxlength:9
            },
            "dni": {
                required: true,
                number: true,
                maxlength:9
            },
            "comment2": {
                required: true,
                // email: true,
                maxlength:140
            },
        },
        messages: {
            "name2":"Escriba su nombre",
            "mail2":"Escriba su e-mail.",
            "adress2":"Escriba su dirección",
            "telf2":"Escriba su número de contacto",
            "dni":"Número de DNI",
            "comment2": "Deje su comentario"
        }
    })
}

$(document).ready(function(){
    //alert(234);
    valFC();
    valFCV();
    function initNoticias(){
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
            if ($("#publicaciones").length > 0){
                data = jQuery.parseJSON(response);
                console.log(data);
                $("#publicaciones").append(data.noticias);
                $("#paginar").attr("data-paginacion",data.paginacion);
                if (data.boolpagina == 0)
                    $("#paginar").fadeOut("slow");
            }
        });
    }
    function initBusqueda(){
        var _link = "controller/busqueda.php"; 
        var paginacion = $("#paginar").attr("data-paginacion");
        var _filtro = $("#_filtro").val();
        //alert(paginacion);
        var form_data = {
            "page" : paginacion,
            "filtro" : _filtro
        }
        console.log(form_data);
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
    }

    $(".verMas").click(function () {
        initNoticias();
    });
    $(".verMasBusqueda").click(function () {
        initBusqueda();
    });
    if ($(".innerBusqueda").length <= 0)
        initNoticias();
});