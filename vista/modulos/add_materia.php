<?php 
$r= new MvcControlador();
$r->redirecciona(); 
 ?>

<div class="container card-body  border border-light p-1" >
  <div class="row justify-content-center">
  <img src="https://pngimage.net/wp-content/uploads/2018/06/lengua-asignatura-png-2.png" class="img-fluid" width="130" alt="Alumno">
  </div>
  <div class="card-header p-0" style="background:#AB52EE "><h4 class="text-center text-white font-weight-bold">BUSCAR Y CARGAR MATERIAS</h4></div>
  <div class="card p-0">
    <div class="card-body" style="background:#AB52CC">
      <div class="row text-center">
           <div class="col-lg-7 col-md-4 form-inline">
    <div class="col-lg-7 col-md-4 form-inline">
    <label class="sr-only" for="buscar_materia"></label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa fa-search"></i></div>
        </div>
        <input type="text" class="form-control py-0" id="buscar_materia" placeholder="Buscar ...">
      </div>
    </div>
       </div>   
  <div class="col-lg-2 col-md-4"> <button class="btn btn-success  p-3" type="button" name="fuck bitch" data-toggle="modal" data-target="#basicExampleModal3"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
  <div class="col-lg-3 col-md-4"><form method="post"><button class="btn btn-danger h4 font-weight-bold  p-3" name="ir_alumno" type="submit">Buscar y agregar alumnos</button></form>
</div>
</div>
</div>



  <div class="card mt-3">
    <div class="card-body">
<div class="row" id="resulta_materia"> 
<?php 
$resultado = new MvcControlador();
$resultado -> query_all_materia_controlador();
 ?>
</div>      
    </div>
  </div> 
</div>

























<!-- Central Modal Small -->
<div class="modal fade" id="basicExampleModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header justify-content-center p-1">
 <p class="h4 text-info font-weight-bold " >Agregar materia</p>
      </div>

      <div class="modal-body" >
<!-- Default form subscription -->
 <h4 id="respuesta_materia"></h4>
 <div class="text-center border border-light p-5">
    <input type="text" id="codigo_materia" maxlength="5"  class="form-control mb-4" placeholder="Codigo: qwert">

    <input type="text"  id="nombre_materia" maxlength="30"  class="form-control mb-4" placeholder="Nombre">

    <button class="btn btn-info btn-block" type="submit" id="add_materia">AGREGAR </button>
</div>
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->



<br><br><br><br>
</div>