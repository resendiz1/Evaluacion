



$("#buscar_materia").change(function(){

	var query = $(this).val();
	var url = "vista/modulos/add_ajax.php";
	var datos = new FormData();
	datos.append("id_materia", query);

	$.ajax({
		type: "POST",
		url: url,
		data: datos,
		cache: false,
		contentType:false,
		processData: false,
		beforeSend: function(){
			$("#resulta_materia").before('<div class="row justify-content-center"><img src="img/Loading.gif" id="loading" width="80px">   </div>    ');
		},
		success: function(datos){
			$("#resulta_materia").html(datos);
			$("#loading").remove();
		}	
	})
})






$("#buscar_morro").change(function(){
	var query = $(this).val();
	var url = "vista/modulos/add_ajax.php";
	var datos = new FormData();

	datos.append("query", query);
	$.ajax({
		type:"POST",
		url:url,
		data:datos,
		cache: false,
		contentType:false,
		processData:false,
		beforeSend:function(){
		 $("#resultados_alumnos").before('<div class="row text-center justify-content-center"><img src="img/Loading.gif" id="loading" width="200px"></div> ');
		$("#resultados_alumnos").html("");
		},
		success:function(datos){
			$("#resultados_alumnos").html(datos);
			$("#loading").remove();

		}
	})

})









//Enviando los datos de las materia para su registro

$("#add_materia").click(function(){

	var codigo_materia = $("#codigo_materia").val();
	var nombre_materia = $("#nombre_materia").val();
	var url ="vista/modulos/add_ajax.php";

	var datos = new FormData();
	datos.append("codigo_materia", codigo_materia);
	datos.append("nombre_materia", nombre_materia);


	$.ajax({
		type:"POST",
		url:url,
		data:datos,
		cache: false,
		contentType: false,
		processData: false,
		beforeSend: function(){
			$("#respuesta_materia").html('<div class="row justify-content-center"><img src="img/Loading.gif" width="50"</div>');
		},
		success: function(datos){
			$("#respuesta_materia").html(datos);
		}
	})

})




//Envio de datos del alumno al archivo PHP

$("#enviar_alumno").click(function(){

	var codigo = $("#codigo").val();
	var nombres = $("#nombres").val();
	var apellidos = $("#apellidos").val();
	var fecha = $("#fecha").val();
	var url ="vista/modulos/add_ajax.php";


	var datos = new FormData();

	datos.append("codigo", codigo);
	datos.append("nombres", nombres);
	datos.append("apellidos", apellidos);
	datos.append("fecha", fecha);


	$.ajax({
		type:"POST",
		url:url,
		data: datos,
		cache:false,
		contentType:false,
		processData: false, 

		beforeSend: function(){
			$("#respuesta_alumno").html('<div class="row justify-content-center"><img src="img/Loading.gif" width="50"></div>');
		},
		success: function(datos)
		{
				$("#respuesta_alumno").html(datos);
				
		}
			
		
	});

})



//Envio de ID de la materia para su localización

$("#buscar_alumno").keyup(function(){

	var busqueda = $("#buscar_alumno").val();
	var url ="vista/modulos/add_ajax.php";

	var datos = new FormData();

	datos.append("buscar_alumno", busqueda);

	$.ajax({
		type: "POST",
		url:url,
		data:datos,
		cache:false,
		contentType: false,
		processData: false,
		success: function(datos){
			$("#resultados_alumnos").html(datos);
		}

	})

})
