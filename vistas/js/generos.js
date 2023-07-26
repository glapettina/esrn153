/*=============================================
EDITAR GENERO            
=============================================*/


$(".tablas").on("click", ".btnEditarGenero", function(){	

	var idGenero = $(this).attr("idGenero");

	var datos = new FormData();
	datos.append("idGenero", idGenero);

	$.ajax({

		url: "ajax/generos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){


			$("#editarGenero").val(respuesta["nombre"]);
			$("#idGenero").val(respuesta["id"]);

		}
	})
})


/*=============================================
ELIMINAR GENERO            
=============================================*/


$(".tablas").on("click", ".btnEliminarGenero", function(){	

	var idGenero = $(this).attr("idGenero");

	swal({
		title: 'Está seguro de borrar el género?',
		text: "Si no lo está puede cancelar la acción",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar sección'
		}).then((result)=>{

			if (result.value) {

				window.location = "index.php?ruta=generos&idGenero="+idGenero;
			}
		})
})


/*=============================================
ACTIVAR GENERO            
=============================================*/

$(document).on("click", ".btnActivarGenero", function(){

	var idGenero = $(this).attr("idGenero");
	var estadoGenero = $(this).attr("estadoGenero");


	var datos = new FormData();
	datos.append("activarId", idGenero);
	datos.append("activarGenero", estadoGenero);

	$.ajax({

		url: "ajax/generos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){

			if (window.matchMedia("(max-width:767px)").matches) {

				swal({
					title: "El género ha sido actualizado",
					type: "success",
					confirmButtonText: "Cerrar"
				}).then(function(result){

					if (result.value) {

						window.location = "generos";
					}
				});
			}
		}
	})

	if (estadoGenero == 0) {

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoGenero', 1);

	}else{

		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html('Activado');
		$(this).attr('estadoGenero', 0);
	}
})

