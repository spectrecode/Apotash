<?php
class Noticia extends Conexion{
	function dameListado($page=NULL,$filtro=NULL,$inicio=NULL,$TAMANO_PAGINA=NULL){
		$page = $this->limpiacadena($page);
		$filtro = $this->limpiacadena($filtro);

		$sql = "Select * ";
		$sql.= "From tno_noticias ";
		//$sql.= "Where art_borrado = 1 ";
		//$sql.= "and tca_cat_id != 8 ";
		//echo ">><".$filtro;
		if (!empty($filtro)){
			$sql.= "Where not_titulo like('%".$filtro."%') ";
			$sql.= "or not_descripcion like('%".$filtro."%') ";
			$sql.= "or not_descripcion like('%".$filtro."%') ";
		}
		//$sql.= "Order by art_estado DESC, art_destacado DESC, art_order ASC, art_fechacreacion DESC ";
		if ($TAMANO_PAGINA > 0)
			$sql.= "LIMIT ".$inicio."," . $TAMANO_PAGINA;
		return $this->Sqlfetch_assoc($sql);	
	}
	function dameDetalle($codigo=NULL){
		$page = $this->limpiacadena($codigo);

		$sql = "Select art_id, tca_cat_id, art_nombre, art_descripsuperior, art_descripinferior,art_frase, ";
		$sql.= "(Select tmp_cat.cat_nombre From tca_categoria as tmp_cat Where tmp_cat.cat_id = tca_cat_id Limit 0,1) as namecategoria, ";
		$sql.= "art_imgportada, art_tipomultimedia, art_imggrande, art_video, art_fechapublicacion, ";
		$sql.= " (Select tmp_seo.seo_url From tseo_seo as tmp_seo Where tmp_seo.tar_art_id = art_id Limit 0,1) as nameurl_seo, ";
		$sql.= "art_estado,art_destacado,art_fechacreacion,art_fechamodificacion,art_order ";
		$sql.= "From tar_articulo ";
		$sql.= "Where art_id = ".$codigo;
		return $this->Sqlfetch_assoc($sql);	
	}
}
?>