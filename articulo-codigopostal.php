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
		<h1 class="zona-titulo"><?=$entrada_actual['nombre']?></h1>
		<p class="zona-descripcion">DESCRIPCION: <?=$entrada_actual['descripcion']?> </hp>
		<p class="zona-direccion">DIRECCION: <?=$entrada_actual['calle']?>, colonia <?=$entrada_actual['colonia']?></p>
		<p class="zona-direccion">CODIGO POSTAL: <?=$entrada_actual['cpostal']?></p>
		<P class="zona-direccion">TIPO DE ZONA: <?=$entrada_actual['tipo']?></P>
		<P class="zona-direccion">ARBOLES: <?=$entrada_actual['arboles']?></P>
		<p class="zona-direccion">CREADO POR USUARIO: <?=$entrada_actual['usuario']?> (<?=$entrada_actual['contacto']?>)</p>
	</article>

<?php if(isset($_SESSION['usuario'])):?>
	<div class="div-titulo">Deseas actualizar los datos? <a id="agregar" class="boton" href="editar-entrada.php?id=<?=$entrada_actual['id']?>">ACTUALIZAR</a></div>
	</div>
	<div class="div-titulo">O borrar el area verde! <a id="agregar" class="boton" href="php/borrar-entrada.php?id=<?=$entrada_actual['id']?>">BORRAR</a></div>
	</div>
<?php else:?>
<?php endif;?>
</main>
<aside class="asidedos"></aside>


<?php require_once 'includes/footer.php'; ?>
