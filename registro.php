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
				$telefono = $_POST['telefono'];
				$provincia = $_POST['provincia'];
				$pais= $_POST['pais'];
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
								$insertar = "INSERT INTO cliente (nombre, apellido, calle, nro, cp, localidad, telefono, provincia, pais, login, clave, mail) VALUES('$nombre','$apellido','$calle','$nro','$cp','$localidad','$telefono','$provincia','$pais','$usuario',
									'$passEncriptada','$mail')";
								
								if (!mysqli_query($conexion, $insertar)){
								 	$mensaje = sprintf("Error al crear el usuario.<br>");
								 }
						else{
							
						 $mensaje = sprintf("<br>Usuario Creado Exitosamente!<br><br>");
				
						}
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
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<script src="http://code.jquery.com/jquery.js"></script>
		<link href="css/custom.min.css" rel="stylesheet" media="screen">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> <!-- FOOTER -->	
	</head>
	<body class="container">
		<!-- BARRA DE NAVEGACION -->
	    <nav class="navbar navbar-default navbar-fixed-top">
		  	<div class="container-fluid">
		    	<div class="navbar-header">
		      		<a class="navbar-brand" href="index.php">Revistas ABCD</a>
		    	</div>
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      	<ul class="nav navbar-nav">
			        <li class="active"><a href="#">Link 1</a></li>
			        <li><a href="#">Link 2</a></li>
			        <li class="dropdown">
			          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Catálogo <span class="caret"></span></a>
			          	<ul class="dropdown-menu" role="menu">
				            <li><a href="#">Femeninas</a></li>
				            <li><a href="#">Masculinas</a></li>
				            <li><a href="#">Noticias</a></li>
				            <li><a href="#">Ciencia y tecnología</a></li>
				            <li><a href="#">Estilo de vida</a></li>
				            <li><a href="#">Entretenimiento</a></li>
				            <li><a href="#">Deporte</a></li>
				            <li><a href="#">Viajes</a></li>
				            <li><a href="#">Automoción</a></li>
				            <li><a href="#">Hogar</a></li>
				            <li><a href="#">Arte</a></li>
				            <li class="divider"></li>
				            <li><a href="#" ><p class="text-primary"><b>MAS VENIDIDOS</b></p></a></li>
				            <li><a href="#" ><p class="text-primary"><b>PUBLICACIONES DESTACADAS</b></p></a></li>
				            <li><a href="#" ><p class="text-primary"><b>PUBLICACIONES NUEVAS</b></p></a></li>
			          	</ul>
			        </li>
			    </ul>
		      	<form class="navbar-form navbar-left" role="search">
			        <div class="form-group">
			          	<input type="text" class="form-control" placeholder="Buscar...">
			        </div>
			        <button type="submit" class="btn btn-default">Buscar</button>
			    </form>
			    <button type="submit" class=" navbar-right btn btn-primary">Suscribirse</button>
		    </div>
		  </div>
		</nav>
			<form class="form-horizontal" action="registro.php" method="POST" id="login">
				<?php if ($mensaje) { ?>
					        		<div class="error">
					            		<?php echo $mensaje ?>
					        		</div>
					    		<?php } ?>
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
						        <input type="text" name="localidad" class="form-control" id="inputLocalidad" placeholder="Localidad" value="<?php echo $localidad ?>"
						        pattern="^[a-zA-ZÑÁÉÍÓÚáéíóúñ\s]*" required/>
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
			      			<label for="inputProvincia" class="col-lg-2 control-label">Provincia</label>
			      			<div class="col-lg-10">
						        <input type="text" name="provincia" class="form-control" id="inputProvincia" placeholder="Provincia" value="<?php echo $provi ?>" pattern="^[a-zA-ZÑÁÉÍÓÚáéíóúñ\s]*" required/>
						    </div>
						</div>
						<div class="form-group">
			      			<label for="inputPais" class="col-lg-2 control-label">Pais</label>
			      			<div class="col-lg-10">
						        <input type="text" name="pais" class="form-control" id="inputPais" placeholder="Pais" value="<?php echo $pais ?>" pattern="^[a-zA-ZÑÁÉÍÓÚáéíóúñ\s]*" required/>
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
					</div>
				</div>
	  		</fieldset>
		</form>
		<!-- FOOTER -->
		<footer>
			<hr size="100%">
			<div class="row">
				<div class="col-lg-3">
					<h5>Revistas ABCD</h5>
					<p class="text-primary"><a href="#">Empresas</p></a>
					<p class="text-primary"><a href="#">Noticias</p></a>
					<p class="text-primary"><a href="#">Trabajar</p></a>
				</div>
				<div class="col-lg-3">
					<h5>Conseguir Aplicacion</h5>
					<p class="text-primary"><a href="#">IOS</p></a>
					<p class="text-primary"><a href="#">Android</p></a>
					<p class="text-primary"><a href="#">Windows 8</p></a>
					<p class="text-primary"><a href="#">Mac / PC</p></a>
				</div>
				<div class="col-lg-3">
					<h5>Síguenos</h5>
					<p class="text-primary"><a href="#">Facebook</p></a>
					<p class="text-primary"><a href="#">Twitter</p></a>

				</div>
				<div class="col-lg-3">
					<h5>Centro de ayuda</h5>
					<p><a href="#">Ayuda</p></a>
					<p><a href="#">Comprar - FAQ</p></a>
					<p><a href="#">Mi catalogo - FAQ</p></a>
					<p><a href="#">Suscripciones y compras</p></a>
					<p><a href="#">Solución de problemas técnicos</p></a>
				</div>
			</div>
			<hr size="60%">
			<div class="row">
				<div class="col-lg-6">
					<p>© 2014-2016 Revistas ABCD - Todos los derechos reservados</p>
				</div>
				<div class="col-lg-6">
					<p><a href="#">Políticas de privacidad</a> | <a href="#">Términos del servicio</a> | <a href="#">Políticas de reembolso</a></p>
				</div>
			</div>

		</footer>
		<script src="js/bootstrap.min.js"></script>
		<script src="jquery/jquery-1.10.2.min.js"></script>
	</body>
</html>


