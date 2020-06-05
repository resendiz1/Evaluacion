<div class="container border border-light p-3 mt-5"  >
  <div class="card">
    <div class="card-header"  style="background: #4A91D8"> <form method="post" class=" float-left"><button class="btn btn-orange redondo p-3" name="ir_alumno" type="submit"><i class="fas fa-arrow-circle-left fa-2x" aria-hidden="true">  </i> </button> </form>

      <h2 class="text-white text-center font-weight-bold mt-3">MATERIAS DEL ALUMNO</h2></div>
    <div class="card-body">





  
<div class="row">

	<?php 
$a= new  MvcControlador();
$a -> mis_materias_controlador();
$a->borrar_materia_morro();
$a->redirecciona(); 
?>







    </div>
    </div>
</div>
</div>



