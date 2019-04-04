<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/buscar.php'; ?>

<aside class="asideuno"></aside>

<main class="main" >
	<h2 class="titulo">BUSCA AREAS VERDES POR COLONIA</h2>
<?php if(isset($_SESSION['usuario'])):?>

	<div class="div-titulo">La colonia que buscas no se encuentra? <a id="agregar" class="boton" href="crear-colonia.php">AGREGAR NUEVAS COLONIAS</a></div>
	</div>

<?php else: ?>
	
	<div class="div-titulo">Inicia sesion para que puedas insertar colonias nuevas <a id="agregar2" class="boton" href="iniciarsesion.php">INICIA SESION</a>
	</div>

<?php endif; ?>

<?php 

	$colonias = conseguirColonias($db);
	if (!empty($colonias)) : 
		
	while ($colonia = mysqli_fetch_assoc($colonias)) :
?>
		<div class="div-contenedor"><a class="div-enlace" href="lacolonia.php?id=<?=$colonia['id']?>&colonia=<?=$colonia['colonia']?>">COLONIA: <?=$colonia['colonia']?></a></div>
	<?php
			endwhile;
		endif; 
	?>
</main>
<aside class="asidedos"></aside>

<?php require_once 'includes/footer.php'; ?>