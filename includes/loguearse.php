<div class="lienzo">
	<?php if (isset($_SESSION['error_login'])) : ?>
		<div class="alerta alerta-error">
			<?= $_SESSION['error_login']; ?>
		</div>
	<?php endif; ?>

	<?php if(isset($_SESSION['usuario'])) : ?>

	<?php else: ?>
		<div id="divlogin">
			<form method="POST" action="php/login.php" class="loginform">
					<label class="loginlabel" for="email">CORREO ELECTRONICO: </label><input class="input" type="text" name="email">
					<label class="loginlabel" for="password">CONTRASENA: </label><input class="input" type="password" name="password">
					<input class="btn" type="submit" name="logueate">
			</form>
		</div>
	<?php endif; ?>
