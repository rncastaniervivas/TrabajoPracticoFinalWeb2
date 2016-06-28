<?php
	error_reporting(0);
	$conexion = mysqli_connect("localhost", "root", "", "revista");
	if($conexion){
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$calle = $_POST['calle'];
		$nro = $_POST['nro'];
		$cp = $_POST['cp'];
		$localidad = $_POST['localidad'];
		$pais=$_POST['pais'];
		$provincia=$_POST['provincia'];
		$telefono = $_POST['telefono'];
		$mail = $_POST['mail'];
		$usuario = $_POST['user'];
		$clave = $_POST['pass'];

		$longitud = (strlen($usuario)*strlen($clave));
		if($longitud){
			$passEncriptada = md5($clave);
			$buscarUsuario = "SELECT * FROM cliente WHERE login = '$usuario' ";
			$usuarioEncontrado = mysqli_query($conexion, $buscarUsuario);
			if (mysqli_num_rows($usuarioEncontrado) == 1){

				$mensaje = sprintf("El nombre de usuario ya existe.<br><br>");

			}
			else{
				
				$insertar = "INSERT INTO cliente (nombre, apellido, calle, nro, cp, localidad, telefono, login, clave, mail)
				VALUES('$nombre', '$apellido', '$calle', '$nro', '$cp', '$localidad', '$telefono', '$usuario', '$passEncriptada', '$mail')";

				if (!mysqli_query($conexion, $insertar)){
					$mensaje = sprintf("Error al crear el usuario.<br>");
				}
				else{

				 $mensaje = sprintf("<br>Usuario Creado Exitosamente!<br><br>");
				}

		}
	}
	else{
		$mensaje = sprintf("No se puede seleccionar la base de datos");
	}
	mysqli_close($conexion);
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
		<title>ABCD revistas</title>
		<link href="css/custom.min.css" rel="stylesheet" media="screen">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<script src="jquery/jquery.js"></script>
	</head>
	<body class="container">
		<!-- BARRA DE NAVEGACION -->
	    <?php
			include 'includes/navbar.html';
		?>
			<form class="form-horizontal" action="registro.php" method="POST" id="login">
	  		<fieldset>
	  			<div class="row">	
			    	<legend>Formulario de Registro</legend>
			    	<div class="col-lg-6">
			    		<div class="form-group">
			      			<label for="inputNombre" class="col-lg-2 control-label">Nombre</label>
			      			<div class="col-lg-10">
						        <input type="text" name="nombre" class="form-control" id="inputNombre" placeholder="Nombre" value="<?php echo $nombre ?>" pattern="^[a-zA-ZÑÁÉÍÓÚáéíóúñ\s]*" required/>
						    </div>
			    		</div>
			    		<div class="form-group">
			      			<label for="inputApellido" class="col-lg-2 control-label">Apellido</label>
			      			<div class="col-lg-10">
						        <input type="text" name="apellido" class="form-control" id="inputApellido" placeholder="Apellido"value="<?php echo $apellido ?>" pattern="^[a-zA-ZÑÁÉÍÓÚáéíóúñ\s]*" required/>
						    </div>
			    		</div>
			    		<div class="form-group">
			      			<label for="inputCalle" class="col-lg-2 control-label">Calle</label>
			      			<div class="col-lg-10">
						        <input type="text" name="calle" class="form-control" id="inputcalle" placeholder="Calle"value="<?php echo $calle ?>" pattern="^[a-zA-ZÑÁÉÍÓÚáéíóúñ\s]*" required/>
						    </div>
						</div>
						<div class="form-group">
			      			<label for="inputNro" class="col-lg-2 control-label">Nro. de calle</label>
			      			<div class="col-lg-10">
						        <input type="text" name="nro" class="form-control" id="inputNro" placeholder="Nro. de calle"value="<?php echo $nro ?>"pattern="^[0-9]*" required/>
						    </div>
						</div>
						<div class="form-group">
			      			<label for="inputCp" class="col-lg-2 control-label">Código Postal</label>
			      			<div class="col-lg-10">
						        <input type="text" name="cp" class="form-control" id="inputCp" placeholder="Código Postal" value="<?php echo $cp ?>" pattern="^[0-9]*" required/>
						    </div>
						</div>
						<div class="form-group">
			      			<label for="inputLocalidad" class="col-lg-2 control-label">Localidad</label>
			      			<div class="col-lg-10">
						        <input type="text" name="localidad" class="form-control" id="inputLocalidad" placeholder="Localidad" value="<?php echo $localidad ?>" pattern="^[a-zA-ZÑÁÉÍÓÚáéíóúñ\s]*" required/>
						    </div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
			      			<label for="inputTelefono" class="col-lg-2 control-label">Teléfono</label>
			      			<div class="col-lg-10">
						        <input type="text" name="telefono" class="form-control" id="inputTelefono" placeholder="Teléfono" value="<?php echo $tele ?>" pattern="^[0-9]*" required/>
						    </div>
						</div>
						<div class="form-group">
					      	<label for="select" class="col-lg-2 control-label">Pais</label>
					      	<div class="col-lg-10">
					        	<select class="form-control" id="selectPais" name="pais" value="<?php echo $pais ?>">
					        		<option value="1" selected>Argentina</option>
					        		<option value="2">Brasil</option>
					        		<option value="3">Chile</option>
					        		<option value="4">Costa Rica</option>
					        	</select>
					        	<br>
					      	</div>
					    </div>
					    <div class="form-group">
					      	<label for="select" class="col-lg-2 control-label">Provincia</label>
					      	<div class="col-lg-10">
					        	<select class="form-control" id="selectProvincia" name="provincia" value="<?php echo $provincia ?>">
									
					        	</select>
					        	<br>
					      	</div>
					    </div>
			    		<div class="form-group">
			      			<label for="inputEmail" class="col-lg-2 control-label">Email</label>
			      			<div class="col-lg-10">
						        <input type="email" name="mail" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $mail ?>" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required/>
						    </div>
			    		</div>
			    		<div class="form-group">
			      			<label for="inputUsuario" class="col-lg-2 control-label">Usuario</label>
			      			<div class="col-lg-10">
						        <input type="text" name="user" class="form-control" id="inputUsuario" placeholder="Usuario" value="<?php echo $user ?>" pattern="^[a-zA-ZÑÁÉÍÓÚáéíóúñ0-9_]*" required/>
						    </div>
			    		</div>
				    	<div class="form-group">
						    <label for="inputPassword" class="col-lg-2 control-label">Contraseña</label>
						    <div class="col-lg-10">
						    	<input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password" pattern="^[a-zA-ZÑÁÉÍÓÚáéíóúñ0-9_*#-.]*" required/>
						    </div>
				    	</div>
						<div class="form-group">
						  	<div class="col-lg-10 col-lg-offset-2">
						      	<input type="reset" class="btn btn-default" value="Resetear"></input>
						      	<input type="submit" name="enviar" value= "Enviar" class="btn btn-primary"></input>
						   	</div>
						</div>
						<?php if ($mensaje) { ?>
        				<div class="error">
            				<?php echo $mensaje ?>
        				</div>
    					<?php } ?>
					</div>
				</div>
	  		</fieldset>
		</form>
		<?php
			include 'includes/footer.html';
		?>
	</body>
</html>


