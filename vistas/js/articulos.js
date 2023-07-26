/*=============================================
EDITAR ARTICULO            
=============================================*/

$(".btnEditarArticulo").click(function(){


	var idArticulo = $(this).attr("idArticulo");

	var datos = new FormData();
	datos.append("idArticulo", idArticulo);

	$.ajax({

		url: "ajax/articulos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){


			$("#editarArticulo").val(respuesta["n_articulo"]);
			$("#editarDescripcion").val(respuesta["descripcion"]);
			$("#idArticulo").val(respuesta["id_articulo"]);

		}
	})
})


/*=============================================
ELIMINAR ARTICULO            
=============================================*/

$(document).on("click", ".btnEliminarArticulo", function(){


	var idArticulo = $(this).attr("idArticulo");

	swal({
		title: 'Está seguro de borrar el artículo?',
		text: "Si no lo está puede cancelar la acción",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar sección'
		}).then((result)=>{

			if (result.value) {

				window.location = "index.php?ruta=articulos&idArticulo="+idArticulo;
			}
		})
})


/*=============================================
ACTIVAR ARTICULO            
=============================================*/

$(document).on("click", ".btnActivarArticulo", function(){

	var idArticulo = $(this).attr("idArticulo");
	var estadoArticulo = $(this).attr("estadoArticulo");


	var datos = new FormData();
	datos.append("activarId", idArticulo);
	datos.append("activarArticulo", estadoArticulo);

	$.ajax({

		url: "ajax/articulos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){

			if (window.matchMedia("(max-width:767px)").matches) {

				swal({
					title: "El artículo ha sido actualizado",
					type: "success",
					confirmButtonText: "Cerrar"
				}).then(function(result){

					if (result.value) {

						window.location = "articulos";
					}
				});
			}
		}
	})

	if (estadoArticulo == 0) {

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoArticulo', 1);

	}else{

		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html('Activado');
		$(this).attr('estadoArticulo', 0);
	}
})

