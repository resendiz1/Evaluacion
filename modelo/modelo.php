<?php 

Class enlacesPage{

	public static function enlacesModel($rutas){

		if ($rutas =="add_alumno" || $rutas=="add_materia" || $rutas =="result_alumnos" || $rutas=="cambio_calificacion" || $rutas=="agregar_a_materia" || $rutas=="result_materias" ) {
			
			$retorna = "vista/modulos/".$rutas.".php";
		}

		else if($rutas=="materia_borrada"){
			$retorna = "vista/modulos/result_alumnos.php";
		}

			else if($rutas=="materia_no_borrada"){
			$retorna = "vista/modulos/result_alumnos.php";
		}



		else if($rutas =="nota_no_actualizada"){
			$retorna = "vista/modulos/result_materias.php";
		}
		else if($rutas == "nota_actualizada"){
			$retorna = "vista/modulos/result_materias.php";
		}


		else{

			$retorna ="vista/modulos/add_alumno.php";
		}


		return $retorna;
	}


}
 ?>
