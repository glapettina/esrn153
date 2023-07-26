/*=============================================
EDITAR LIBRO
=============================================*/


$(".tablas").on("click", ".btnEditarLibro", function(){	

	var idLibro = $(this).attr("idLibro");

	var datos = new FormData();
	datos.append("idLibro", idLibro);


	$.ajax({
		url: "ajax/libros.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			var datosGenero = new FormData();
			datosGenero.append("idGenero", respuesta["id_genero"]);

			$.ajax({
				url: "ajax/generos.ajax.php",
				method: "POST",
				data: datosGenero,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(respuesta){

					$("#editarGenero").val(respuesta["id"]);
					$("#editarGenero").html(respuesta["nombre"]);
				}

			})

					$("#idLibro").val(respuesta["id"]);
					$("#editarCodigo").val(respuesta["codigo"]);
					$("#editarNombre").val(respuesta["nombre"]);
					$("#editarAutor").val(respuesta["autor"]);
					$("#editarEditorial").val(respuesta["editorial"]);
					$("#editarCantidad").val(respuesta["cantidad"]);
					$("#editarUbicacion").val(respuesta["ubicacion"]);
					

		}
	})

	
})


/*=============================================
ACTIVAR LIBRO            
=============================================*/

$(document).on("click", ".btnActivarLibro", function(){

	var idLibro = $(this).attr("idLibro");
	var estadoLibro = $(this).attr("estadoLibro");


	var datos = new FormData();
	datos.append("activarId", idLibro);
	datos.append("activarLibro", estadoLibro);

	$.ajax({

		url: "ajax/libros.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){

			if (window.matchMedia("(max-width:767px)").matches) {

				swal({
					title: "El libro ha sido actualizado",
					type: "success",
					confirmButtonText: "Cerrar"
				}).then(function(result){

					if (result.value) {

						window.location = "libros";
					}
				});
			}
		}
	})

	if (estadoLibro == 0) {

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoLibro', 1);

	}else{

		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html('Activado');
		$(this).attr('estadoLibro', 0);
	}
})



/*=============================================
ELIMINAR LIBRO            
=============================================*/


$(".tablas").on("click", ".btnEliminarLibro", function(){		

	var idLibro = $(this).attr("idLibro");


	swal({
		title: 'Está seguro de borrar el libro?',
		text: "Si no lo está puede cancelar la acción",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar libro'
		}).then((result)=>{

			if (result.value) {

				window.location = "index.php?idLibro="+idLibro;
			}
		})
})