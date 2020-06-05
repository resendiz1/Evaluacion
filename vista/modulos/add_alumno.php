<?php 
$r= new MvcControlador();
$r->redirecciona(); 

 ?>
<div class="container card-body p-0"  >
  <div class="row justify-content-center">
  <img src="https://conalepags.edu.mx/escolares/img/estudiante225x225.png" class="img-fluid" width="130" alt="Alumno">
  </div>
  <div class="card">
<div class="card-header p-0" style="background: #33b8FF"><h4 class="text-white text-center font-weight-bold">BUSQUEDA DE ALUMNO</h4></div>
    <div class="card-body" style="background: #33A2FF">
      <div class="row text-center">
    <div class="col-lg-7 col-md-4 form-inline">
    <label class="sr-only" for="buscar_morro"></label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa fa-search"></i></div>
        </div>
        <input type="text" class="form-control py-0" id="buscar_morro" placeholder="Buscar ...">
      </div>
    </div>
          
  
  <div class="col-lg-2 col-md-4"> <button class="btn btn-success p-3" type="button" data-toggle="modal" data-target="#basicExampleModal3"><i class="fa fa-user-plus" aria-hidden="true"></i></button></div>
  <div class="col-lg-3 col-md-4"><form method="post"><button class="btn btn-danger p-3 h3" type="submit" name="ir_materia">Buscar y cargar materias</button></div></form>
</div>
</div>
</div>



<div class="card mt-3">
  <div class="card-body border border-light p-5">
  
<div class="row" id="resultados_alumnos">
<?php 
$alumno = new MvcControlador();
$alumno -> query_all_alumnos_controlador();
 ?>

</div>
</div>
</div>














<!-- Central Modal Small -->
<div class="modal fade" id="basicExampleModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header text-center justify-content-center">
        <h3 class="text-info font-weight-bold">Agregar alumno</h3>
      </div>

      <div class="modal-body text-center" >
     <h4 id="respuesta_alumno"></h4>
    <input type="text" maxlength="4" class="form-control mb-4" id="codigo" placeholder="Codigo: 1234">

    <input type="text"  class="form-control mb-4" id="nombres" placeholder="Nombre(s)">

    <input type="text"  class="form-control mb-4" id="apellidos" placeholder="Apellidos">
    
    <label><strong>FECHA DE NACIMIENTO</label>
    <input type="date"  class="form-control mb-4" id="fecha" placeholder="Fecha de nacimiento">
 
    <button class="btn btn-info btn-block" id="enviar_alumno" type="submit">AGREGAR </button>
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->
















<br><br><br><br>
</div>