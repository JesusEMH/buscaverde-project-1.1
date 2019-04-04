<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/buscar.php'; ?>

<aside class="asideuno"></aside>

<main class="main" >
	<?php if(!isset($_SESSION['usuario'])) : ?>
	<p>inicia sesion antes para poder ver tus datos</p>

	<?php else: ?>

		<?php if(isset($_SESSION['completado'])): ?>
			<div class="alerta alerta-exito2">
		<?=$_SESSION['completado']?>
		</div>
		<?php elseif(isset($_SESSION['errores']['general'])): ?>
		<div class="alerta alerta-error2">
			<?=$_SESSION['errores']['general']?>
		</div>
	<?php endif; ?>

		<h2 class="titulo">TU INFORMACION PERSONAL</h2>
			<form method="POST" action="php/actualizar-usuario.php" class="form-registro">

			<label class="label-registro" for="name">NOMBRE: </label>
			<input class="input-registro" type="text" name="name" value="<?=$_SESSION['usuario']['nombre']; ?>">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'name') : '' ; ?>



			<label class="label-registro" for="lastname">APELLIDOS: </label>
			<input class="input-registro" type="text" name="lastname" value="<?=$_SESSION['usuario']['apellido']; ?>">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'lastname') : '' ; ?>



			<label class="label-registro" for="correo">EMAIL: </label>
			<input class="input-registro" type="email" name="correo" value="<?=$_SESSION['usuario']['email']; ?>">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'correo') : '' ; ?>

			<input class="form-submit" type="submit" name="registrado" value="ACTUALIZAR INFORMACION">
		</form>
	<?php endif; ?>

</main>
<aside class="asidedos"></aside>

<?php require_once 'includes/footer.php'; ?>