<?php 
/**
 * 
 */
 class Expertos
 {
 	
 	public function login($usuario,$password){
 		$pdo = ConnectDB::getInstance();
 		$login = $pdo->prepare("SELECT * FROM expertos WHERE usuario=:usuario and password=:password");
 		$login->bindParam(':password',md5($password));
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