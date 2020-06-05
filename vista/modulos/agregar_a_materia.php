<div class="container mt-4">
	<div class="card">
		<div class="card-header text-center text-white h3" style="background: #4A91D8"><form method="post"><button class="btn btn-orange p-3 redondo float-left" name="back_back" type="submit"><i class="fas fa-arrow-circle-left fa-2x"></i></button></form> <div class="h3 mt-2"> ALUMNOS PARA AGREGAR</div></div>

<?php 	
$r = new MvcControlador();
$r-> agregar_alumno_a_materia_controlador();

 ?>
		
<div class="row p-3">

<?php 	
$r = new MvcControlador();
$r-> busqueda_alumno_controlador();
$r-> back_back();
 ?>

</div>








</div>








			
		</div>
