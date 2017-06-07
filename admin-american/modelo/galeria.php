<?php
class Galeria extends Conexion{
	function dameListado($id=NULL){
		$sql = "Select * ";
		$sql.= "From tgal_galeria ";
		$sql.= "Where gal_borrado = 1 ";
		$sql.= "and tar_art_id = ".$id." ";
		$sql.= "Order by gal_id DESC ";
		return $this->Sqlfetch_assoc($sql);	
	} 
	function agregar($data=NULL){
		$codigo 		= $this->limpiacadena($data['codigo']);
		$imagen 		= $this->limpiacadena($data['galeria']);

	
		$sql = "Insert into tgal_galeria ";
		$sql.= "(tar_art_id, gal_nombre,gal_imagen,gal_borrado ) ";
		$sql.= "Values ";
		$sql.= "('$codigo','$imagen','$imagen', 1 ) ";
		//return $sql;
		return $this->insert_id($sql);
	}
	function eliminar($arrjson){
		$id = $this->limpiacadena($arrjson['codigo']);
		$fecha = date("Y-m-d H:m:s");
		$sql = "UPDATE tgal_galeria ";
		$sql.= "SET gal_borrado = 0 ";
		$sql.= "WHERE gal_id = ".$id ;

		return $this->update_sql($sql);	
	}
	
}
?>