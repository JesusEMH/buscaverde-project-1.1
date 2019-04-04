<?php 

function mostrarError($errores, $campo){
	$alerta = '';
	if(isset($errores[$campo]) && !empty($campo)){
		$alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
	}
	return $alerta;
}

function borrarErrores(){
	$borrado = false;

	if(isset($_SESSION['errores'])){

		$_SESSION['errores'] = null;
		$borrado = session_unset($_SESSION['errores']);

	}

	if(isset($_SESSISON['completado'])){
		$_SESSION['completado'] = null;
		session_unset($_SESSION['completado']);
	}
	
	return $borrado;
}

function conseguirColonias($conexion){
	$sql = "SELECT * FROM direccion ORDER BY id ASC;";
	$colonia = mysqli_query($conexion, $sql);

	$result = array();
	if($colonia && mysqli_num_rows($colonia) >= 1){
		$result = $colonia;
	}
	return $result;
}

function conseguirCpostal($conexion){
	$sql = "SELECT * FROM codigopostal ORDER BY id ASC;";
	$cpostal = mysqli_query($conexion, $sql);

	$result = array();
	if($cpostal && mysqli_num_rows($cpostal) >= 1){
		$result = $cpostal;
	}
	return $result;
}

function conseguirTipo($conexion){
	$sql = "SELECT * FROM tipo ORDER BY id ASC;";
	$tipo = mysqli_query($conexion, $sql);

	$result = array();
	if($tipo && mysqli_num_rows($tipo) >= 1){
		$result = $tipo;
	}
	return $result;
}

function conseguirUltimasEntradas($conexion, $limit = null){
	$sql = "SELECT a.*, t.tipo AS 'tipo' FROM areasverdes a ".
			"INNER JOIN tipo t ON a.tipo_id = t.id ".
			"ORDER BY t.id DESC ";

	if ($limit) {
		$sql .= "LIMIT 5";
	}

	$entradas = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entradas && mysqli_num_rows($entradas) >= 1){
		$resultado = $entradas;
	}		
	return $entradas;
}


function conseguirColonia($conexion, $id){
	$sql = "SELECT * FROM direccion WHERE id = $id;";
	$colonia = mysqli_query($conexion, $sql);

	$result = array();
	if($colonia && mysqli_num_rows($colonia) >= 1){
		$result = mysqli_fetch_assoc($colonia);
	}
	return $result;
}


function conseguirEntradasCpostal($conexion, $cpostalid){
	$sql = "SELECT a.*, a.id AS 'ide', t.tipo AS 'tipo' FROM areasverdes a ".
			"INNER JOIN tipo t ON a.tipo_id = t.id ".
			"WHERE a.codigopostal_id = $cpostalid ".
			"ORDER BY t.id DESC ";

	$entradascp = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entradascp && mysqli_num_rows($entradascp) >= 1){
		$resultado = $entradascp;
	}		
	return $entradascp;
}
function conseguirEntradasColonia($conexion, $col){
	$sql = "SELECT a.*, t.tipo AS 'tipo' FROM areasverdes a ".
			"INNER JOIN tipo t ON a.tipo_id = t.id ".
			"WHERE a.direccion_id = $col ".
			"ORDER BY t.id DESC ";

	$entradascol = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entradascol && mysqli_num_rows($entradascol) >= 1){
		$resultado = $entradascol;
	}		
	return $entradascol;
}

function conseguirEntradasTipo($conexion, $tip){
	$sql = "SELECT a.*, t.tipo AS 'tipo' FROM areasverdes a ".
			"INNER JOIN tipo t ON a.tipo_id = t.id ".
			"WHERE a.tipo_id = $tip ".
			"ORDER BY t.id DESC ";

	$entradastip = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entradastip && mysqli_num_rows($entradastip) >= 1){
		$resultado = $entradastip;
	}		
	return $entradastip;
}


function conseguirEntrada($conexion, $id){
	$sql = "SELECT e.*, c.colonia AS 'colonia',t.tipo AS 'tipo', p.codigopostal AS 'cpostal', ".
		   "CONCAT(u.nombre, ' ', u.apellido) AS usuario ".
		   "FROM areasverdes e ".
		   "INNER JOIN direccion c ON e.direccion_id = c.id ".
		   "INNER JOIN tipo t ON e.tipo_id = t.id ".
		   "INNER JOIN codigopostal p ON e.codigopostal_id = p.id ".
		   "INNER JOIN usuarios u ON e.usuarios_id = u.id ".
		   "WHERE e.id = $id";
	$entrada = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entrada && mysqli_num_rows($entrada) >= 1){
		$resultado = mysqli_fetch_assoc($entrada);
	}
	
	return $resultado;
}

function conseguirEntradaTipo($conexion, $nombre){
	$sql = "SELECT e.*, c.colonia AS 'colonia',t.tipo AS 'tipo', p.codigopostal AS 'cpostal', ".
		   "CONCAT(u.nombre, ' ', u.apellido) AS usuario ".
		   "FROM areasverdes e ".
		   "INNER JOIN direccion c ON e.direccion_id = c.id ".
		   "INNER JOIN tipo t ON e.tipo_id = t.id ".
		   "INNER JOIN codigopostal p ON e.codigopostal_id = p.id ".
		   "INNER JOIN usuarios u ON e.usuarios_id = u.id ".
		   "WHERE e.nombre = '$nombre'";
	$entrada = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entrada && mysqli_num_rows($entrada) >= 1){
		$resultado = mysqli_fetch_assoc($entrada);
	}
	
	return $resultado;
}

function conseguirEntradaCpostal($conexion, $cpostal){
	$sql = "SELECT e.*, c.colonia AS 'colonia',t.tipo AS 'tipo', p.codigopostal AS 'cpostal', ".
		   "CONCAT(u.nombre, ' ', u.apellido) AS usuario ".
		   "FROM areasverdes e ".
		   "INNER JOIN direccion c ON e.direccion_id = c.id ".
		   "INNER JOIN tipo t ON e.tipo_id = t.id ".
		   "INNER JOIN codigopostal p ON e.codigopostal_id = p.id ".
		   "INNER JOIN usuarios u ON e.usuarios_id = u.id ".
		   "WHERE e.nombre = '$cpostal'";
	$entrada = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entrada && mysqli_num_rows($entrada) >= 1){
		$resultado = mysqli_fetch_assoc($entrada);
	}
	
	return $resultado;
}

function conseguirEntradaColonia($conexion, $colonia){
	$sql = "SELECT e.*, c.colonia AS 'colonia',t.tipo AS 'tipo', p.codigopostal AS 'cpostal', ".
		   "CONCAT(u.nombre, ' ', u.apellido) AS usuario ".
		   "FROM areasverdes e ".
		   "INNER JOIN direccion c ON e.direccion_id = c.id ".
		   "INNER JOIN tipo t ON e.tipo_id = t.id ".
		   "INNER JOIN codigopostal p ON e.codigopostal_id = p.id ".
		   "INNER JOIN usuarios u ON e.usuarios_id = u.id ".
		   "WHERE e.nombre = '$colonia'";
	$entrada = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entrada && mysqli_num_rows($entrada) >= 1){
		$resultado = mysqli_fetch_assoc($entrada);
	}
	
	return $resultado;
}


function conseguirBusqueda($conexion,$busqueda){
	if(!empty($busqueda)){
	$sql = "SELECT a.*, t.tipo AS 'tipo' FROM areasverdes a ".
			"INNER JOIN tipo t ON a.tipo_id = t.id ".
			"WHERE a.nombre LIKE '%$busqueda%' ";
	
	}else{
		echo "no hay resultados con ese nombre.";
	}
	
	
	$entradas = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entradas && mysqli_num_rows($entradas) >= 1){
		$resultado = $entradas;
	}
	
	return $entradas;
}






 ?>
