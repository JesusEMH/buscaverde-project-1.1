<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/buscar.php'; ?>

<aside class="asideuno"></aside>

<main class="main" >
	<?php if(!isset($_SESSION['usuario'])) : ?>
	<p>inicia sesion antes para poder insertar colonias</p>

	<?php else: ?>
		<h2 class="titulo">AGREGA UN TIPO DE ZONA NUEVO</h2>
			<form method="POST" action="php/guardar-tipo.php" class="form-login">
					<label class="label-login" for="nombre-tipo">NOMBRE DEL TIPO DE ZONA: </label><input class="input-login" type="text" name="nombre-tipo">

					<input class="form-submit" type="submit" name="logueate" value="INSERTAR">
		</form>
	<?php endif; ?>

</main>
<aside class="asidedos"></aside>

<?php require_once 'includes/footer.php'; ?>