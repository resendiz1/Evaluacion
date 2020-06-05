<?php 
require_once "conexion.php";
Class Datos extends conexion{


	static public function add_alumno($datos, $tabla){

		$stmt=conexion::conectar()->prepare("INSERT INTO $tabla (icodigoalumno, vchnombres, vchapellidos, dtfechanac) VALUES (:id, :nombres, :apellidos, :fecha) ");

		$stmt->bindParam(":id", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}
		else{
			return "error";
		}
	}




	static public function add_materia_modelo($datos, $tabla){
		$stmt= conexion::conectar()->prepare("INSERT INTO $tabla (vchcodigomateria, vchmateria) VALUES (:codigo, :nombre)");

		$stmt->bindParam(":codigo", $datos["codigo_materia"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre_materia"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			
			return "success";
		}
		else{
			return "error";
		}
	}


	static public function adicion_alumno_materia_moodelo($datos, $tabla){
		$stmt=conexion::conectar()->prepare("INSERT INTO $tabla (cat_alumnos_icodigoalumno, cat_materias_vchcodigomateria) 
			VALUES (:id_alumno, :id_materia)");


		$stmt->bindParam(":id_alumno", $datos["id_alumno"], PDO::PARAM_INT);
		$stmt->bindParam(":id_materia", $datos["id_materia"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}
		else{
			return "error";
		}

	}




	static public function comprueba_duplicado_modelo($datos, $tabla){
		$stmt=conexion::conectar()->prepare("SELECT cat_materias_vchcodigomateria, cat_alumnos_icodigoalumno  FROM cat_rel_alumno_materia WHERE cat_materias_vchcodigomateria LIKE :id_materia AND cat_alumnos_icodigoalumno LIKE :id_alumno");

		$stmt->bindParam(":id_materia", $datos["id_materia"], PDO::PARAM_STR);
		$stmt->bindParam(":id_alumno", $datos["id_alumno"], PDO::PARAM_INT);

		$stmt->execute();
		return $stmt->fetch();
	}




	static public function busqueda_alumno_modelo( $tabla){
		$stmt=conexion::conectar()->prepare("SELECT*FROM $tabla");

		$stmt -> bindParam(":id", $query, PDO::PARAM_STR);

		$stmt->execute();
		return $stmt->fetchAll();
	}

	static  public function mis_materias_modelo($query, $tabla){
		$stmt=conexion::conectar()->prepare("SELECT*FROM cat_materias INNER JOIN cat_rel_alumno_materia ON (cat_materias_vchcodigomateria = vchcodigomateria) WHERE cat_alumnos_icodigoalumno LIKE :id");

		$stmt->bindParam(":id", $query, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	static public function borrar_materia_morro($datos, $tabla){
		$stmt=conexion::conectar()->prepare("DELETE FROM $tabla WHERE cat_alumnos_icodigoalumno = :id_alumno AND cat_materias_vchcodigomateria = :id_materia");

		$stmt->bindParam(":id_alumno", $datos["codigo_alumno"], PDO::PARAM_INT);
		$stmt->bindParam(":id_materia", $datos["codigo_materia"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "success";
		}
		else{
			return "error";
		}
	}

static public function query_all_alumnos_modelo($tabla){
	    $stmt=conexion::conectar()->prepare("SELECT*FROM $tabla");
		$stmt->execute();
		return $stmt->fetchAll();
}

	static public function query_alumnos_modelo($query){
		$stmt=conexion::conectar()->prepare("SELECT*FROM cat_alumnos WHERE icodigoalumno=:id_alumno OR vchnombres LIKE :id_alumno");

		$stmt->bindParam(":id_alumno", $query, PDO::PARAM_STR);

		$stmt->execute();
		return $stmt->fetchAll();
	}

static public function query_all_materia_modelo($tabla){
		$stmt=conexion::conectar()->prepare("SELECT* FROM $tabla");

		$stmt->execute();
		return $stmt->fetchAll();
}


	static public function query_materia_modelo($query, $tabla){
		$stmt=conexion::conectar()->prepare("SELECT* FROM $tabla WHERE vchcodigomateria LIKE :id_materia OR vchmateria LIKE :id_materia");

		$stmt->bindParam(":id_materia", $query, PDO::PARAM_STR);

		$stmt->execute();
		return $stmt->fetchAll();
	}

	static public function materiacambio_nota_modelo( $materia, $tabla){
		$stmt= conexion::conectar()->prepare("SELECT*FROM $tabla INNER JOIN cat_rel_alumno_materia ON (cat_alumnos_icodigoalumno = icodigoalumno) WHERE  cat_materias_vchcodigomateria LIKE :id_materia");


		$stmt->bindParam(":id_materia", $materia, PDO::PARAM_STR);

		$stmt->execute();
		return $stmt->fetchAll();
	}

	static public function cambio_calificacion_modelo($datos, $tabla){

		$stmt = conexion::conectar()->prepare("UPDATE $tabla SET fcalificacion= :nota WHERE cat_alumnos_icodigoalumno LIKE :id_alumno   AND cat_materias_vchcodigomateria LIKE :id_materia");

		$stmt->bindParam(":nota", $datos["calificacion"], PDO::PARAM_STR);
		$stmt->bindParam(":id_alumno", $datos["id_alumno"], PDO::PARAM_INT);
		$stmt->bindParam("id_materia", $datos["id_materia"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
	}



}



 ?>