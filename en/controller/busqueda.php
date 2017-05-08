<?php
date_default_timezone_set('America/Lima');//-->definimos la zona horaria

include('../config/conexion.php');
include('../modelo/funciones.php');
include('../modelo/noticia.php');

if (!isset($_POST['page']))
  $page = 1;
else 
  $page     = $_POST['page'];
if (!isset($_POST['filtro']))
  $filtro = "";
else
  $filtro   = $_POST['filtro'];
$arr = "";
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

/**

Estamos imprimiendo los inmuebles que son de Venta

**/
$objdep  = new Noticia();
$objData = $objdep->dameListado($page,$filtro,$inicio,$TAMANO_PAGINA);
$arr['xx'] = $objData;
$item = count($objData) - 1;
$arr['noticias'] = "";

for($i=0;$i<=$item;$i++){

  $data = $objData[$i];
  
  $not_id = $data['not_id'];
  $not_titulo = $data['not_titulo'];
  $not_descripcion = substr($data['not_descripcion'], 0, 150);
  $not_link = $data['not_link'];
  $not_fechacreacion  = $data['not_fechacreacion'];


  $arr['noticias'].= "<div class='row inner-noticia'>";
  $arr['noticias'].= "<h4>".$not_titulo."</h4>";
  $arr['noticias'].= $not_descripcion." ...";
  $arr['noticias'].= "<div class='seguirL'>";
  $arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='".$not_link."'>Seguir Leyendo</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
  $arr['noticias'].= "</div>";
  $arr['noticias'].= "</div>";

}
$arr['boolpagina'] = 1; // muestra boton
if ($page == $total_paginas){
	$arr['boolpagina'] = 0; // no muestra boton
}

$arr['paginacion'] = $page + 1;

echo json_encode($arr);
?> 