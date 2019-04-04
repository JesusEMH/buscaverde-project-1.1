
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/buscar.php'; ?>
<aside class="asideuno"></aside>

<main class="main" >
	<h2 class="titulo">ZONAS VERDES POR CODIGO POSTAL <?=$_GET['codigopostal']?></h2>


<?php 
	$entradascp = conseguirEntradasCpostal($db, $_GET['id']);

	if (!empty($entradascp)) : 
	while ($entradacp = mysqli_fetch_assoc($entradascp)) :
?> 
<article>
	<a class="articulo" href="articulo-tipo.php?id=<?=$entradacp['id']?>">
		<h2 class="articulo-titulo radius"><?= $entradacp['nombre']?></h2>
		<p class="articulo-parrafo radius"><?=substr($entradacp['descripcion'], 0, 100).' ...'?></p>
		<p class="articulo-tipo radius"><?=$entradacp['tipo']?></p>
		<p class="articulo-fecha radius"><?=$entradacp['fecha']?></p>
	</a>
	</article>

	<?php
			endwhile;
		else: 

	endif; ?> 

</main>
<aside class="asidedos"></aside>

<?php require_once 'includes/footer.php'; ?>