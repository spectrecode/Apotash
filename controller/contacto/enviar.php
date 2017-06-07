<?php
date_default_timezone_set('America/Lima');//-->definimos la zona horaria

include('../../modelo/mail.php');

/*
	traer la informacion desde JSON
*/
$arrjson 			= "";

$arrjson['nombre'] 		= $_POST['nombre'];
$arrjson['adress'] 		= $_POST['adress'];
$arrjson['mail'] 		= $_POST['mail'];
$arrjson['telf'] 		= $_POST['telf'];
$arrjson['comment'] 		= $_POST['comment'];
/*
	guardamos primero al propietario
*/
$emailcliente = 'informes@americas-potash.com, mbustamante@camposycaravedo.com,ce@mediaimpact.pe,cc@mediaimpact.pe';
$mailto = new Mailto();
$mailto->CuerpoContacto($arrjson);
$mailto->EnviarMail($emailcliente);
$arrjson['m_envio'] = $mailto->DameMensajeEnvio();
$arrjson['b_envio'] = $mailto->DameBoolEnvio();
/*
	fin de procesar data
*/
echo json_encode($arrjson);
?>