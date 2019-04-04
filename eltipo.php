<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/buscar.php'; ?>
<aside class="asideuno"></aside>

<main class="main" >
	<h2 class="titulo">ZONAS VERDES POR EL TIPO <?=$_GET['tipo']?></h2>


<?php 
	$entradastip = conseguirEntradasTipo($db, $_GET['id']);

	if (!empty($entradastip)) : 
	while ($entradatip = mysqli_fetch_assoc($entradastip)) :

?> 
<article>
		<a class="articulo" href="articulo-tipo.php?id=<?=$entradatip['id']?>">
		<h2 class="articulo-titulo radius"><?= $entradatip['nombre']?></h2>
		<p class="articulo-parrafo radius"><?=substr($entradatip['descripcion'], 0, 100).' ...'?></p>
		<p class="articulo-tipo radius"><?=$_GET['tipo']?></p>
		<p class="articulo-fecha radius"><?=$entradatip['fecha']?></p>
	</a>
	</article>

	<?php
			endwhile;
		else: 

	endif; ?> 

</main>
<aside class="asidedos"></aside>

<?php require_once 'includes/footer.php'; ?>