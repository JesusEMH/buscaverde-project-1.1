<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/buscar.php'; ?>


<aside class="asideuno"></aside>

<main class="main" >
	<h2 class="titulo">BUSCA AREAS VERDES POR TIPO DE ZONA</h2>

<?php if(isset($_SESSION['usuario'])):?>

	<div class="div-titulo">La colonia que buscas no se encuentra? <a id="agregar" class="boton" href="crear-tipo.php">AGREGAR NUEVOS TIPOS DE ZONAS</a></div>
	</div>
<?php else: ?>

	<div class="div-titulo">Inicia sesion para agregar tipos nuevos <a id="agregar2" class="boton" href="iniciarsesion.php">INICIA SESION</a>
	</div>
<?php endif; ?>
<?php 

	$tipos = conseguirtipo($db);
	if (!empty($tipos)) : 
		
	while ($tipo = mysqli_fetch_assoc($tipos)) :
?>
		<div class="div-contenedor"><a class="div-enlace" href="eltipo.php?id=<?=$tipo['id']?>&tipo=<?=$tipo['tipo']?>">TIPO: <?=$tipo['tipo']?></a></div>
	<?php
			endwhile;
		endif; 
	?>
</main>
<aside class="asidedos"></aside>	

<?php require_once 'includes/footer.php'; ?>