<?php
define("_URL_", "http://americas-potash.com/");

include('./config/conexion.php');
include('./modelo/funciones.php');
include('./modelo/url.php');
include('./modelo/noticia.php');

$url = $_GET['not_url'];
$objfunc 	= new misFunciones();

$objnot 	= new Noticia();
$codigo 	= $objnot->dameCodigo($url);

$objnot 	= new Noticia();
$datanot 	= $objnot->dameDetalle($codigo);
$data 	    = $datanot[0];
$codigo 	= $data['art_id'];
$titulo 	= $objfunc->convertir_html($data['art_nombre']);
$order 	    = $data['art_order'];
$url_seo    = $data['nameurl_seo'];
$descrip_superior = $objfunc->convertir_html($data['art_descripsuperior']);
$descrip_inferior = $objfunc->convertir_html($data['art_descripinferior']);
$sumilla 		  = $objfunc->convertir_html($data['art_frase']);
//$img_portada'] 	 = $data['art_imgportada'];
$act_img_portada  = $data['art_imgportada'];
if (empty($data['art_imgportada']))
	$act_img_portada  = "blanco.jpg";
$tip_multimedia 	  = $data['art_tipomultimedia'];
$categoria 	 	 = $data['tca_cat_id'];
$namecategoria 	 = $data['namecategoria'];
if ($data['art_tipomultimedia'] == 0)
	$name_tip_multimedia  = "Tipo de Multimedia";
if ($data['art_tipomultimedia'] == 1)
	$name_tip_multimedia  = "Imágen";
if ($data['art_tipomultimedia'] == 2)
	$name_tip_multimedia  = "Video (Youtube)";
$act_mul_imagen 	 = $data['art_imggrande'];
if (empty($data['art_imggrande']))
	$act_mul_imagen  = "blanco.jpg";
$mul_video 		 = $data['art_video'];
$f_publicacion 	 = $data['art_fechapublicacion'];
if ($data['art_estado']== 1) 
	$estado 	= true;
else
	$estado 	= false;
if ($data['art_destacado']== 1) 
	$destacado 	= true;
else
	$destacado 	= false;

// Imprmimos la galeria
$objnot     = new Noticia();
$datagal     = $objnot->dameGaleria($codigo);
$item = count($datagal) - 1;
$html_gal = "";
for($i=0;$i<=$item;$i++){
    $d_gal = $datagal[$i];
    $gal_imagen = $d_gal['gal_imagen'];
    $html_gal.= "<li class='example-group' data-fancybox='group' href='"._URL_."/admin-american/resources/assets/image/noticias/galeria/".$gal_imagen."'>";
    $html_gal.= "<img class='image-click' src='"._URL_."/admin-american/resources/assets/image/noticias/galeria/".$gal_imagen."' alt='' width='100%'>";
    $html_gal.= "<div class='caja-hover-galeria'><i class='icon-eye'></i></div>";
    $html_gal.= "</li>";
} 

//Listado de noticia
$objnot     = new Noticia();
$datanot     = $objnot->damepageNoticia($codigo);
$item = count($datanot) - 1;
$page_html = "";
$cambio = false;
for($i=0;$i<=$item;$i++){
    $d_not = $datanot[$i];
    $url = "noticias/".$d_not['seo_url'];
    if ($item > 0){
        if ($cambio==false){
            $page_html.= "<div class='prev'><a href='"._URL_.$url."'><i class='icon-caret-left'></i></a></div>"; 
            $cambio = true;
        }else{
            $page_html.= "<div class='next'><a href='"._URL_.$url."'><i class='icon-caret-right'></i></a></div>";
            $cambio = false;
        }
    }else{
        $page_html = "<div class='next'><a href='"._URL_.$url."'><i class='icon-caret-right'></i></a></div>";
    }
}

?>
<!DOCTYPE html>
<html lang="es" ng-app="Ohemedical">

<head>
    <title>Americas Potash</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="<?php echo _URL_?>resources/assets/css/lightslider.css">
    <link href="<?php echo _URL_?>resources/assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="<?php echo _URL_?>resources/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo _URL_?>resources/assets/css/app.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo _URL_?>resources/assets/image/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo _URL_?>resources/assets/image/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo _URL_?>resources/assets/image/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo _URL_?>resources/assets/image/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo _URL_?>resources/assets/image/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo _URL_?>resources/assets/image/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo _URL_?>resources/assets/image/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo _URL_?>resources/assets/image/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo _URL_?>resources/assets/image/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo _URL_?>resources/assets/image/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo _URL_?>resources/assets/image/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo _URL_?>resources/assets/image/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo _URL_?>resources/assets/image/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo _URL_?>resources/assets/image/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script src="<?php echo _URL_?>resources/assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo _URL_?>resources/assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo _URL_?>resources/assets/js/jquery.fancybox.min.js"></script>
    <script src="<?php echo _URL_?>resources/assets/js/lightslider.min.js"></script>
    <script src="<?php echo _URL_?>resources/assets/js/jquery.easing.1.3.js"></script>
    <script src="<?php echo _URL_?>resources/assets/js/validacion.js"></script>
    <script src="<?php echo _URL_?>resources/assets/js/init.js"></script>
    <!--script(src="<?php echo _URL_?>resources/assets/js/app.js")-->
</head>

<body ng-view>
    <header class="header" ng-controller="headerCrtl">
        <div class="container">
            <div class="logo-max hidden-md hidden-lg"><a href="<?php echo _URL_?>index"><img src="<?php echo _URL_?>resources/assets/image/logo-trans.png" id="logo-apM" alt="" width="100%"></a>
                <div class="box-burguer">
                    <div id="box-search"><img src="<?php echo _URL_?>resources/assets/image/lupa.png" width="40px" alt=""></div><a class="line-burguer"></a></div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 logo-header hidden-sm hidden-xs"><a href="<?php echo _URL_?>index"><img src="<?php echo _URL_?>resources/assets/image/logo-trans.png" id="logo-ap" alt="" width="100%"></a></div>
                <div class="col-lg-9 col-md-9 visible-md visible-lg-inline-block">
                    <nav class="menu-header">
                        <ul>
                            <li><a href="<?php echo _URL_?>index">Inicio</a></li>
                            <li class="subNos"><a href="javascript:void(0)">Nosotros<span> &#9660;</span></a>
                                <ul class="submenu-header">
                                    <li><a href="<?php echo _URL_?>nosotros">¿Quiénes somos?</a></li>
                                    <li><a href="<?php echo _URL_?>mision">Misión y Visión</a></li>
                                    <li><a href="<?php echo _URL_?>valores">Valores</a></li>
                                    <li><a href="<?php echo _URL_?>talento">Talento Humano </a></li>
                                </ul>
                            </li>
                            <li class="subProy"><a href="javascript:void(0)">Proyectos<span> &#9660;</span></a>
                                <ul class="submenu-header">
                                    <li><a href="<?php echo _URL_?>fosfatos">Fosfatos</a></li>
                                    <li><a href="<?php echo _URL_?>salmuera">Salmueras</a></li>
                                </ul>
                            </li>
                            <li class="subSost"><a href="javascript:void(0)">Sostenibilidad<span> &#9660;</span></a>
                                <ul class="submenu-header">
                                    <li><a href="<?php echo _URL_?>sostenibilidad">Responsabilidad Social</a></li>
                                    <li><a href="<?php echo _URL_?>salud">Salud, Seguridad y Medio Ambiente</a></li>
                                </ul>
                            </li>
                            <li><a class="active" href="<?php echo _URL_?>comunicacion-corporativa">Comunicación Corporativa</a></li>
                            <li><a href="<?php echo _URL_?>contacto">Contáctenos</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 visible-md visible-lg-inline-block">
                    <div class="box-search" id="box-search">
                        <div><a class="active" href="<?php echo _URL_?>index">Español</a><span> /</span><a href="<?php echo _URL_?>en/index">English</a></div><img src="<?php echo _URL_?>resources/assets/image/lupa.png" width="40px" alt=""></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container-fluid">
                <div class="row hidden-md hidden-lg">
                    <nav class="menu-collapse">
                        <ul class="menu-collapse text-center">
                            <li><a href="<?php echo _URL_?>index">Inicio</a></li>
                            <li class="sMenuNosotros"><a href="javascript:void(0)">Nosotros</a>
                                <ul class="submenu-movil">
                                    <li><a href="<?php echo _URL_?>nosotros">¿Quiénes somos?</a></li>
                                    <li><a href="<?php echo _URL_?>mision">Misión</a></li>
                                    <li><a href="<?php echo _URL_?>valores">Valores</a></li>
                                    <li><a href="<?php echo _URL_?>talento">Talento Humano</a></li>
                                </ul>
                            </li>
                            <li class="sMenuProy"> <a href="javascript:void(0)">Proyectos</a>
                                <ul class="submenu-movil">
                                    <li><a href="<?php echo _URL_?>fosfatos">Fosfatos</a></li>
                                    <li><a href="<?php echo _URL_?>salmuera">Salmuera</a></li>
                                </ul>
                            </li>
                            <li class="sMenuSostenibilidad"><a href="javascript:void(0)">Sostenibilidad</a>
                                <ul class="submenu-movil">
                                    <li><a href="<?php echo _URL_?>sostenibilidad">Responsabilidad Social</a></li>
                                    <li><a href="<?php echo _URL_?>salud">Salud, Seguridad y Medio Ambiente</a></li>
                                </ul>
                            </li>
                            <li> <a href="<?php echo _URL_?>comunicacion-corporativa">Comunicación Corporativa</a></li>
                            <li><a href="<?php echo _URL_?>contacto">Contáctenos</a></li>
                            <ul class="idiomas">
                                <li><a class="activeIdioma" href="<?php echo _URL_?>index">Español</a></li>
                                <li><a href="<?php echo _URL_?>en/index">English</a></li>
                            </ul>
                        </ul>
                    </nav>
                </div><input class="style-box-search disp-none" type="text" id="busqueda" name="search" placeholder="Buscar..." autofocus></div>
        </div>
    </header>
    <section id="detalle">
        <div class="container-fluid">
            <div class="row">
                <div class="bannerPrincipal comuncCorp"><iframe src="https://player.vimeo.com/video/218965167?color=FFF&title=0&byline=0&portrait=0" width="100%" height="480px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="noticias-comunicacion">
                    <div class="row hidden-xs">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h2 class="text-center titulo"><b>Comunicación Corporativa</b></h2>
                        </div>
                        <div class="col-lg-12" id="ancla">
                            <h3>Noticias</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col md-8 col-sm-8 col-xs-12">
                            <div class="inner-detalle">
                                <h1><?php echo $titulo; ?><br><span><?php echo $sumilla; ?></span></h1>
                                <ul class="sliderUno">
                                    <?php echo $html_gal; ?>
                                </ul>
                                <?php echo $descrip_inferior; ?>
                                <div class="direccionNoticia">
                                   <?php echo $page_html; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 hidden-xs">
                            <div class="container-brochure">
                                <div class="titulo-brochure">
                                    <h2>Brochure</h2>
                                </div>
                                <div class="row brochure">
                                    <div class="inner-brochure col-lg-7 col-md-7 col-sm-12 col-xs-7"><img src="<?php echo _URL_?>resources/assets/image/comunicacion-corporativa/brochure.png" alt=""></div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-5">
                                        <h2>BROCHURE</h2>
                                        <div class="icon-brochure">
                                            <div class="icon-download3"><a href="<?php echo _URL_?>resources/assets/documentos/brochure/brochure_1.pdf" target="_blank" download>Descargar pdf</a></div>
                                            <div class="icon-eye"><a href="<?php echo _URL_?>resources/assets/documentos/brochure/brochure_1.pdf" target="_blank">Ver más</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-brochure">
                                <div class="titulo-brochure">
                                    <h2>Prensa</h2>
                                </div>
                                <div class="row brochure">
                                    <div class="inner-brochure col-lg-7 col-md-7 col-sm-12 col-xs-7"><img src="<?php echo _URL_?>resources/assets/image/comunicacion-corporativa/prensa.png" alt=""></div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-5">
                                        <h2>COMUNICADO</h2>
                                        <div class="icon-brochure">
                                            <div class="icon-download3"><a href="<?php echo _URL_?>resources/assets/documentos/prensa/comunicado_1.pdf" target="_blank" download>Descargar pdf</a></div>
                                            <div class="icon-eye"><a href="<?php echo _URL_?>resources/assets/documentos/prensa/comunicado_1.pdf" target="_blank">Ver más</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="btnGoUp hidden-xs"><i class="icon-chevron-up"></i></div>
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 box-footer">
                        <div class="row box-logos">
                            <div><a href="<?php echo _URL_?>index"><img src="<?php echo _URL_?>resources/assets/image/logo-potash-footer.png" alt="" width="100%"></a></div>
                            <div><a href="http://www.growmaxcorp.com/" target="_blank"><img src="<?php echo _URL_?>resources/assets/image/logo-growmax-footer.png" alt="" width="100%"></a></div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 box-footer">
                        <div class="row">
                            <div class="footer-enlaces">
                                <div><a href="<?php echo _URL_?>index">Inicio</a><a href="<?php echo _URL_?>nosotros">Nosotros</a><a href="<?php echo _URL_?>fosfatos">Proyectos</a></div>
                                <div><a href="<?php echo _URL_?>sostenibilidad">Sostenibilidad</a><a href="<?php echo _URL_?>comunicacion-corporativa">Comunicación Corporativa</a><a href="<?php echo _URL_?>contacto">Contáctenos</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center">Todos los derechos reservados <span>AMERICAS POTASH</span></p>
        </div>
    </footer>
    <style>
        #detalle .inner-detalle p{
            margin: 0;
        }
        #detalle .inner-detalle h3{
            color: #5d5d5d !important;
            font: 19px "alegreya_sansregular" !important;
            padding: 0 30px !important;
        }
        #detalle .inner-detalle h3:after{
            content: "";
            border: 0;
            position: relative;
            right: auto;
            left: auto;
            width: auto;
            bottom: auto;
        }
    </style>
</body>

</html>