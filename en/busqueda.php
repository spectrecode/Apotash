<?php
date_default_timezone_set('America/Lima');//-->definimos la zona horaria

include('config/conexion.php');
include('modelo/funciones.php');
include('modelo/noticia.php');

if (!isset($_GET['filtro']))
  $page = 1;
else 
  $page     = $_GET['page'];
if (!isset($_GET['filtro']))
  $filtro = "";
else
  $filtro   = $_GET['filtro'];


/**
 Proceso de paginado
**/
$objnot     = new Noticia();
$datanot    = $objnot->dameListado($page,$filtro,0,0);
$num_total_registros = count($datanot);
//Limito la busqueda
$TAMANO_PAGINA = 3;

$pagina = $page;

if (!$pagina) {
   $inicio = 0;
   $pagina = 1;
}
else {
   $inicio = ($pagina - 1) * $TAMANO_PAGINA;
}

//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);


/*
procesamos la info
*/

$objnot   = new Noticia();
$datalist = $objnot->dameListado($page,$filtro,0,3);
$count = count($datalist) - 1;

$html = "";
for($i=0;$i<=$count;$i++){

  $data = $datalist[$i];
  
  $not_id = $data['not_id'];
  $not_titulo = $data['not_titulo'];
  $not_descripcion = substr($data['not_descripcion'], 0, 150);
  $not_link = $data['not_link'];
  $not_fechacreacion  = $data['not_fechacreacion'];


  $html.= "<div class='row inner-noticia pbusqueda'>";
  $html.= "<h4 id='tBusqueda'>".$not_titulo."</h4>";
  $html.= $not_descripcion." ...";
  $html.= "<div class='seguirL'>";
  $html.= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='".$not_link."'>Read more</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
  $html.= "</div>";
  $html.= "</div>";
}

if ($count < 0){
  $html.= "<div class='row inner-noticia'>";
  $html.= "<p>No results found</p>";
  $html.= "</div>";
}
//var_dump($datalist);

if ($total_paginas == 1)
  $count = -1;

?>
<!DOCTYPE html>
<html lang="es" ng-app="Ohemedical">
  <head>
    <title>Americas Potash</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="./resources/assets/css/lightslider.css">
    <link href="./resources/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./resources/assets/css/app.css" rel="stylesheet">
    <script src="./resources/assets/js/jquery-3.1.1.min.js"></script>
    <script src="./resources/assets/js/jquery.validate.min.js"></script>
    <script src="./resources/assets/js/lightslider.min.js"></script>
    <script src="./resources/assets/js/validacion.js"></script>
    <script src="./resources/assets/js/init.js"></script>
    <!--script(src="./resources/assets/js/app.js")-->
  </head>
  <body ng-view>
    <header class="header" ng-controller="headerCrtl">
      <div class="container">
        <div class="logo-max hidden-md hidden-lg">
          <a href="http://americas-potash.com/en/index"><img src="./resources/assets/image/logo-trans.png" id="logo-apM" alt="" width="100%"/></a>
          <div class="box-burguer">
            <div id="box-search">
              <img src="./resources/assets/image/lupa.png" width="40px" alt="">
            </div>
            <a class="line-burguer"></a>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2 col-md-2 logo-header hidden-sm hidden-xs"><a href="http://americas-potash.com/en/index"><img src="./resources/assets/image/logo-trans.png" id="logo-ap" alt="" width="100%"/></a></div>
          <div class="col-lg-9 col-md-9 visible-md visible-lg-inline-block">
            <nav class="menu-header">
              <ul>
                <li><a href="http://americas-potash.com/en/index">Home</a></li>
                <li class="subNos"><a href="javascript:void(0)">About Us<span> &#9660;</span></a>
                  <ul class="submenu-header">
                    <li><a href="http://americas-potash.com/en/About_Us">Who We Are</a></li>
                    <li><a href="http://americas-potash.com/en/Mission_and_Vision">Mission and Vision</a></li>
                    <li><a href="http://americas-potash.com/en/Values">Values</a></li>
                    <li><a href="http://americas-potash.com/en/Human_Talent">Human Talent</a></li>
                  </ul>
                </li>
                <li class="subProy"><a href="javascript:void(0)">Projects<span> &#9660;</span></a>
                  <ul class="submenu-header">
                    <li><a href="http://americas-potash.com/en/Phosphates">Phosphates</a></li>
                    <li><a href="http://americas-potash.com/en/Brine">Brine</a></li>
                  </ul>
                </li>
                <li class="subSost"><a href="javascript:void(0)">Sustainability<span> &#9660;</span></a>
                  <ul class="submenu-header">
                    <li><a href="http://americas-potash.com/en/Sustainability">Social Responsability</a></li>
                    <li><a href="http://americas-potash.com/en/Health">Health, Safety and Environment</a></li>
                  </ul>
                </li>
                <li><a href="http://americas-potash.com/en/Corporate_Communication">Corporate Communication</a></li>
                <li><a href="http://americas-potash.com/en/Contact_Us">Contact Us</a></li>
              </ul>
            </nav>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 visible-md visible-lg-inline-block">
            <div class="box-search" id="box-search">
              <div><a href="http://americas-potash.com/index">Español</a><span> /</span><a class="active" href="http://americas-potash.com/en/index">English</a></div><img src="./resources/assets/image/lupa.png" width="40px" alt=""/>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="container-fluid">
          <div class="row hidden-md hidden-lg">
            <nav class="menu-collapse">
              <ul class="menu-collapse text-center">
                <li><a href="http://americas-potash.com/en/index">Home</a></li>
                <li class="sMenuNosotros"><a href="javascript:void(0)">About Us</a>
                  <ul class="submenu-movil">
                    <li><a href="http://americas-potash.com/en/About_Us">Who We Are</a></li>
                    <li><a href="http://americas-potash.com/en/Mission_and_Vision">Mission and Vision</a></li>
                    <li><a href="http://americas-potash.com/en/Values">Values</a></li>
                    <li><a href="http://americas-potash.com/en/Human_Talent">Human Talent</a></li>
                  </ul>
                </li>
                <li class="sMenuProy"> <a href="javascript:void(0)">Projects</a>
                  <ul class="submenu-movil">
                    <li><a href="http://americas-potash.com/en/Phosphates">Phosphates</a></li>
                    <li><a href="http://americas-potash.com/en/Brine">Brine</a></li>
                  </ul>
                </li>
                <li class="sMenuSostenibilidad"><a href="javascript:void(0)">Sustainability</a>
                  <ul class="submenu-movil">
                    <li><a href="http://americas-potash.com/en/Sustainability">Social Responsability</a></li>
                    <li><a href="http://americas-potash.com/en/Health">Health, Safety and Environment</a></li>
                  </ul>
                </li>
                <li><a href="http://americas-potash.com/en/Corporate_Communication">Corporate Communication</a></li>
                <li><a href="http://americas-potash.com/en/Contact_Us">Contact Us</a></li>
                <ul class="idiomas">
                  <li><a href="http://americas-potash.com/index">Español</a></li>
                  <li><a class="activeIdioma" href="http://americas-potash.com/en/index">English</a></li>
                </ul>
              </ul>
            </nav>
          </div>
          <input class="style-box-search disp-none" type="text" id="busqueda" name="search" placeholder="Search..." autofocus="autofocus"/>
        </div>
      </div>
    </header>
    <section id="comunicacion-corporativa" class="innerBusqueda">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 noticias-comunicacion">
            <h3 id="resultados">Search results</h3>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-8 col md-8 col-sm-8 col-xs-12">
                  <div id="publicaciones">
                    <!-- inicio-->
                    <?php echo $html; ?>
                    <!-- final-->
                  </div>
                  <div class="row">
                    <?php if($count >= 0){?>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center verM"><a class="verMasBusqueda" id="paginar" href="javascript:void(0)" data-paginacion="2">Read more</a></div>
                      <input type="hidden" name="_filtro" id="_filtro" value="<?php echo $filtro; ?>" />
                    <?php }?>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="container-brochure">
                    <div class="titulo-brochure">
                      <h2>Brochure</h2>
                    </div>
                    <div class="row brochure">
                      <div class="inner-brochure col-lg-7 col-md-7 col-sm-12 col-xs-6"><img src="./resources/assets/image/comunicacion-corporativa/brochure.png" alt=""></div>
                      <div class="col-lg-5 col-md-5 col-sm-12 col-xs-6">
                        <h2>BROCHURE</h2>
                        <div class="icon-brochure">
                          <div class="icon-download3"><a href="./resources/assets/documentos/brochure/brochure_1.pdf" target="_blank" download>Download a PDF file</a></div>
                          <div class="icon-eye"><a href="./resources/assets/documentos/brochure/brochure_1.pdf" target="_blank">Read more</a></div>
                        </div>
                      </div>
                      <div class="icon-brochureM">
                        <div class="icon-download3"><a href="./resources/assets/documentos/brochure/brochure_1.pdf" target="_blank" download>Download a PDF file</a></div>
                        <div class="icon-eye"><a href="./resources/assets/documentos/brochure/brochure_1.pdf" target="_blank">Read more</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="container-prensa">
                    <div class="titulo-brochure">
                      <h2>Press</h2>
                    </div>
                    <div class="row brochure">
                      <div class="inner-brochure col-lg-7 col-md-7 col-sm-12 col-xs-6"><img src="./resources/assets/image/comunicacion-corporativa/prensa.png" alt=""></div>
                      <div class="col-lg-5 col-md-5 col-sm-12 col-xs-6">
                        <h2>PRESS RELEASE</h2>
                        <div class="icon-brochure">
                          <div class="icon-download3"><a href="./resources/assets/documentos/prensa/comunicado_1.pdf" target="_blank" download>Download a PDF file</a></div>
                          <div class="icon-eye"><a href="./resources/assets/documentos/prensa/comunicado_1.pdf" target="_blank">Read more</a></div>
                        </div>
                      </div>
                      <div class="icon-brochureM">
                        <div class="icon-download3"><a href="./resources/assets/documentos/prensa/comunicado_1.pdf" target="_blank" download>Download a PDF file</a></div>
                        <div class="icon-eye"><a href="./resources/assets/documentos/prensa/comunicado_1.pdf" target="_blank">Read more</a></div>
                      </div>
                    </div>
                    <div class="row text-center hidden-xs hidden-sm"><a href="http://americas-potash.com/detalle">Read more</a></div>
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
                <div><a href="http://americas-potash.com/en/index"><img src="./resources/assets/image/logo-potash-footer.png" alt="" width="100%"></a></div>
                <div><a href="http://www.growmaxcorp.com/" target="_blank"><img src="./resources/assets/image/logo-growmax-footer.png" alt="" width="100%"></a></div>
              </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 box-footer">
              <div class="row">
                <div class="footer-enlaces">
                  <div><a href="http://americas-potash.com/en/index">Home</a><a href="http://americas-potash.com/en/About_Us">About Us</a><a href="http://americas-potash.com/en/phosphates">Projects</a></div>
                  <div><a href="http://americas-potash.com/en/Sustainability">Sustainability</a><a href="http://americas-potash.com/en/Corporate_Communication">Corporate Communication</a><a href="http://americas-potash.com/en/Contact_Us">Contact Us</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <p class="text-center">All rights reserved by <span>MEDIA IMPACT</span></p>
      </div>
    </footer>
  </body>
</html>