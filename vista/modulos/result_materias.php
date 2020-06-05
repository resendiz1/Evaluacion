

<div class="container card mt-5">
	<?php 
if (isset($_GET["go"])) {
	if ($_GET["go"]=="nota_actualizada") {
		echo '<div class="alert alert-success  mt-3 animated fadeInRightBig text-center h5">Calificación actualizada  </div>';
	}
		if ($_GET["go"]=="nota_no_actualizada") {
		echo '<div class="alert alert-danger mt-3 animated fadeInRightBig text-center h5">No se pudo actualizar  </div>';
	}
	}
	 ?>
		<div class="card-header text-center h3 text-white font-weight-bold row" style="background: #52CCB8"  ><div class="col-2 float-left">
			<form method="post"><button class="btn btn-orange redondo p-3" name="back_add_materia" type="submit"><i class="fas fa-arrow-circle-left fa-2x"></i></button></form></div>
		<div class="col-8 mt-4">CAMBIO DE CALIFICACIÓN</div>
		<div class="col-2"></div>
	  </div>




		<div class="card-body row">
			<?php 
			$r = new MvcControlador();
			$r ->  materiacambio_nota_controlador();
			$r -> cambio_calificacion_controlador();
			$r -> back_add_materia();
			 ?>
		</div>
	</div>

