<?php 

require 'config/db.php';

$db = new Database();

$con = $db->conectar();


	
if(isset($_POST['modificar'])){

	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$area = $_POST['area'];
	$descripcion = $_POST['descripcion'];
	
	if(isset($_POST['sexo'])){
		$sexo = $_POST['sexo'];
	}else{
		header('location: form.php');
	}

	if(isset($_POST['boletin'])){
		$boletin = $_POST['boletin'];
	}else{
		$boletin = "0";
	}
	

	header('location: form.php');
}
	
if(isset($_POST['crear'])){
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$area = $_POST['area'];
	$descripcion = $_POST['descripcion'];
	
	if(isset($_POST['sexo'])){
		$sexo = $_POST['sexo'];
	}else{
		header('location: form.php');
	}

	if(isset($_POST['boletin'])){
		$boletin = $_POST['boletin'];
	}else{
		$boletin = "0";
	}

	
	$query = $con->prepare("INSERT INTO `empleado` (`id`, `nombre`, `email`, `sexo`, `area_id`, `boletin`, `descripcion`) VALUES (null, '$nombre', '$correo', '$sexo', '$area',  'boletin', '$descripcion')");
	$query->execute();
	if(isset($_POST['r1'])){
		$rol = $con->prepare("INSERT INTO `empleado_rol` (`empleado_id`, `rol_id`) VALUES (LAST_INSERT_ID(), '1'); ");
			$rol->execute();
	}
	if(isset($_POST['r2'])){
		$rol = $con->prepare("INSERT INTO `empleado_rol` (`empleado_id`, `rol_id`) VALUES (LAST_INSERT_ID(), '2'); ");
			$rol->execute();
	}
	
	if(isset($_POST['r3'])){
		$rol = $con->prepare("INSERT INTO `empleado_rol` (`empleado_id`, `rol_id`) VALUES (LAST_INSERT_ID(), '3'); ");
			$rol->execute();
	}
	
	if(isset($_POST['r4'])){
		$rol = $con->prepare("INSERT INTO `empleado_rol` (`empleado_id`, `rol_id`) VALUES (LAST_INSERT_ID(), '4'); ");
			$rol->execute();
	}
	
	if(isset($_POST['r5'])){
		$rol = $con->prepare("INSERT INTO `empleado_rol` (`empleado_id`, `rol_id`) VALUES (LAST_INSERT_ID(), '5'); ");
			$rol->execute();
	}
	
	if(isset($_POST['r6'])){
		$rol = $con->prepare("INSERT INTO `empleado_rol` (`empleado_id`, `rol_id`) VALUES (LAST_INSERT_ID(), '6'); ");
			$rol->execute();
	}
	
	if(isset($_POST['r7'])){
		$rol = $con->prepare("INSERT INTO `empleado_rol` (`empleado_id`, `rol_id`) VALUES (LAST_INSERT_ID(), '7'); ");
			$rol->execute();
	}
	
	if(isset($_POST['r8'])){
		$rol = $con->prepare("INSERT INTO `empleado_rol` (`empleado_id`, `rol_id`) VALUES (LAST_INSERT_ID(), '8'); ");
			$rol->execute();
	}
	
	


	header('location: form.php');
}
?>