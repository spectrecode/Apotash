<?php
class Mailto{
	private $mail	    	= null;
	private $Host	    	= 'mediaimpact.pe';  // Specify main and backup SMTP servers;
	private $Username	    = 'ce@mediaimpact.pe';                 // SMTP username;
	private $Password	    = 'kalin123';                      // SMTP password
	private $Port	    	= 26;                                    // TCP port to connect to
	private $From	    	= 'ce@mediaimpact.pe';
	private $nameFrom	    = 'Americas Potash';
	private $Subject	    = '';
	private $Body 			= '';
	private $AltBody		= 'Tienes un mensaje del Formulario';
	private $mensajeenvio	= '';
	private $boolenvio		= false;
	function __construct(){
		## Instanceamos el envio de correo
	}
	function EnviarMail($email=NULL){
		$para = $email;

		$titulo = $this->Subject;

		$mensaje = $this->Body;

		$cabeceras = 'MIME-Version: 1.0' . "\r\n";

		$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

		$cabeceras .= 'From: '.$this->nameFrom.'<'.$this->From.'>';

		$enviado = mail($para, $titulo, $this->Body, $cabeceras);
 
		if ($enviado){
			$this->mensajeenvio.= "Su mensaje se ha enviado satisfactoriamente";
			$this->boolenvio = true;
		 	return $this->boolenvio;
		}
		else{
			$this->mensajeenvio.= 'No se pudo enviar, intentelo mas tarde.';
		  	$this->boolenvio = false;
		 	return $this->boolenvio;
		}
	}
	
	function CuerpoContacto($arr=NULL){
		$this->Subject = 'Formulario de Americas Potash';
		$this->Body = '<table>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Nombre: </strong>';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arr['nombre'];
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Direccion:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arr['adress'];
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Email:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arr['mail'];
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Teléfono:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arr['telf'];
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Comentario:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arr['comment'];
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '</table>';
		$this->AltBody = 'Tienes un nuevo mensaje del Formulario';
	}
	function CuerpoBolsa($arr=NULL,$url=NULL){
		$this->Subject = 'Formulario de Americas Potash';
		$this->Body = '<table>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Nombre: </strong>';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arr['nombre'];
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>DNI: </strong>';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arr['dni'];
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Direccion:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arr['adress'];
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Email:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arr['mail'];
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Teléfono:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arr['telf'];
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>Comentario:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= $arr['comment'];
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		$this->Body.= '<tr>';
		$this->Body.= '<td>';
		$this->Body.= '<strong>CV:</strong> ';
		$this->Body.= '</td>';
		$this->Body.= '<td>';
		$this->Body.= '<a href="'.$url.$arr['namecv'].'">Ver CV<a/>';
		$this->Body.= '</td>';
		$this->Body.= '</tr>';

		

		$this->Body.= '</table>';
		$this->AltBody = 'Tienes un nuevo mensaje del Formulario';
	}
	function DameMensajeEnvio(){
		return $this->mensajeenvio;
	}
	function DameBoolEnvio(){
		return $this->boolenvio;
	}
}
?>