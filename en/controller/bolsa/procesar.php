<?php
date_default_timezone_set('America/Lima');//-->definimos la zona horaria

include('../../modelo/mail.php');

/*
	traer la informacion desde JSON
*/
$arrjson 			= "";

$arrjson['nombre'] 		= $_POST['name2'];
$arrjson['adress'] 		= $_POST['adress2'];
$arrjson['mail'] 		= $_POST['mail2'];
$arrjson['telf'] 		= $_POST['telf2'];
$arrjson['dni'] 		= $_POST['dni'];
$arrjson['comment'] 		= $_POST['comment2'];
if (!empty($_FILES['file']['name'])){
	$destino 	= '../../resources/assets/cv/';
	$hora 		= date("s");
	$name 		= $hora.$_FILES['file']['name'];
	move_uploaded_file ($_FILES['file']['tmp_name'], $destino.$name);  
	$arrjson['namecv'] = $name;
}
/*
	guardamos primero al propietario
*/
$emailcliente = 'informes@americas-potash.com, mbustamante@camposycaravedo.com,ce@mediaimpact.pe,cc@mediaimpact.pe';
// $emailcliente = 'cc@mediaimpact.pe';
$url = "http://americas-potash.com/demoV5/en/resources/assets/cv/";
$mailto = new Mailto();
$mailto->CuerpoBolsa($arrjson,$url);
$mailto->EnviarMail($emailcliente);
$arrjson['m_envio'] = $mailto->DameMensajeEnvio();
$arrjson['b_envio'] = $mailto->DameBoolEnvio();
/*
	fin de procesar data
*/
echo json_encode($arrjson);
?>