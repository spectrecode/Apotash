<?php
include('config/conexion.php');
include('modelo/funciones.php');
include('modelo/usuario.php');
include('modelo/evento.php');
include('modelo/url.php');

$objfunc 	= new misFunciones();
/***Procesar Imagenes****/
$arrjson['ruta'] = "../resources/assets/image/evento/";

$arrjson['file_gal'] = "";
if (isset($_FILES['file_gal']))
	if (!empty($_FILES['file_gal'])){
		$arrjson['file_gal'] = $objfunc->subirFoto('file_gal',$arrjson['ruta']);
		//$objfunc->eliminarFoto($arrjson['act_img_autor'],$arrjson['ruta']);
	}

?>