<?php 

/**
* Clase encargada de las categorias
* @Author Juan Antonio Cubero lopez
*/
class Categorias
{
	/**
	*Devuelve todas las categorias
	*@return array
	**/
	public function getCategorias(){
		$pdo = ConnectDB::getInstance();
		$categorias=$pdo->prepare("SELECT * FROM Categorias");
		$categorias->execute();
		return $categorias->fetchAll();
	}

	
}

 ?>