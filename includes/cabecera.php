<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Busca zonas verdes de inmediato..</title>
	<link rel="stylesheet" type="text/css" href="assets/css/boceto.css">
	<script type="text/javascript" src="js/jquery/jquery-3.3.1.min.js"></script>
</head>
<body class="body">

	<?php if(isset($_SESSION['usuario'])) : ?>
<header class="header center">
	<div  class="div-logo"><img class="logo" src="assets/logo/logo.png">
	<ul class="menuoculto">
		<li><a href="index.php">inicio</a></li>
		<li><a href="info.php">info</a></li>
		<li id="sub-explorar"><a href="#">explorar</a>
			<ul class="submenu-oculto">
					<li class="submenu-uno"><a href="colonias.php"> por colonia</a></li>
					<li><a href="codigopostal.php"> por codigo postal</a></li>
					<li><a href="tipos.php"> por tipo de lugar</a></li>
					<li><a href="vertodo.php"> ver todo</a></li>
				</ul>
		</li>
	</ul></div>
	<nav>
	<form  method="POST" action="busqueda.php">
		<input id="buscarinput" class="input-buscar" type="text" name="buscar" placeholder="busca algo..">
		<input id="buscarboton" class="boton-buscar boton" type="submit" name="buscado" value="BUSCAR!">
	</form>
	</nav>
	<div class="headersesion margen">
		<a class="boton-buscar boton" id="boton-buscar" href="">NOTAS</a>
		<div class="accion boton"></div>
		 <div class="mi-cuenta">MI CUENTA!
			<div id="infouser" class="infouser">
				<center><img class="userimg" src="assets/img/userlogo.png"></center>
				<p class="center login-text"> <?= $_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellido']?></p>
				<p class="center login-text espacio">TU CORREO</p>
				<p class="center login-text"><?=$_SESSION['usuario']['email'] ?></p>
				<center><a class="boton login-text center" href="crear-entradas.php" >Agregar entrada</a></center>
				<center><a class="boton login-text center" href="misdatos.php">Mi informacion</a></center>
				<center><a class="boton login-text center" href="php/cerrar.php">cerrar sesion</a></center>
			</div>
		</div>
	</div>
</header>
	<?php else: ?>	
<header class="header center">
	<div  class="div-logo"><img class="logo" src="assets/logo/logo.png">
	<ul class="menuoculto">
		<li><a href="index.php">inicio</a></li>
		<li><a href="info.php">info</a></li>
		<li id="sub-explorar"><a href="#">explorar</a>
			<ul class="submenu-oculto">
					<li class="submenu-uno"><a href="colonias.php"> por colonia</a></li>
					<li><a href="codigopostal.php"> por codigo postal</a></li>
					<li><a href="tipos.php"> por tipo de lugar</a></li>
					<li><a href="vertodo.php"> ver todo</a></li>
				</ul>
		</li>
	</ul></div>
	<nav>
	<form  method="POST" action="busqueda.php">
		<input id="buscarinput" class="input-buscar" type="text" name="buscar" placeholder="busca algo..">
		<input id="buscarboton" class="boton-buscar boton" type="submit" name="buscado" value="BUSCAR!">
	</form>
	</nav>
	<div class="headersesion">
		<a class="boton-buscar boton" id="boton-buscar" href="">NOTAS</a><a class="boton" href="iniciarsesion.php">INICIA SESION</a>
	</div>
</header>
	<?php endif;?>
