<?php 
/**
* 
*/
class Respuestas
{
	
	/**
	*Inserta Respuestas
	**/
	public function InsertRespuestas($respuesta,$idPregunta,$valida){
		$pdo = ConnectDB::getInstance();
		$consulta=$pdo->prepare("INSERT INTO respuestas(respuesta,idPregunta,valida) VALUES(:respuesta,:idPregunta,:valida)");
		$consulta->bindParam(':respuesta',$respuesta);
		$consulta->bindParam(':idPregunta',$idPregunta);
		$consulta->bindParam(':valida',$valida);
		$consulta->execute();
		return $consulta->fetchAll();
	}
	public function findByPregunta($idPregunta){
		$pdo = ConnectDB::getInstance();
		$respuestas= $pdo->prepare("SELECT * FROM respuestas WHERE idPregunta=:idPregunta");
		$respuestas->bindParam(':idPregunta',$idPregunta);
		$respuestas->execute();
		return $respuestas->fetchAll();
	}
	public function editRespuesta($id,$respuesta){
		$pdo = ConnectDB::getInstance();
		$consulta=$pdo->prepare("UPDATE respuestas SET respuesta=:respuesta WHERE id=:id");
		$consulta->bindParam(':respuesta',$respuesta);
		$consulta->bindParam(':id',$id);
		$consulta->execute();
		return $consulta->fetchAll();

	}
}
 ?>