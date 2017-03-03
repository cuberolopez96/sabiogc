<?php 
/**
* 
*/
class ExpertosCategorias
{
	public function findByUser($idUsuario){
		$pdo = ConnectDB::getInstance();
		$categorias = $pdo->prepare("SELECT * FROM expcategorias WHERE idExperto=:idExperto");
		$categorias->bindParam(":idExperto",$idUsuario);
		$categorias->execute();
		return $categorias->fetchAll();
	}
	public function cleanByUser($idUsuario){
		$pdo = ConnectDB::getInstance();
		$consulta = $pdo->prepare("DELETE FROM expcategorias WHERE idExperto = :idExperto");
		$consulta->bindParam(":idExperto",$idUsuario);
		$consulta->execute();
		return $consulta->fetchAll();
	}
	public function insertar($categoria,$idUsuario){
		$pdo = ConnectDB::getInstance();
		$consulta = $pdo->prepare("INSERT INTO expcategorias(categoria,idExperto) VALUES(:categoria,:idExperto)");
		$consulta->bindParam(":categoria",$categoria);
		$consulta->bindParam(":idExperto",$idUsuario);
		$consulta->execute();
		return $consulta->fetchAll();
	}
}
 ?>