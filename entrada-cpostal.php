<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/buscar.php'; ?>


<aside class="asideuno"></aside>
<?php
	$entrada_actual = conseguirEntradaCpostal($db, $_GET['id']);

	if(!isset($entrada_actual['id'])){
		header("Location: index.php");
	}
	?>
<main class="main" >

	<article class="articulo-zona">
	<h1 class="zona-titulo">NOMBRE: <?=$entrada_actual['nombre']?></h1>
	<p class="zona-descripcion">DESCRIPCION: <?=$entrada_actual['descripcion']?> </hp>
	<p class="zona-direccion">DIRECCION: <?=$entrada_actual['calle']?> </p>
	<p class="zona-direccion2">COLONIA: <?=$entrada_actual['colonia']?></p>
	<p class="zona-direccion">CODIGO POSTAL: <?=$entrada_actual['cpostal']?></p>
	<P class="zona-direccion2">ARBOLES: <?=$entrada_actual['arboles']?></P>
	<P class="zona-tipo">TIPO DE ZONA: <?=$entrada_actual['tipo']?></P>
	<p class="zona-usuario">CREADO POR USUARIO: <?=$entrada_actual['usuario']?></p>
	<P class="zona-usuario">CONTACTO: <?=$entrada_actual['contacto']?></P>
	</article>

	<div class="div-titulo">Deseas actualizar los datos? <a id="agregar" class="boton" href="crear-colonia.php">ACTUALIZAR</a></div>
	</div>
	<div class="div-titulo">O borrar el area verde! <a id="agregar" class="boton" href="crear-colonia.php">BORRAR</a></div>
	</div>
</main>
<aside class="asidedos"></aside>


<?php require_once 'includes/footer.php'; ?>
