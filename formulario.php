
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/buscar.php'; ?>

<aside class="asideuno"></aside>
<main class="main" >
<!-- MOSTRAR ERRORES -->
		<?php if(isset($_SESSION['completado'])) :?>
			<div class="alerta alerta-exito">
				<?= $_SESSION['completado'] ?>
			</div>
		<?php elseif(isset($_SESSION['errores']['general'])): ?>
			<div class="alerta alerta-error"><a name="registro">
				<?=$_SESSION['errores']['general'] ?>
			</a></div>
		<?php endif; ?>

	<h2 class="titulo">REGISTRATE COMO USUARIO NUEVO</h2>
	<form class="form-registro" method="POST" action="php/registro.php">

			<label class="label-registro" for="name">NOMBRE: </label>
			<input class="input-registro" type="text" name="name">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'name') : '' ; ?>

			<label class="label-registro" for="lastname">APELLIDOS: </label>
			<input class="input-registro" type="text" name="lastname">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'lastname') : '' ; ?>

			<label class="label-registro" for="correo">EMAIL: </label>
			<input class="input-registro" type="email" name="correo">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'correo') : '' ; ?>

			<label class="label-registro" for="passw" >CONTRASENA: </label>
			<input class="input-registro" type="password" name="passw">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'passw') : '' ; ?>
			<input class="form-submit" type="submit" name="registrado" value="REGISTRARSE">
		</form>
	</main>
<aside class="asidedos"></aside>
	<?php borrarErrores(); ?>
<?php require_once 'includes/footer.php'; ?>	