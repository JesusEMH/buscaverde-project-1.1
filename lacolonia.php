
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/buscar.php'; ?>
<aside class="asideuno"></aside>

<main class="main" >
	<h2 class="titulo">ZONAS VERDES POR LA COLONIA "<?=$_GET['colonia']?>"</h2>


<?php 
	$entradascol = conseguirEntradasColonia($db, $_GET['id']);

	if (!empty($entradascol)) : 
	while ($entradacol = mysqli_fetch_assoc($entradascol)) :
?> 
<article>
	<a class="articulo" href="articulo-tipo.php?id=<?=$entradacol['id']?>">
		<h2 class="articulo-titulo radius"><?= $entradacol['nombre']?></h2>
		<p class="articulo-parrafo radius"><?=substr($entradacol['descripcion'], 0, 100).' ...'?></p>
		<p class="articulo-tipo radius"><?=$entradacol['tipo']?></p>
		<p class="articulo-fecha radius"><?=$entradacol['fecha']?></p>
	</a>
	</article>

	<?php
			endwhile;
		else: 

	endif; ?> 

</main>
<aside class="asidedos"></aside>

<?php require_once 'includes/footer.php'; ?>