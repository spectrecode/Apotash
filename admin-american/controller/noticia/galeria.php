<?php
include('../../config/conexion.php');
include('../../modelo/funciones.php');
include('../../modelo/usuario.php');
include('../../modelo/galeria.php');

$arrjson = false;
$data = json_decode(file_get_contents('php://input'), true);
$arrjson['codigo'] = $data['codigo']; 

// Imprimimos
$objnot 	= new Galeria();
$datanot 	= $objnot->dameListado($arrjson['codigo']);

$arrjson['listgal'] = "";

$item = count($datanot) - 1;

for($i=0;$i<=$item;$i++){
	$data = $datanot[$i];
	$arrjson['listgal'][$i]['count'] = ($i+1); 
	$arrjson['listgal'][$i]['id'] = $data['gal_id']; 
	$arrjson['listgal'][$i]['imagen'] = $data['gal_imagen']; 
} 


echo json_encode($arrjson);
?>