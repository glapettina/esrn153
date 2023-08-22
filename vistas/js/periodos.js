/*=============================================
				EDITAR PERÍODO            
=============================================*/

$(".btnEditarPeriodo").click(function(){


	var idPeriodo = $(this).attr("idPeriodo");

	var datos = new FormData();
	datos.append("idPeriodo", idPeriodo);

	$.ajax({

		url: "ajax/periodos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){


			$("#editarPeriodo").val(respuesta["nombre"]);
			$("#idPeriodo").val(respuesta["id_periodo"]);

		}
	})
})


/*=============================================
				ELIMINAR PERÍODO            
=============================================*/

$(document).on("click", ".btnEliminarPeriodo", function(){


	var idPeriodo = $(this).attr("idPeriodo");

	swal({
		title: 'Está seguro de borrar el período?',
		text: "Si no lo está puede cancelar la acción",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar sección'
		}).then((result)=>{

			if (result.value) {

				window.location = "index.php?ruta=periodos&idPeriodo="+idPeriodo;
			}
		})
})


/*=============================================
				ACTIVAR PERÍODO            
=============================================*/

$(document).on("click", ".btnActivarPeriodo", function(){

	var idPeriodo = $(this).attr("idPeriodo");
	var estadoPeriodo = $(this).attr("estadoPeriodo");

	var datos = new FormData();
	datos.append("activarId", idPeriodo);
	datos.append("activarPeriodo", estadoPeriodo);

	$.ajax({

		url: "ajax/periodos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){

			if (window.matchMedia("(max-width:767px)").matches) {

				swal({
					title: "El período ha sido actualizado",
					type: "success",
					confirmButtonText: "Cerrar"
				}).then(function(result){

					if (result.value) {

						window.location = "periodos";
					}
				});
			}
		}
	})

	if (estadoPeriodo == 0) {

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoPeriodo', 1);

	}else{

		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html('Activado');
		$(this).attr('estadoPeriodo', 0);
	}
})

