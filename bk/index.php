<?php 
include('./config/conexion.php');
include('./modelo/funciones.php');
include('./modelo/usuario.php');
include('./modelo/url.php');
include('./modelo/noticia.php');

$objnot 	= new Noticia();
$datanot 	= $objnot->dameListadoDestacado();

$item 		= count($datanot) - 1;
$objfunc 	= new misFunciones();
$html_destacado = "";
for($i=0; $i<=$item; $i++){
	$contItem++;
	$data 	= $datanot[$i];
	$titulo = $data['art_nombre'];
	$data['art_descripsuperior'] = $objfunc->convertir_html($data['art_descripsuperior']);
	$descripsuperior = $data['art_descripsuperior'];
	$sumilla			 = $data['art_frase']; 	
	$seo_url			= "./noticias/".$data['seo_url'];
	$imgportada 		= $data['art_imgportada'];
	
	$imggrande		= $data['art_imggrande'];
	$video			= $data['art_video'];
	
	$html_destacado.= "<li>";
	$html_destacado.= "<a href='".$seo_url."'>";
	$html_destacado.= "<img class='notiImg' src='"._URL_."/admin-american/resources/assets/image/noticias/".$imgportada."' alt='' width='100%'>";
	$html_destacado.= "<div class='caja-hover-not'>";
	$html_destacado.= "<p class='titular text-center'>".$titulo."</p>";
	$html_destacado.= "<div class='noticia text-center'>";
	$html_destacado.= "<p>".$sumilla."</p>";
	$html_destacado.= "<a href='".$seo_url."'><i class='icon-eye'><span>Ver más</span></i></a>";
	$html_destacado.= "</div>";
	$html_destacado.= "</div>";
	$html_destacado.= "</a>";
	$html_destacado.= "<div class='descrip-img-noticias hidden-lg'>";
	$html_destacado.= "<a href='".$seo_url."'>";
	$html_destacado.= "<p> ".$titulo."</p>";
	$html_destacado.= "</a>";
	$html_destacado.= "</div>";
	$html_destacado.= "</li>";

}

/**Noticia destacada **/
$html_new_destacado = "";
$html_new_destacado.= "<div class='row noticia-destacada hidden-md hidden-lg'>";
$html_new_destacado.= "<a href='./news/".$datanot[0]['seo_url']."'>";
$html_new_destacado.= "<img src='"._URL_."admin-american/resources/assets/image/noticias/".$datanot[0]['art_imgportada']."' alt='' width='100%'>";
$html_new_destacado.= "<div class='descrip-img-noticias'>";
$html_new_destacado.= $datanot[0]['art_nombre'];
$html_new_destacado.= "</div>";
$html_new_destacado.= "</a>";
$html_new_destacado.= "</div>";
?>
<!DOCTYPE html>
<html lang="es" ng-app="Ohemedical">

<head>
    <title>Américas Potash</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="./resources/assets/css/lightslider.css">
    <link href="./resources/assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./resources/assets/css/font.css">
    <link href="./resources/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./resources/assets/css/app.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="57x57" href="./resources/assets/image/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./resources/assets/image/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./resources/assets/image/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./resources/assets/image/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./resources/assets/image/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./resources/assets/image/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./resources/assets/image/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./resources/assets/image/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./resources/assets/image/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="./resources/assets/image/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./resources/assets/image/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./resources/assets/image/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./resources/assets/image/favicon/favicon-16x16.png">
    <link rel="manifest" href="./resources/assets/image/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="format-detection" content="telephone=no">
</head>

<body class="no-scroll" ng-view>
    <header class="header" ng-controller="headerCrtl">
        <div class="container">
            <div class="logo-max hidden-md hidden-lg"><a href="<?php echo _URL_?>index"><img src="./resources/assets/image/logo-trans.png" id="logo-apM" alt="" width="100%"></a>
                <div class="box-burguer">
                    <div id="box-search"><img src="./resources/assets/image/lupa.png" width="40px" alt=""></div><a class="line-burguer"></a></div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 logo-header hidden-sm hidden-xs"><a href="<?php echo _URL_?>index"><img src="./resources/assets/image/logo-trans.png" id="logo-ap" alt="" width="100%"></a></div>
                <div class="col-lg-9 col-md-9 visible-md visible-lg-inline-block">
                    <nav class="menu-header">
                        <ul>
                            <li><a class="active" href="<?php echo _URL_?>index">Inicio</a></li>
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
                            <li><a href="<?php echo _URL_?>comunicacion-corporativa">Comunicación Corporativa</a></li>
                            <li><a href="<?php echo _URL_?>contacto">Contáctenos</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 visible-md visible-lg-inline-block">
                    <div class="box-search" id="box-search">
                        <div><a class="active" href="<?php echo _URL_?>index">Español</a><span> /</span><a href="<?php echo _URL_?>en/index">English</a></div><img src="./resources/assets/image/lupa.png" width="40px" alt=""></div>
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
    <section id="banner">
        <div class="container-fluid">
            <div class="row contenedor-banner">
                <ul class="banner">
                    <li><img class="banner-movilGrande" src="./resources/assets/image/banner-fosfato.jpg" alt=""><img class="banner-movil" src="./resources/assets/image/banner-movilFos.jpg" alt="" width="100%">
                        <div class="letrero-banner">
                            <div>
                                <h2>Ayudando a alimentar el mundo</h2>
                                <div class="rectangle">El consumo de fertilizantes potásicos y fosfatados ha aumentado junto con la producción de alimentos.</div>
                            </div>
                        </div>
                    </li>
                    <li><img class="banner-movilGrande" src="./resources/assets/image/banner-labrador.jpg" alt=""><img class="banner-movil" src="./resources/assets/image/banner-movilLabrador.jpg" alt="" width="100%">
                        <div class="letrero-banner">
                            <div>
                                <h2>Enriqueciendo la tierra</h2>
                                <div class="rectangle">Produciremos fertilizantes ricos en fósforo y potasio.</div>
                            </div>
                        </div>
                    </li>
                    <li><img class="banner-movilGrande" src="./resources/assets/image/banner-salmuera.jpg" alt=""><img class="banner-movil" src="./resources/assets/image/banner-movilSalm.jpg" alt="" width="100%">
                        <div class="letrero-banner">
                            <div>
                                <h2>Cuidando nuestro entorno</h2>
                                <div class="rectangle">Operaciones seguras y ambientalmente responsables.</div>
                            </div>
                        </div>
                    </li>
                    <li><img class="banner-movilGrande" src="./resources/assets/image/banner-creciendo.jpg" alt=""><img class="banner-movil" src="./resources/assets/image/banner-movilStn.jpg" alt="" width="100%">
                        <div class="letrero-banner">
                            <div>
                                <h2>Creciendo juntos</h2>
                                <div class="rectangle">Por el desarrollo sostenible de nuestro entorno.</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section id="inicio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Noticias</h3>
                    <?php echo $html_new_destacado;?>
                    <div class="row">
                        <ul class="sliderNoticias">
                            <?php echo $html_destacado; ?>
        				</ul>
        			</div>
        		</div>
        	</div>
	        <div class="row galerias">
	            <div class="col-lg-12">
	                <h3>Galería</h3>
	                <div class="row">
	                    <ul class="sliderGaleria">
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/zoom/0382.jpg"><img class="image-click" src="./resources/assets/image/0382.jpg" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/zoom/0341.jpg"><img class="image-click" src="./resources/assets/image/0341.png" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/zoom/0419.jpg"><img class="image-click" src="./resources/assets/image/0419.jpg" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/zoom/1043.jpg"><img class="image-click" src="./resources/assets/image/1043.png" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/zoom/1126.jpg"><img class="image-click" src="./resources/assets/image/1126.png" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/zoom/1388.jpg"><img class="image-click" src="./resources/assets/image/1388.png" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/zoom/0667.png"><img class="image-click" src="./resources/assets/image/0667.png" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/zoom/0509.jpg"><img class="image-click" src="./resources/assets/image/0509.png" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/zoom/0576.jpg"><img class="image-click" src="./resources/assets/image/0576.png" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/zoom/0183.jpg"><img class="image-click" src="./resources/assets/image/0183.jpg" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/zoom/0250.jpg"><img class="image-click" src="./resources/assets/image/0250.jpg" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/zoom/0188.jpg"><img class="image-click" src="./resources/assets/image/0188.jpg" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/zoom/1333.jpg"><img class="image-click" src="./resources/assets/image/1333.jpg" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/zoom/1349.jpg"><img class="image-click" src="./resources/assets/image/1349.jpg" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/zoom/2011.jpg"><img class="image-click" src="./resources/assets/image/2011.jpg" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/zoom/1964.jpg"><img class="image-click" src="./resources/assets/image/1964.jpg" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/22_6139.jpg"><img class="image-click" src="./resources/assets/image/6139.jpg" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/5924.jpg"><img class="image-click" src="./resources/assets/image/1_5924.jpg" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/24_6289.jpg"><img class="image-click" src="./resources/assets/image/6289.jpg" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/7410.jpg"><img class="image-click" src="./resources/assets/image/1_7410.jpg" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/01_0049.jpg"><img class="image-click" src="./resources/assets/image/0049.jpg" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/02_9984.jpg"><img class="image-click" src="./resources/assets/image/9984.jpg" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/9862.png"><img class="image-click" src="./resources/assets/image/9862.png" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/5634.png"><img class="image-click" src="./resources/assets/image/5634.png" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                        <li class="example-group" data-fancybox="group" href="./resources/assets/image/05_5664.jpg"><img class="image-click" src="./resources/assets/image/5664.png" alt="" width="100%">
	                            <div class="caja-hover-galeria"><i class="icon-eye"></i></div>
	                        </li>
	                    </ul>
	                </div>
	            </div>
	        </div>
        </div>
    </section>
    <section id="contacto">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="content-contact">
                        <div class="row">
                            <div class="contacto-titulo text-center">
                                <h2> <b>CONTACTO</b></h2>
                                <p>Nos encantaría saber sobre tus comentarios y/o sugerencias</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="box-contact">
                                    <div><i class="icon-envelope-o"></i>informes@americas-potash.com<br><br></div>
                                    <div><i class="icon-mobile"></i>933 534 107<br><br></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <form id="formcontacto"><input type="text" placeholder="Nombre" name="name" id="name" required><label for="name"></label><input type="text" placeholder="Dirección" name="adress" id="adress" required><label for="adress"></label>
                                    <div class="duo-input">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row"><input type="text" placeholder="E-mail" name="mail" id="mail" required><label for="mail"></label></div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row"><input type="text" placeholder="Teléfono" name="telf" maxlength="9" id="telf" required><label for="telf"></label></div>
                                        </div>
                                    </div><textarea type="text" placeholder="Comentario" name="comment" rows="6" id="comment"></textarea><button type="button" id="btn-form"><b>Enviar</b></button></form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="mapa">
        <div class="container-fluid">
            <div class="row">
                <div class="oficinas"><a class="lima" href="javascript:void(0)" onclick="mostrarMapa(1)">Lima</a><a class="piura" href="javascript:void(0)" onclick="mostrarMapa(2)">Piura</a></div>
                <div class="floatDirecc"><img src="./resources/assets/image/dialogo.png">
                    <div class="direccion"><i class="icon-location"></i>
                        <p id="midireccion"><b>Av. Victor Andrés Belaunde 147 </b><br>Torre Real Uno, Oficina 602 – San Isidro<br><b>Telf: (01) 493 4225</b><br><b>Cel: 933 534 107</b></p>
                    </div>
                </div>
            </div>
        </div>
        <div id="map"></div>
    </section>
    <footer>
        <div class="btnGoUp hidden-xs"><i class="icon-chevron-up"></i></div>
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 box-footer">
                        <div class="row box-logos">
                            <div><a href="<?php echo _URL_?>index"><img src="./resources/assets/image/logo-potash-footer.png" alt="" width="100%"></a></div>
                            <div><a href="http://www.growmaxcorp.com/" target="_blank"><img src="./resources/assets/image/logo-growmax-footer.png" alt="" width="100%"></a></div>
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
    <div id="carga">
        <div class="bienvenida"><img src="./resources/assets/image/transparente.png">
            <p>Cargando ...</p>
        </div>
    </div>
</body>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAqTeX8G5xOAMXSAgN7OjsQwSwIludCEw"></script>
<script src="./resources/assets/js/jquery-3.1.1.min.js"></script>
<script src="./resources/assets/js/jquery.validate.min.js"></script>
<script src="./resources/assets/js/jquery.fancybox.min.js"></script>
<script src="./resources/assets/js/lightslider.min.js"></script>
<script src="./resources/assets/js/validacion.js"></script>
<script src="./resources/assets/js/init.js"></script>

</html>