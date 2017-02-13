<?php 
/**
 * Clase Conexion de la Base de Datos
 * @Authoe Juan Antonio Cubero
 */
 class ConnectDB 
 {
 	private static $instancia;
 	private $pdo;
 	function __construct()
 	{
 		$this->pdo = new PDO(DRIVER.':host='.HOST.';dbname='.DBNAME.';charset=UTF8',USERNAME,PASSWORD);
 	}
 	public function getInstance(){
 		if(!isset($instancia))
 			self::$instancia = new ConnectDB();
 		return self::$instancia;
 	}
 	public function prepare($consulta){
 		return $this->pdo->prepare($consulta);
 	}
 	public function exec($consulta){
 		return $this->pdo->exec($consulta);
 	}
 	

 } ?>