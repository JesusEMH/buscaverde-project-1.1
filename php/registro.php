<?php

if(isset($_POST)){

	require_once '../includes/conexion.php'; 

	if(!isset($_SESSION)){
		session_start();
	}


	// Recorger los valores del formulario de registro
	$nombre = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
	$apellidos = isset($_POST['lastname']) ? mysqli_real_escape_string($db, $_POST['lastname']) : false;

	$email = isset($_POST['correo']) ? mysqli_real_escape_string($db, trim($_POST['correo'])) : false;
	$password = isset($_POST['passw']) ? mysqli_real_escape_string($db, $_POST['passw']) : false;
	//arrays de errores
	$errores = array();

	//validar los datos antes de guardarlos en la base de datos
	if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
		$nombre_validado = true;
	}else{
		$nombre_validado = false;
		$errores['name'] = "El nombre no es valido";
	}

	if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
		$apellido_validado = true;
	}else{
		$apellido_validado = false;
		$errores['lastname'] = "Los apellidos no son validos";
	}

	if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$email_validado = true;
	}else{
		$email_validado = false;
		$errores['correo'] = "El correo electronico no es valido";
	}

	if(!empty($password)){
		$password_validado = true;
	}else{
		$password_validado = false;
		$errores['passw'] = "La contrasena esta vacia";
	}

	$guardar_usuario = false;

	if(count($errores) == 0){
		$guardar_usuario = true;

		//CIFRAR LA CONTRASENA
		$password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

		//INSERTAR USUARIO EN LA TABLA USUARIOS DE LA BDD
		$sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
		$guardar = mysqli_query($db, $sql);

		if($guardar){
			$_SESSION['completado'] = "El registro se ha completado con exito";
		}else{
			$_SESSION['errores']['general'] = "fallo al guardar el usuario!!";
		}

	}else{
		$_SESSION['errores'] = $errores;
		
	}
}

header('location: ../formulario.php');
?>