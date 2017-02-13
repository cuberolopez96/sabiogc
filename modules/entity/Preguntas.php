<?php 

/**
* Clase de las Preguntas
* @Author Juan Antonio Cubero
*/
class Preguntas
{
	
	/**
	* Devuelve  todas las preguntas
	* @return array
	**/
	public function getPreguntas(){
		$pdo = ConnectDB::getInstance();
		$preguntas = $pdo->prepare("SELECT * FROM Preguntas");
		$preguntas->execute();
		return $preguntas->fetchAll();
	}
	/**
	*Devuelve la pregunta que coincide con el id pasado por parametro
	*@param int id
	*@return array
	**/
	public function findById($id){
		$pdo=ConnectDB::getInstance();
		
		$preguntas=$pdo->prepare("SELECT * FROM Preguntas WHERE id=:id");
		$preguntas->bindParam(':id',$id);
		$preguntas->execute();
		return $preguntas->fetchAll();
	}
	/**
	* inserta preguntas en la base de datos 
	* @param string pregunta,categoria,tipoobjeto,objeto
	* @param $int idexperto
	* @return array
	**/
	public function insertPreguntas($pregunta,$objeto,$tipoobjeto,$categoria,$nivel,$idexperto){
		$pdo = ConnectDB::getInstance();
		$consulta= $pdo->prepare("INSERT INTO preguntas(pregunta,Objeto,tipoObjeto,categoria,nivel,idExperto) VALUES(:pregunta,:objeto,:tipoobjeto,:categoria,:nivel,:idexperto)");
		$consulta->bindParam(':pregunta',$pregunta);
		$consulta->bindParam(':objeto',$objeto);
		$consulta->bindParam(':tipoobjeto',$tipoobjeto);
		$consulta->bindParam(':categoria',$categoria);
		$consulta->bindParam(':nivel',$nivel);
		$consulta->bindParam(':idexperto',$idexperto);
		$consulta->execute();
		return $consulta->fetchAll();

	}
	/**
	*Devuelve el ultimo id de la tabla
	*@return int id
	**/
	public function getLastId(){
		$pdo = ConnectDB::getInstance();
		$id=$pdo->prepare("SELECT MAX(id) FROM preguntas");
		$id->execute();
		$id = $id->fetchAll();
		$id = $id[0];
		return $id[0];
	}
	public function editPregunta($id,$pregunta,$objeto,$tipoobjeto,$categoria,$nivel){
		$pdo = ConnectDB::getInstance();
		$consulta = $pdo->prepare("UPDATE preguntas SET pregunta=:pregunta,Objeto=:objeto,tipoObjeto=:tipoobjeto,categoria=:categoria,nivel=:nivel WHERE id=:id");
		$consulta->bindParam(':id',$id);
		$consulta->bindParam(':pregunta',$pregunta);
		$consulta->bindParam(':objeto',$objeto);
		$consulta->bindParam(':tipoobjeto',$tipoobjeto);
		$consulta->bindParam(':categoria',$categoria);
		$consulta->bindParam(':nivel',$nivel);
		$consulta->execute();
		return $consulta->fetchAll();

	}
}

 ?>