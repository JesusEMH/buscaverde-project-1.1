
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/buscar.php'; ?>


<aside class="asideuno"></aside>

<main class="main" >
	<h2 class="titulo">TODAS LAS ENTRADAS</h2>

	<?php 
	$entradas = conseguirUltimasEntradas($db, false);
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
