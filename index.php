<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/buscar.php'; ?>



<!-- MOSTRAR ERRORES 
		<?php if(isset($_SESSION['completado'])) :?>
			<div class="alerta alerta-exito">
				<?= $_SESSION['completado'] ?>
			</div>
		<?php elseif(isset($_SESSION['errores']['general'])): ?>
			<div class="alerta alerta-error"><a name="registro">
				<?=$_SESSION['errores']['general'] ?>
			</a></div>
		<?php endif; ?>
		<?php borrarErrores(); ?>-->

<aside class="asideuno"></aside>

<main class="main" >
	<h1 class="maintitulo">SISTEMA DE CONTROL DE INVENTARIO DE AREAS VERDES!</h1>

	<div class="portada">
	<img class="mapa" src="assets/img/mapa.png">
	</div>
	<h2 class="titulo">ENTRADAS MAS RECIENTES</h2>

	<?php 
	$entradas = conseguirUltimasEntradas($db, true);
	if(!empty($entradas)):
		while($entrada = mysqli_fetch_assoc($entradas)):
	?>
	<article>
		<a class="articulo" href="articulo.php?id=<?=$entrada['id']?>">
			<h2 class="articulo-titulo radius"><?= $entrada['nombre']?></h2>
			<p class="articulo-parrafo radius"><?=substr($entrada['descripcion'], 0, 100).' ...'?></p>
			<p class="articulo-tipo radius"><?=$entrada['tipo']?></p>
			<p class="articulo-fecha radius"><?=$entrada['fecha']?></p>
		</a>
	</article>
	<?php
			endwhile;
		endif; 
	?>
	<div class="vertodo">
		<a class="boton" href="vertodo.php">TODAS LAS ENTRADAS</a>
	</div>
</main>
<aside class="asidedos"></aside>


<?php require_once 'includes/footer.php'; ?>
