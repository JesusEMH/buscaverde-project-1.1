<?php
require_once '../includes/conexion.php';

if(isset($_SESSION['usuario']) && isset($_GET['id'])){
	$entrada_id = $_GET['id'];
	
	$sql = "DELETE FROM areasverdes WHERE id = $entrada_id";
	$borrar = mysqli_query($db, $sql);
}

header("Location: ../index.php");
