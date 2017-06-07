<?php
date_default_timezone_set('America/Lima');

include('../config/conexion.php');
include('../modelo/funciones.php');
include('../modelo/usuario.php');
include('../modelo/noticia.php');

$arrjson = false;
$data = json_decode(file_get_contents('php://input'), true);
$page 		= $_POST['paginacion'];
$filtro 	= "";

$objnot 	= new Noticia();
$datanot 	= $objnot->dameListado2($page,$filtro,0,0);
$num_total_registros = count($datanot);



$arrjson['paginado']['num_total_registros'] = $num_total_registros;
//Limito la busqueda
$TAMANO_PAGINA = 25;
$arrjson['paginado']['TAMANO_PAGINA'] = $TAMANO_PAGINA;

$pagina = $page;

if (!$pagina) {
   $inicio = 0;
   $pagina = 1;
}
else {
   $inicio = ($pagina - 1) * $TAMANO_PAGINA;
}
$arrjson['paginado']['pagina'] = $pagina;
$arrjson['paginado']['inicio'] = $inicio;


//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

$arr['boolpagina'] = 1; // muestra boton

if ($arr['paginacion'] <= $total_paginas)
	$arr['boolpagina'] = 0; // no muestra boton

$arrjson['paginado']['total_paginas'] = $total_paginas;


// Imprimimos
$objnot 	= new Noticia();
$datanot 	= $objnot->dameListado2($page,$filtro,$inicio,$TAMANO_PAGINA);

$item 		= count($datanot) - 1;
$contItem   = $inicio; 
$objfunc 	= new misFunciones();
$arr['xxx'] = $item;
for($i=0; $i<=$item; $i++){
	$contItem++;
	$data 	= $datanot[$i];
	$items 		= $contItem;
	$id		= $data['art_id'];
	$titulo 	= $data['art_nombre'];
	$order	= $data['art_order'];
	$data['art_descripsuperior'] = $objfunc->convertir_html($data['art_descripsuperior']);
	$descripsuperior = $data['art_descripsuperior'];
	$descripinferior = $data['art_descripinferior'];
	$frase			= $data['art_frase']; 	
	$seo_url			= "./noticias/".$data['seo_url'];
	$imgportada 		= $data['art_imgportada'];
	$tipomultimedia 	= $data['art_tipomultimedia'];
	$categoria	= $data['tca_cat_id'];
	$namecategoria 	= $data['namecategoria'];
	$imggrande		= $data['art_imggrande'];
	$video			= $data['art_video'];
	$f_publicacion 	= $data['art_fechapublicacion'];
	$estado 	= $data['art_estado'];
	$destacado 	= $data['art_destacado'];
	if ($data['art_estado']==0){
		$classestado 			= "icon-cross";
		$estado = 1;
	}
	else{
		$classestado			= "icon-checkmark";
		$estado = 0;
	}
	if ($data['art_destacado']==0){
		$classdestacado 			= "icon-cross";
		$destacado 	= 1;
	}
	else{
		$classdestacado			= "icon-checkmark";
		$destacado	= 0;
	}
	$f_creacion		= $data['art_fechacreacion'];
	$f_modificacion	= $data['art_fechamodificacion'];


	$arr['noticias'].= "<div class='row inner-noticia'>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 inner-img'>";
	$arr['noticias'].= "<div class='inner-logo'><a href='".$seo_url."'><img src='./admin-american/resources/assets/image/noticias/".$imgportada."' alt=''></a></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>";
	$arr['noticias'].= "<a href='".$seo_url."'><h4>".$titulo."</h4></a>";
	$arr['noticias'].= $descripsuperior;
	$arr['noticias'].= "<div class='seguirL'>";
	$arr['noticias'].= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right'><a href='".$seo_url."'>Seguir Leyendo</a><img src='./resources/assets/image/comunicacion-corporativa/arrow-right.png' alt=''></div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";
	$arr['noticias'].= "</div>";


}

$arr['paginacion'] = $page + 1;


echo json_encode($arr);
?>