<?php 
/**
 * 
 */
 class Expertos
 {
 	public function edit($id,$nombre,$usuario,$email,$password){
 		$pdo=ConnectDB::getInstance();
 		$consulta = $pdo->prepare("UPDATE expertos SET nombre=:nombre,usuario=:usuario,email=:email,password=MD5(:password) WHERE id=:id");
 		$consulta->bindParam(":id",$id);
 		$consulta->bindParam(":nombre",$nombre);
 		$consulta->bindParam(":usuario",$usuario);
 		$consulta->bindParam(":email",$email);
 		$consulta->bindParam(":password",$password);
 		$consulta->execute();
 		return $consulta->fetchAll();
 	}
 	public function findById($id){
 		$pdo= ConnectDB::getInstance();
 		$experto = $pdo->prepare("SELECT * FROM expertos WHERE id=:id");
 		$experto->bindParam(":id",$id);
 		$experto->execute();
 		$experto = $experto->fetchAll();
 		return $experto[0];
 	}
 	public function insertar($nombre,$usuario,$email,$password){
 		$pdo = ConnectDB::getInstance();
 		$consulta = $pdo->prepare("INSERT INTO expertos(nombre,usuario,email,password) VALUES(:nombre,:usuario,:email,MD5(:password))");
 		$consulta->bindParam(":nombre",$nombre);
 		$consulta->bindParam(":usuario",$usuario);
 		$consulta->bindParam(":email",$email);
 		$consulta->bindParam(":password",$password);
 		$consulta->execute();
 		return $consulta->fetchAll();

 	}
 	public function getExpertos(){
 		$pdo = ConnectDB::getInstance();
 		$expertos = $pdo->prepare("SELECT * FROM expertos");
 		$expertos->execute();
 		return $expertos->fetchAll();
 	}
 	
 	public function login($usuario,$password){
 		$pdo = ConnectDB::getInstance();
 		$login = $pdo->prepare("SELECT * FROM expertos WHERE usuario=:usuario and password=MD5(:password)");
 		$login->bindParam(':password',$password);
 		$login->bindParam(':usuario',$usuario);
 		$login->execute();
 		$usuarios = $login->fetchAll();
 		if (count($usuarios)==0) {
 			throw new Exception("Error de Autentificación", 1);
 			
 		}else{
 			return $usuarios[0];
 		}
 	}
 } ?>