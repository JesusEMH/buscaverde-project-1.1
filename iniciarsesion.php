<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/buscar.php'; ?>
<aside class="asideuno"></aside>

<main class="main" >
	<?php if (isset($_SESSION['error_login'])) : ?>
		<div class="alerta alerta-error2">
			<?= $_SESSION['error_login']; ?>
		</div>
	<?php endif; ?>

	<?php if(isset($_SESSION['usuario'])) : ?>
	<p>ya has iniciado sesion</p>
	<?php else: ?>
		<h2 class="titulo">LOGUEATE Y EDITA LO QUE QUIERAS</h2>
			<form method="POST" action="php/login.php" class="form-login">
					<label class="label-login" for="email">CORREO ELECTRONICO: </label><input class="input-login" type="text" name="email">
					<label class="label-login" for="password">CONTRASENA: </label><input class="input-login" type="password" name="password">
					<input class="form-submit" type="submit" name="logueate" value="INGRESAR">
					<a class="registrate-login" href="formulario.php">No tienes una cuenta?, registrate..</a>
			</form>
	<?php endif; ?>

</main>
<aside class="asidedos"></aside>	
<?php borrarErrores();?>
<?php require_once 'includes/footer.php'; ?>
