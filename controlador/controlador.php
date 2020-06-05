<?php 
ob_start();

Class MvcControlador{




	public function plantilla(){

		include "vista/plantilla.php";
	}

	public function rutas_sitio(){
		if (isset($_GET["go"])) {

			$rutas_sitio = $_GET["go"];			
		}
		else{
			$rutas_sitio="index.php";
		}



		$respuesta = enlacesPage::enlacesModel($rutas_sitio);

		include $respuesta;
	}


	public function redirecciona(){
		if (isset($_POST["ir_materia"])) {
			header("location:index.php?go=add_materia");
		}
		if (isset($_POST["ir_alumno"])) {
			header("location:index.php?go=add_alumno");
		}
	}



	static public function add_alumno($datos){
		if (isset($_POST["codigo"])) {
			
			$datos = array('codigo' => $_POST["codigo"],
							'nombres'=>$_POST["nombres"],
							'apellidos'=>$_POST["apellidos"],
							'fecha'=>$_POST["fecha"] );

			$respuesta=Datos::add_alumno($datos, "cat_alumnos");

			if ($respuesta=="success") {
				echo'<div class="alert alert-success text-center">Registro correcto</div>';
			}
			else{
				echo'<div class="alert alert-danger text-center">El ID ya esta en uso</div>';
			}
		}
	}








	static public function add_materia_controlador($datos){
		if (isset($_POST["codigo_materia"])) {
			
			$datos = array('codigo_materia' =>$_POST["codigo_materia"],
							'nombre_materia' =>  $_POST["nombre_materia"] );


			$respuesta=Datos::add_materia_modelo($datos, "cat_materias");

			if ($respuesta=="success") {
			echo '<div class="alert alert-success font-weight-bold  text-center h6">Materia agregada </div>';
			}
			else{
			echo '<div class="alert alert-danger font-weight-bold text-center h6">Ese ID ya esta en uso </div>';
			}
		}

	}



static public function query_all_alumnos_controlador(){
	$respuesta = Datos::query_all_alumnos_modelo("cat_alumnos");

		foreach ($respuesta as $key => $value) {
			echo '
  <div class="col-lg-4 col-md-6 col-sm-12 mt-4 animated bounceIn">
  <div class="card">
    <div class="card-header text-center text-white font-weight-bold" style="background:#0D4379">'.$value["vchnombres"].' '.$value["vchapellidos"].'</div>
    <div class="card-body row text-center">
      <div class="col-12"><strong>Fecha de nacimiento: </strong>'.$value["dtfechanac"].'</div>
      <div class="col-12">
      <a href="index.php?go=result_alumnos&codigo='.$value["icodigoalumno"].'" class="btn btn-info btn-sm ver_materias" name="'.$value["icodigoalumno"].'">Ver mis materias</a></div>
    </div>
    <div class="card-footer text-center"><strong>Codigo:</strong> '.$value["icodigoalumno"].' </div>
  </div>
</div>
			';
		}

	}





static public function query_alumnos_controlador($query){
	
		$query = $_POST["query"];

		$respuesta = Datos::query_alumnos_modelo($query);

		foreach ($respuesta as $key => $value) {
			echo '
  <div class="col-lg-4 col-md-6 col-sm-12 mt-4 animated bounceIn">
  <div class="card">
    <div class="card-header text-center text-white font-weight-bold" style="background:#0D2079">'.$value["vchnombres"].' '.$value["vchapellidos"].'</div>
    <div class="card-body row text-center">
      <div class="col-12"><strong>Fecha de nacimiento: </strong>'.$value["dtfechanac"].'</div>
      <div class="col-12">
      <a href="index.php?go=result_alumnos&codigo='.$value["icodigoalumno"].'" class="btn btn-info btn-sm ver_materias" name="'.$value["icodigoalumno"].'">Ver mis materias</a></div>
    </div>
    <div class="card-footer text-center"><strong>Codigo:</strong> '.$value["icodigoalumno"].' </div>
  </div>
</div>
			';
		}

	}




	 public function materiacambio_nota_controlador(){
		if (isset($_GET["codigo_materia"])) {
			$materia= $_GET["codigo_materia"];

			$respuesta=Datos::materiacambio_nota_modelo($materia, "cat_alumnos");

			if ($respuesta ==null) {
				echo '
			<div class="col-12 justify-content-center mt-4">
				<div class="alert alert-info h3 text-center font-weight-bold">!! <br> Sin alumnos disponibles <br>para cambio de calificación</div>
			</div>
				'
				;
			}
			else{
			foreach ($respuesta as $key => $value) {

				if ($value["fcalificacion"] == null) {//Dependiendo de si viene nulo o no imprimo lo de abajo

			echo'
          <div class="col-12 mt-4">
            <div class="card text-center">
              <div class="card-header strong btn-mdb-color"><div class="row"><div class="col-4">'.$value["vchnombres"].' '.$value["vchapellidos"].'</div><div class="col-4">ID:'.$value["icodigoalumno"].'</div><div class="col-4">NACIO EL: 20/JUN/1993</div></div></div>
            <div class="card-body row ">
              <div class="col-12">CALIFICACIÓN</div>
              <div class="col-12 h3">
			No asignada
              </div>
              <div class="col-12"><button class="btn btn-purple btn-sm"type="button" data-toggle="modal" data-target="#m'.$value["icodigoalumno"].'">CAMBIAR CALIFICACIÓN</button></div>
            </div>
              </div>
          </div>

          	<div class="modal fade" id="m'.$value["icodigoalumno"].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	  aria-hidden="true">
	  <div class="modal-dialog modal-sm modal-side modal-top-left" role="document">
	    <div class="modal-content">
	      <div class="modal-header bg-info text-center  text-white"> <p class="h6 text-center">CAMBIA LA CALIFICACIÓN</p>
	        <h4 id="respuesta_alumno"></h4>
	        </button>
	      </div>

	      <div class="modal-body text-center" >

	    <div class="form-inline justify-content-center ">
	<form method="post">
	    <input type="hidden"  value="'.$value["icodigoalumno"].'" name="morro_id">
	    <input type="hidden"  value="'.$materia.'" name="materia_id">
	    <input type="text" class="form-control form-control-lg"  name="nota_update">
	    <br><br> 
	<button class="btn btn-default btn-block" type="submit" name="cambio_calificacion">CAMBIAR</button>
	</form>
	    </div>
	      </div>
	    </div>
	  </div>
	</div>

				';
				}


		else{

				echo'
          <div class="col-12 mt-4">
            <div class="card text-center">
              <div class="card-header strong btn-mdb-color"><div class="row"><div class="col-4">'.$value["vchnombres"].' '.$value["vchapellidos"].'</div><div class="col-4">ID:'.$value["icodigoalumno"].'</div><div class="col-4">NACIO EL: 20/JUN/1993</div></div></div>
            <div class="card-body row ">
              <div class="col-12">CALIFICACIÓN</div>
              <div class="col-12 h1">

              '.$value["fcalificacion"].'
              </div>
              <div class="col-12"><button class="btn btn-purple btn-sm"type="button" data-toggle="modal" data-target="#m'.$value["icodigoalumno"].'">CAMBIAR CALIFICACIÓN</button></div>
            </div>
              </div>
          </div>


          	<div class="modal fade" id="m'.$value["icodigoalumno"].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	  aria-hidden="true">
	  <div class="modal-dialog modal-sm modal-side modal-top-left" role="document">
	    <div class="modal-content">
	      <div class="modal-header bg-info text-center  text-white"> <p class="h6 text-center">CAMBIA LA CALIFICACIÓN</p>
	        <h4 id="respuesta_alumno"></h4>
	        </button>
	      </div>

	      <div class="modal-body text-center" >

	    <div class="form-inline justify-content-center ">
	<form method="post">
	    <input type="hidden"  value="'.$value["icodigoalumno"].'" name="morro_id">
	    <input type="hidden"  value="'.$materia.'" name="materia_id">
	    <input type="text" class="form-control form-control-lg"  name="nota_update">
	    <br><br> 
	<button class="btn btn-default btn-block" type="submit" name="cambio_calificacion">CAMBIAR</button>
	</form>
	    </div>
	      </div>
	    </div>
	  </div>
	</div>

				';
			}		
		}
	}
}
}



	static public function busqueda_alumno_controlador(){
		if (isset($_GET["codigo_materia"])) {
	
			$id_materia = $_GET["codigo_materia"];

			$respuesta=Datos::busqueda_alumno_modelo("cat_alumnos");

			foreach ($respuesta as $key => $value) {


				echo '
          <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
            <div class="card text-center">
              <div class="card-header text-white" style="background: #4A91D8"><strong>Nacido: </strong>'.$value["dtfechanac"].'</div>
            <div class="card-body row ">
              <div class="col-12">
              '.$value["vchnombres"].' '.$value["vchapellidos"].'
              </div>
             </div>
    <div class="card-footer"><button class="btn btn-blue-grey btn-sm" type="button" data-toggle="modal" data-target="#qq'.$value["icodigoalumno"].'">AGREGAR A ESTA MATERIA</button></div>
              </div>
          </div>



<div class="modal fade" id="qq'.$value["icodigoalumno"].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-side modal-bottom-right" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info  text-white"> <p class="h6 text-center uppercase">¿AGREGAR A '.$id_materia.'?</p>
        <h4 id="respuesta_alumno"></h4>
        </button>
      </div>
      <div class="modal-body text-center" >

    <div class="form-inline justify-content-center ">
<form method="post">
    <input type="hidden"  value="'.$id_materia.'" name="id_materia">
    <input type="hidden"  value="'.$value["icodigoalumno"].'" name="id_alumno">
<button class="btn btn-info btn-block" type="submit" name="adda_materia"><i class="far fa-thumbs-up fa-2x"></i></button>
</form>
    </div>
      </div>
    </div>
  </div>
</div>
			';
			}
		}
	}

	static public function back_back(){
		if (isset($_POST["back_back"])) {
			header("location:index.php?go=add_materia");
		}
	}

	static public function back_add_materia(){
		if (isset($_POST["back_add_materia"])) {
			header("location:index.php?go=add_materia");
		}
	}


	static public function agregar_alumno_a_materia_controlador(){
		if (isset($_POST["adda_materia"])) {


			$datos = array('id_alumno' =>$_POST["id_alumno"],
							'id_materia'=>$_POST["id_materia"] );


			$comprobando=Datos::comprueba_duplicado_modelo($datos, "cat_rel_alumno_materia");

			if ($comprobando["cat_alumnos_icodigoalumno"] == $_POST["id_alumno"] && $comprobando["cat_materias_vchcodigomateria"]== $_POST["id_materia"]) {
				
				echo '<div class="alert alert-danger font-weight-bold h4 mb-3 animated fadeInRightBig text-center h5">El alumno ya esta registrado para esta materia, no se pudo agregar</div>';
			}
			else{

				//Añadiendo a la materia este alumno
				$respuesta=Datos::adicion_alumno_materia_moodelo($datos, "cat_rel_alumno_materia");

				if ($respuesta=="success") {
					echo '<div class="alert alert-success font-weight-bold h4 mt-3 mb-3 animated fadeInLeftBig text-center h5">Agregado</div>';
				}
				else{
					echo '<div class="card-header btn-success mt-3 mb-3 animated fadeInRightBig text-center h5">¡¡OCURRIO UN ERROR :(!!</div>';
				}

			}
		}
	}


	static public function query_all_materia_controlador(){

		$respuesta=Datos::query_all_materia_modelo("cat_materias");
		foreach ($respuesta as $key => $value) {
			utf8_decode($value["vchcodigomateria"]);
			utf8_decode($value["vchmateria"]);
			echo '
          <div class="col-lg-4 col-sm-12 mt-4 animated bounceIn" >
            <div class="card text-center">
              <div class="card-header text-white blue-gradient font-weight-bold "><div class="row"><div class="col-lg-6 col-md-12">'.$value["vchmateria"].'</div><div class="col-lg-6 col-md-12">ID:'.$value["vchcodigomateria"].'</div></div></div>
            <div class="card-body row text-center">
              <div class="col-lg-6 col-md-12">
              <a href="index.php?go=agregar_a_materia&codigo_materia='.$value["vchcodigomateria"].'" class="btn btn-info btn-sm font-weight-bold h1" >
              <i class="fa fa-plus" aria-hidden="true">  </i>Alumno</a>
              </div>
              <div class="col-lg-6 col-md-12 ">

			<a href="index.php?go=result_materias&codigo_materia='.$value["vchcodigomateria"].'" class="btn btn-orange btn-sm font-weight-bold h1 " >
			<i class="fa fa-eye" aria-hidden="true">  </i> Notas</a>
              </div>
            </div>
              </div>
          </div>

			';
		}



	}



	static public function query_materia_controlador($query){
	if (isset($_POST["id_materia"])) {
		$query = $_POST["id_materia"];

		$respuesta=Datos::query_materia_modelo($query, "cat_materias");
		foreach ($respuesta as $key => $value) {
			echo '
          <div class="col-lg-4 col-sm-12 mt-4 animated bounceIn" >
            <div class="card text-center">
              <div class="card-header text-white blue-gradient font-weight-bold "><div class="row"><div class="col-lg-6 col-md-12">'.$value["vchmateria"].'</div><div class="col-lg-6 col-md-12">ID:'.$value["vchcodigomateria"].'</div></div></div>
            <div class="card-body row text-center">
              <div class="col-lg-6 col-md-12">
              <a href="index.php?go=agregar_a_materia&codigo_materia='.$value["vchcodigomateria"].'" class="btn btn-info btn-sm font-weight-bold h1" >
              <i class="fa fa-plus" aria-hidden="true">  </i>Alumno</a>
              </div>
              <div class="col-lg-6 col-md-12 ">

			<a href="index.php?go=result_materias&codigo_materia='.$value["vchcodigomateria"].'" class="btn btn-orange btn-sm font-weight-bold h1 " >
			<i class="fa fa-eye" aria-hidden="true">  </i> Notas</a>
              </div>
            </div>
              </div>
          </div>

			';
		}

		
		}

	}

	static public function mis_materias_controlador(){
		if (isset($_GET["codigo"])) {
			$query = $_GET["codigo"];
		

			$respuesta=Datos::mis_materias_modelo($query, "cat_materias");
			if ($respuesta ==null) {
				echo '
			<div class="col-12 justify-content-center mt-4">
				<div class="alert alert-info h3 text-center font-weight-bold">Sin materias</div>
			</div>
				'
				;
			}
			else{
			foreach ($respuesta as $key => $value) {
				echo'





          <div class="col-4 mt-4">
            <div class="card text-center">
              <div class="card-header font-weight-bold h4 text-white" style="background: #178C37">'.$value["vchmateria"].'</div>
            <div class="card-body row ">
              <div class="col-12">CALIFICACIÓN</div>
              <div class="col-12 h1">'.$value["fcalificacion"].'</div>
              <div class="col-12"><button class="btn btn-danger p-2 h1 font-weight-bold" type="button" data-toggle="modal" data-target="#q'.$value["vchcodigomateria"].'">ELIMINAR</button></div>
            </div>
            <div class="card-footer">ID: '.$value["vchcodigomateria"].'</div>
              </div>
          </div>


<div class="modal fade" id="q'.$value["vchcodigomateria"].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-side modal-bottom-right" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger  text-white"> <p class="h6 text-center">¿ELIMINAR '.$value["vchmateria"].'?</p>
        <h4 id="respuesta_alumno"></h4>
        </button>
      </div>
      <div class="modal-body text-center" >

    <div class="form-inline justify-content-center ">
<form method="post">
    <input type="hidden"  value="'.$value["vchcodigomateria"].'" name="id_materia">
    <input type="hidden"  value="'.$value["cat_alumnos_icodigoalumno"].'" name="id_alumno">
<button class="btn btn-danger btn-block" type="submit" name="borrar_materia"><i class="far fa-thumbs-up fa-2x"></i></button>
</form>
    </div>
      </div>
    </div>
  </div>
</div>	

				';
			}
		}
	}

}





static public function borrar_materia_morro(){
	if (isset($_POST["borrar_materia"])) {
		
		$datos = array('codigo_materia' =>$_POST["id_materia"],
						'codigo_alumno'=>$_POST["id_alumno"] );

		$respuesta=Datos::borrar_materia_morro($datos, "cat_rel_alumno_materia");

		if ($respuesta=="success") {
			
			header("location:index.php?go=materia_borrada&codigo=".$_POST["id_alumno"]."");
			ob_end_flush();

		}
		else{
			header("location:index.php?go=materia_no_borrada&codigo=".$_POST["id_alumno"]."");
		}
	}
}


	public function cambio_calificacion_controlador(){
		if (isset($_POST["cambio_calificacion"])) {
			$datos = array('calificacion' =>$_POST["nota_update"],
							'id_alumno' =>$_POST["morro_id"],
							'id_materia'=>$_POST["materia_id"]);
			$id_materia = $_POST["materia_id"];

			$respuesta = Datos::cambio_calificacion_modelo($datos, "cat_rel_alumno_materia");
			if ($respuesta=="success") {
				header("location:index.php?go=nota_actualizada&codigo_materia=".$id_materia."");

			}
			else{
				header("location:index.php?go=nota_no_actualizada&codigo_materia=".$id_materia."");
			}
		}
	}








}




 ?>