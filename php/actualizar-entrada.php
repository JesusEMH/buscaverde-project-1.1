<?php

if(isset($_POST)){
	
	require_once '../includes/conexion.php';
	
	$titulo = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

	$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;

	$calle = isset($_POST['calle']) ? mysqli_real_escape_string($db, $_POST['calle']) : false;

	$colonia = isset($_POST['colonia']) ? (int)$_POST['colonia'] : false;

	$codigopostal = isset($_POST['codigopostal']) ? (int)$_POST['codigopostal'] : false;

	$tipo = isset($_POST['tipo']) ? (int)$_POST['tipo'] : false;

	$arboles = isset($_POST['arboles']) ? mysqli_real_escape_string($db, $_POST['arboles']) : false;

	$contacto = isset($_POST['contacto']) ? mysqli_real_escape_string($db, trim($_POST['contacto'])) : false;

	$usuario = $_SESSION['usuario']['id'];

	// Validación
	$errores = array();

	if(empty($titulo)){
		$errores['titulo'] = 'El titulo no es válido';
	}
	
	if(empty($descripcion)){
		$errores['descripcion'] = 'La descripción no es válida';
	}

	if(empty($calle)){
		$errores['calle'] = 'La calle no es válida';
	}
	
	if(empty($colonia) && !is_numeric($colonia)){
		$errores['colonia'] = 'La colonia no es válida';
	}

	if(empty($codigopostal) && !is_numeric($codigopostal)){
		$errores['codigopostal'] = 'El codigo postal no es válida';
	}

	if(empty($tipo) && !is_numeric($tipo)){
		$errores['tipo'] = 'El tipo de zona no es válida';
	}

	if(empty($arboles)  && is_numeric($arboles)){
		$errores['arboles'] = 'El numero de arboles debe ser en texto';
	}

	if(empty($contacto) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errores['contacto'] = 'El correo de contacto no es válido';
	}

	
	if(count($errores) == 0){
		$entrada_id = $_GET['id'];
		
		$sql = "UPDATE areasverdes SET nombre='$titulo', descripcion='$descripcion', direccion_id=$colonia, codigopostal_id = $codigopostal, tipo_id = $tipo, calle = '$calle', ".  "arboles = '$arboles', contacto = '$contacto' ".
			"WHERE id = $entrada_id";

			
		$guardar = mysqli_query($db, $sql);

		header("Location: ../index.php");
	}else{

		$_SESSION["errores_entrada"] = $errores;
		
		if(isset($_GET['editar'])){
			header("Location: ../editar-entrada.php?id=".$_GET['editar']);
		}else{
			header("Location: ../crear-entradas.php");
		}
	}
	
}

