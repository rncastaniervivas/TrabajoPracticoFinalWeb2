<?php
	Class Publicacion{
		private $nombre;
		private $tipoPublicacion;
		private $tapaRevista;		//cambio por $logo	
		private $ediciones;		//array de objetos ediciones
		
		public Function Publicacion(){	//paso los atributos
			this->idpublicacion = $id_publicacion;			//$this??????????????????????????????????????????????????????????????????????????
			//item por cada uno
			obtenerEdiciones();
		}
		
		public Function obtenerEdiciones(){			//modulado en cierta fecha asi me trae solo algunas
			$bd = new Database();		//usuario, contraseña, root.....
			$sql = "SELECT * FROM Ediciones e WHERE e codpublicacion = $this->id_publicacion";				//alias e
		
			$result = $bd->query($sql);		//preparando para mostrar el resultado de la consulta
				while($fila mysql_fetchassoc($result)){
					$this->ediciones[] = $fila; 		//corchetes va agregando a un array uno por uno
				}
		}
		
		public Function getEdiciones(){
			return $this->ediciones;
		}
		
	}
?>