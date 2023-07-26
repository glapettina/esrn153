<?php


class ControladorArticulos{

	/*=============================================
	            REGISTRO DE ARTICULO            
	=============================================*/
	
	static public function ctrCrearArticulo(){

		if (isset($_POST["nuevoArticulo"])) {
			
				
				$tabla = "articulos";

				$datos = array("articulo" => $_POST["nuevoArticulo"], 
								"descripcion" => $_POST["nuevaDescripcion"]);

				$respuesta = ModeloArticulos::mdlIngresarArticulo($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>

					swal({

						type: "success",
						title: "El artículo ha sido creado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false							

					}).then((result)=>{

						if(result.value){

							window.location = "articulos";
							
							}

						});

				</script>';

				

			}else{

				echo '<script>

					swal({

						type: "error",
						title: "El artículo no puede ir vacío",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false							

					}).then((result)=>{

						if(result.value){

							window.location = "articulos";
							
							}

						})

				</script>';

			}
		}

	}


		/*=============================================
        MOSTRAR ARTICULOS            
		=============================================*/

		static public function ctrMostrarArticulos($item, $valor){

			$tabla = "articulos";

			$respuesta = ModeloArticulos::mdlMostrarArticulos($tabla, $item, $valor);

			return $respuesta;
		}


		/*=============================================
		EDITAR ARTICULO
		=============================================*/

		static public function ctrEditarArticulo(){

			if (isset($_POST["editarArticulo"])) {
				
				if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["editarArticulo"])) {
					
					$tabla = "articulos";

					$datos = array("articulo" => $_POST["editarArticulo"], "descripcion" => $_POST["editarDescripcion"], "id_articulo" => $_POST["idArticulo"]);

					$respuesta = ModeloArticulos::mdlEditarArticulo($tabla, $datos);

					if ($respuesta == "ok") {
						
						echo '<script>

						swal({
							type: "success",
							title: "El artículo ha sido modificado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
								if(result.value){

									window.location = "articulos";										
								}
							})

					</script>';

					}

				}else{

					echo '<script>

						swal({
							type: "error",
							title: "El artículo no puede ir vacío o llevar caracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
								if(result.value){

									window.location = "articulos";										
								}
							})

					</script>';
				}
			}
		}


		/*=============================================
		BORRAR ARTICULO
		=============================================*/

		static public function ctrBorrarArticulo(){

			if (isset($_GET["idArticulo"])) {
				
				$tabla = "articulos";
				$datos = $_GET["idArticulo"];

				$respuesta = ModeloArticulos::mdlBorrarArticulo($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>

						swal({
							type: "success",
							title: "El artículo ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result) => {

								if(result.value){

									window.location = "articulos";
								}
							})

					</script>';
				}
			}
		}

}