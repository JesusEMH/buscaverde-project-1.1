
<form id="registro" method="POST" action="php/registro.php">
			<div class="registrointerno">
			<h2 class="subtitulo">REGISTRATE COMO USUARIO NUEVO</h2>
			<label class="label" for="name">NOMBRE: </label><input class="cajas cj" type="text" name="name">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'name') : '' ; ?>

			<label class="label" for="lastname">APELLIDOS: </label><input class="cajas cj" type="text" name="lastname">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'lastname') : '' ; ?>

			<label class="label" for="correo">EMAIL: </label><input class="cajas cj" type="email" name="correo">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'correo') : '' ; ?>

			<label class="label" for="passw" >CONTRASENA: </label><input class="cajas cj" type="password" name="passw">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'passw') : '' ; ?>
			<input class="btn btnbig" type="submit" name="registrado"></div>
		</form>
		<?php require_once 'includes/footer.php'; ?>