  <?php 

  require_once "../../controlador/controlador.php";
  require_once "../../modelo/operaciones.php";

  Class Ajax{





  	static public function pasar_datos(){

  		if (isset($_POST["codigo"]) AND isset($_POST["apellidos"])) {
  		
  		 $datos = array('codigo' =>$_POST["codigo"],
						'nombres' => $_POST["nombres"],
						'apellidos' =>$_POST["apellidos"],
            'fecha'=>$_POST["fecha"]);
 
  		$respuesta= MvcControlador::add_alumno($datos);
  	}

}




  	static public function pasar_datos_materias(){
  		if (isset($_POST["codigo_materia"])) {
  		$datos = array('codigo_materia' =>$_POST["codigo_materia"],
  		     			'nombre_materia'=>$_POST["nombre_materia" ]);

  		$respuesta=MvcControlador::add_materia_controlador($datos);
  		}
  	}



  



  static public function busqueda_alumno(){
    if (isset($_POST["buscar_alumno"])) {
      $query = $_POST["buscar_alumno"];
      $respuesta=MvcControlador::busqueda_alumno_controlador($query);

    }
  }




  static public function query_alumnos(){
    if (isset($_POST["query"])) {
      $query = $_POST["query"];

    if ($query =="*") {
      $respuesta=MvcControlador::query_all_alumnos_controlador();
    }
    else{



      $respuesta=MvcControlador::query_alumnos_controlador($query);
    }
  }
}
  static public function busqueda_materia(){
    if (isset($_POST["id_materia"])) {
      $query = $_POST["id_materia"];

      if ($query =="*") {
    $respuesta= MvcControlador::query_all_materia_controlador($query);
      }
      else{


      $respuesta= MvcControlador::query_materia_controlador($query);
    }

}

  }



}





$a = new Ajax();
$a -> pasar_datos();
$a -> pasar_datos_materias();
$a -> busqueda_alumno();
$a->query_alumnos();
$a -> busqueda_materia();
