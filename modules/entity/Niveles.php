<?php 
/**
* Clase que controla los Niveles
*/
class Niveles 
{
	
	/**
	* Extrae los niveles
	* @return array
	**/
	public function getNiveles(){
		$pdo = ConnectDB::getInstance();
		$niveles = $pdo->prepare("SELECT * FROM niveles");
		$niveles->execute();
		return $niveles->fetchAll();
	}
}
 ?>