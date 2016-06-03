<?php
	include_once('Publicacion.php');		//variable que me indica la raiz de mi proyecto.. raiz.miproyecto  //GOOGLEAR BASE 
	require_once("segura.php");	
	$Publicacion = new Publicacion(1,'CARAS','REVISTA');
	
	foreach($Publicaciones->getEdiciones() as $edicion){
		echo "<div class='edicion' id='".$edicion[sub_id]"'>";
		echo $edicion['nombre'];
		echo "</div>";
	}
?>