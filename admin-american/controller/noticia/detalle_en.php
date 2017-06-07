<?php
include('../../config/conexion.php');
include('../../modelo/funciones.php');
include('../../modelo/usuario.php');
include('../../modelo/noticia.php');

$arrjson = "";
$data = json_decode(file_get_contents('php://input'), true);

$arrjson[0]['titulo_en'] 	= "";
$arrjson[0]['url_seo_en'] = "";
$arrjson[0]['descrip_superior_en'] = "";
$arrjson[0]['descrip_inferior_en'] = "";
$arrjson[0]['frase_en'] 			 = "";
$arrjson[0]['file_portada_en'] 	 = ""; // limpiamos
$arrjson[0]['act_img_portada_en']  = "blanco.jpg";
$arrjson[0]['tip_multimedia_en'] 	 = "1";
$arrjson[0]['categoria_en'] 	 	 = "0";
$arrjson[0]['namecategoria_en'] 	 = "Category";
$arrjson[0]['name_tip_multimedia_en']  = "Image";
$arrjson[0]['act_mul_imagen_en'] 	 = "blanco.jpg";
$arrjson[0]['mul_video_en'] 		 = "";
$arrjson[0]['f_publicacion_en'] 	 = "";
$arrjson[0]['estado_en'] 	= false;
$arrjson[0]['destacado_en'] 	= false;
if (isset($data['codigo'])) {
	if (($data['codigo'] > 0)) {
		$codigo 	= $data['codigo'];
		$objnot 	= new Noticia();
		$objfunc 	= new misFunciones();
		$datanot 	= $objnot->dameDetalle_en($codigo);
		$item 		= count($datanot) - 1;
		for($i=0; $i<=$item; $i++){
			$data 	= $datanot[$i];
			$arrjson[$i]['codigo'] 	= $data['art_id'];
			$arrjson[$i]['titulo_en'] 	= $objfunc->convertir_html($data['art_nombre']);
			$arrjson[$i]['url_seo_en'] = $data['nameurl_seo'];
			$arrjson[$i]['descrip_superior_en'] = $objfunc->convertir_html($data['art_descripsuperior']);
			$arrjson[$i]['descrip_inferior_en'] = $objfunc->convertir_html($data['art_descripinferior']);
			$arrjson[$i]['frase_en'] 			 = $objfunc->convertir_html($data['art_frase']);
			//$arrjson[$i]['img_portada'] 	 = $data['art_imgportada'];
			$arrjson[$i]['act_img_portada_en']  = $data['art_imgportada'];
			if (empty($data['art_imgportada']))
				$arrjson[$i]['act_img_portada_en']  = "blanco.jpg";
			$arrjson[$i]['tip_multimedia_en'] 	 = $data['art_tipomultimedia'];
			$arrjson[$i]['categoria_en'] 	 	 = $data['tca_cat_id'];
			$arrjson[$i]['namecategoria_en'] 	 = $data['namecategoria'];
			$arrjson[$i]['act_mul_imagen_en'] 	 = $data['art_imggrande'];
			if (empty($data['art_imggrande']))
				$arrjson[$i]['act_mul_imagen_en']  = "blanco.jpg";
			$arrjson[$i]['mul_video_en'] 		 = $data['art_video'];
			$arrjson[$i]['f_publicacion_en'] 	 = $data['art_fechapublicacion'];
			if ($data['art_estado']== 1) 
				$arrjson[$i]['estado_en'] 	= true;
			else
				$arrjson[$i]['estado_en'] 	= false;
			if ($data['art_destacado']== 1) 
				$arrjson[$i]['destacado_en'] 	= true;
			else
				$arrjson[$i]['destacado_en'] 	= false;
			
		}
	}else{
		$arrjson[0]['codigo'] 	= -1;
	}
}else{
	$arrjson[0]['codigo'] 	= -1;
}
echo json_encode($arrjson);
?>