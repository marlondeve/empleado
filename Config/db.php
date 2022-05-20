<?php  

class Database
{
	
	private $hostname = "localhost";
	private $database = "prueba_tecnica_dev";
	private $user = "root";
	private $password = "";
	private $charset = "utf8";

	function conectar(){

		try{

			$conexion = "mysql:host=".$this->hostname.";dbname=".$this->database.";charset=".$this->charset;
			$options = [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_EMULATE_PREPARES => false,
			];

			$con = new PDO($conexion, $this->user, $this->password, $options);

			return $con;

		} catch(PDOException $e){
			echo 'Error de conexion: '.$e->getMessage();
			exit;
		}

	}
	
}
	


?>
