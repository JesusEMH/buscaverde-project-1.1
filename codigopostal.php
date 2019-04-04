<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/buscar.php'; ?>

<aside class="asideuno"></aside>

<main class="main" >
	<h2 class="titulo">BUSCA AREAS VERDES POR CODIGO POSTAL</h2>

<?php if(isset($_SESSION['usuario'])):?>

	<div class="div-titulo">El codigo postal no esta? <a id="agregar" class="boton" href="crear-codigopostal.php">AGREGAR MAS CODIGOS</a></div>
	</div>

<?php else: ?>
	
	<div class="div-titulo">Inicia sesion para que puedas insertar codigos nuevos<a id="agregar2" class="boton" href="iniciarsesion.php">INICIA SESION</a>
	</div>


<?php endif; ?>

<?php 

	$cpostales = conseguirCpostal($db);

	if (!empty($cpostales)) : 
	while ($cpostal = mysqli_fetch_assoc($cpostales)) :
?> 
	<div class="div-contenedor"><a class="div-enlace" href="elcodigopostal.php?id=<?=$cpostal['id']?>&codigopostal=<?=$cpostal['codigopostal']?>">CPOSTAL: <?=$cpostal['codigopostal']?></a></div>

	<?php
			endwhile;
		endif; 
	?>
</main>
<aside class="asidedos"></aside>

<?php require_once 'includes/footer.php'; ?>