
/*=============================================
ELIMINAR LICENCIA            
=============================================*/

$(document).on("click", ".btnEliminarLicencia", function(){


	var idLicencia = $(this).attr("idLicencia");

	swal({
		title: 'Está seguro de borrar la licencia?',
		text: "Si no lo está puede cancelar la acción",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar licencia'
		}).then((result)=>{

			if (result.value) {

				window.location = "index.php?ruta=licencias&idLicencia="+idLicencia;
			}
		})
})


