<?php
	error_reporting(0);
	session_start();
	$conexion = mysqli_connect("localhost", "root", "", "revista") or die("No se puede seleccionar la base de datos.");
	$usuario= "";
	if(isset($_POST['enviar'])){
		$usuario = $_POST['user'];
		$pass = $_POST['pass'];
        $buscarUsuario= "select * from cliente where nombre='$usuario' && clave='$pass'";
    	$usuarioEncontrado=mysqli_query($conexion, $buscarUsuario);
	 	if(mysqli_num_rows($usuarioEncontrado) == 1){

			$_SESSION['log']=true;
			$_SESSION['usuario']=$usuario;
			if ($_POST['recordar']){
				setcookie("user", $_POST['user'] , time()+(60*60*20),"/");
				setcookie("pass", $_POST['pass'] , time()+(60*60*20),"/");
			}
			else{
	  			setcookie("user","",time()-3600,"/");
	  			setcookie("pass","",time()-3600,"/");
	  		}

			header('location:Principal.php');
		}
	 	else { 
	 		if(empty($_POST['user']) && empty($_POST['pass'])){
				$mensaje=sprintf("Los campos no fueron ingresados.");
			}
			elseif(empty($_POST['user'])){
				$mensaje=sprintf("El usuario no fue ingresado.");
			}
			elseif (empty($_POST['pass'])) {
				$mensaje=sprintf("La contraseña no fue ingresada.");
			}
			else{
				$mensaje=sprintf("El usuario y/o la contraseña son incorrectos.");
			}
		}
	}
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
		<!-- carrousel ppal -->
		<div id="myCarousel" class=" carousel slide">
            <div class="carousel-inner">
                <div class="item active">
                	<img src="img/car1.jpg" alt="" width="100%" height="100%">
                    <div class="carousel-caption">
                		<p>Actualiza tu biblioteca a un precio especial.</p>
                		<button type="submit" class="btn btn-primary">Comprar ahora</button>
                    </div>
        		</div>
            	<div class="item">
                    <img src="img/car2.jpg" alt="" width="100%" height="100%">
                    <div class="carousel-caption">
                        <p>Más de 5.500 revistas disponibles en cualquier dispositivo.</p>
                        <button type="submit" class="btn btn-primary">Descargar aplicación</button>
                    </div>
                </div>
                <div class="item">
                    <img src="img/car3.jpg" alt="" width="100%" height="100%">
                    <div class="carousel-caption">
                        <p>Con nuestras ofertas exclusivas a precios reducidos.</p>
                        <button type="submit" class="btn btn-primary">Consultar ofertas</button>
                    </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only"></span>
	  			</a>
	  			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only"></span>
	  			</a>
            </div>
            
            <ol class=" carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
		</div>
		<!-- SEPARACION EN COLUMNAS -->
		<div class="row"> 
			<!-- PAGINACION PREGUNTAR COMO SE HACE BIEN -->
	        <div class="col-lg-9">
	        	<h4>MAS DESTACADOS</H4>
	        	<hr size="100%">
	        	<div id="myCarousel2" class=" carousel slide">
		           	<div class="carousel-inner">
	                	<div class="item active">
		                    <img src="img/img1.jpg" alt="" width="24.73%" height="50%">
		                    <img src="img/img2.jpg" alt="" width="24.73%" height="50%">
		                    <img src="img/img3.jpg" alt="" width="24.73%" height="50%">
		                    <img src="img/img4.jpg" alt="" width="24.73%" height="50%">
		                </div>
			            <div class="item">
			                <img src="img/img5.jpg" alt="" width="24.73%" height="50%">
			                <img src="img/img6.jpg" alt="" width="24.73%" height="50%">
			                <img src="img/img7.jpg" alt="" width="24.73%" height="50%">
			                <img src="img/img8.jpg" alt="" width="24.73%" height="50%">
			            </div>
			            <a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev">
						    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						    <span class="sr-only"></span>
			  			</a>
			  			<a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next">
						    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						    <span class="sr-only"></span>
	  					</a>
				    </div>
				</div>
				<br>
				<h4>MAS VENDIDOS</H4>
				<hr size="100%">
				<div id="myCarousel3" class=" carousel slide">
		           	<div class="carousel-inner">
	                	<div class="item active">
		                    <img src="img/img9.jpg" alt="" width="24.73%" height="50%">
		                    <img src="img/img10.jpg" alt="" width="24.73%" height="50%">
		                    <img src="img/img11.jpg" alt="" width="24.73%" height="50%">
		                    <img src="img/img12.jpg" alt="" width="24.73%" height="50%">
		                </div>
			            <div class="item">
			                <img src="img/img13.jpg" alt="" width="24.73%" height="50%">
			                <img src="img/img14.jpg" alt="" width="24.73%" height="50%">
			                <img src="img/img15.jpg" alt="" width="24.73%" height="50%">
			                <img src="img/img16.jpg" alt="" width="24.73%" height="50%">
			            </div>
			            <a class="left carousel-control" href="#myCarousel3" role="button" data-slide="prev">
						    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						    <span class="sr-only"></span>
			  			</a>
			  			<a class="right carousel-control" href="#myCarousel3" role="button" data-slide="next">
						    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						    <span class="sr-only"></span>
	  					</a>
				    </div>
				</div> 
	        </div>

	        <div class="col-lg-3">
	        	<!-- FORMULARIO DE LOGIN -->
				<form class="form-horizontal" action="index.php" method="POST" id="login">
		        	<!-- MUESTRA EL MSJ DE ERROR EN EL FORM -->
		        	<?php if ($mensaje) { ?>
        				<div class="error">
            				<?php echo $mensaje ?>
					    </div>
					    <?php } ?>	
			        <div class="form-group">
			            <label for="inputUsuario" class="control-label">User</label>
			            <input type="text" name="user" class="form-control" id="inputUsuario" placeholder="Usuario" value="<?php if (isset($_COOKIE['user'])) echo $_COOKIE['user']; ?>">
			        </div>
			        <div class="form-group">
			            <label for="inputPassword" class="control-label">Password</label>
			            <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Contraseña" value="<?php if (isset($_COOKIE['pass'])) echo $_COOKIE['pass']; ?>">
			        </div>
			        <div class="form-group">
			            <div class="checkbox">
			                <label><input type="checkbox"> Recordarme</label>
			            </div>
			        </div>
			        <div class="form-group">
			            <a class="btn btn-default" href="registro.php">Registrarse</a>
			            <button type="submit" name="enviar" class="btn btn-primary">Ingresar</button>
			        </div>
				</form>
	        </div> 
		</div>
	
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


