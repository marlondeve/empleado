<?php 
session_start();
require 'config/db.php';

$db = new Database();

$con = $db->conectar();


if(isset($_POST['eliminar'])){

	$id = $_POST['id'];
	
	$query = $con->prepare("DELETE FROM `empleado` WHERE `id` = '$id'");
	$query->execute();
	$_SESSION['exito'] = '¡Empleado Eliminado!';
	header('location: index.php');
}
		
if(isset($_POST['modificar'])){

	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$area = $_POST['area'];
	$descripcion = $_POST['descripcion'];
	
	if(isset($_POST['esexo'])){
		$sexo = $_POST['esexo'];
	}else{
		header('location: form.php');
	}

	if(isset($_POST['boletin'])){
		$boletin = $_POST['boletin'];
	}else{
		$boletin = "0";
	}
	
	$query = $con->prepare("UPDATE `empleado`
		SET
		`nombre` = '$nombre',
		`email` = '$correo',
		`sexo` = '$sexo',
		`area_id` = '$area',
		`boletin` = '$boletin',
		`descripcion` = '$descripcion'
		WHERE `id` = '$id';
		");
	$query->execute();
	$_SESSION['exito'] = '¡Empleado Modificado!';
	header('location: index.php');
}
	
	
if(isset($_POST['crear'])){
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$area = $_POST['area'];
	$descripcion = $_POST['descripcion'];
	$sexo = $_POST['sexo'];

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
	
	

	$_SESSION['exito'] = '¡Nuevo empleado registrado!';
	header('location: index.php');
}
?>