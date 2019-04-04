<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/buscar.php'; ?>

<aside class="asideuno"></aside>

<main class="main" >
	<?php if(!isset($_SESSION['usuario'])) : ?>
	<p>inicia sesion antes para poder crear entradas</p>

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

		<h2 class="titulo">INSERTA ZONA VERDE NUEVA AL SISTEMA</h2>

			<form method="POST" action="php/guardar-entrada.php" class="form-registro">

			<label class="label-registro" for="nombre">NOMBRE: </label>
			<input class="input-registro" type="text" name="nombre">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : '' ; ?>



			<label class="label-registro" for="descripcion">DESCRIPCION: </label>
			<input class="input-registro" type="text" name="descripcion">
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'descripcion') : '' ; ?>



			<label class="label-registro" for="calle">CALLE: </label>
			<input class="input-registro" type="text" name="calle" >
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'calle') : '' ; ?>

			<label class="label-registro" for="colonia">COLONIA:</label>
			<select class="input-registro" name="colonia">
			<?php 
				$colonias = conseguirColonias($db); 
				if(!empty($colonias)):
				while($colonia = mysqli_fetch_assoc($colonias)): 
			?>
				<option value="<?=$colonia['id']?>">
					<?=$colonia['colonia']?>
				</option>
			<?php
				endwhile;
				endif;
			?>
		</select>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'colonia') : ''; ?>


			<label class="label-registro" for="codigopostal">CODIGO POSTAL:</label>
			<select class="input-registro" name="codigopostal">
			<?php 
				$cpostal = conseguirCpostal($db); 
				if(!empty($cpostal)):
				while($postal = mysqli_fetch_assoc($cpostal)): 
			?>
				<option value="<?=$postal['id']?>">
					<?=$postal['codigopostal']?>
				</option>
			<?php
				endwhile;
				endif;
			?>
		</select>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'cpostal') : ''; ?>


			<label class="label-registro" for="tipo">TIPO DE ZONA:</label>
			<select class="input-registro" name="tipo">
			<?php 
				$tipos = conseguirTipo($db); 
				if(!empty($tipos)):
				while($tipo = mysqli_fetch_assoc($tipos)): 
			?>
				<option value="<?=$tipo['id']?>">
					<?=$tipo['tipo']?>
				</option>
			<?php
				endwhile;
				endif;
			?>
		</select>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'tipo') : ''; ?>


			<label class="label-registro" for="arboles">ARBOLES: </label>
			<input class="input-registro" type="text" name="arboles" >
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'arboles') : '' ; ?>


			<label class="label-registro" for="contacto">CONTACTO: </label>
			<input class="input-registro" type="email" name="contacto" >
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'contacto') : '' ; ?>


			<input class="form-submit form-submit2" type="submit" name="registrado" value="INSERTAR AREA VERDE">
		</form>
	<?php endif; ?>

</main>
<aside class="asidedos"></aside>

<?php require_once 'includes/footer.php'; ?>