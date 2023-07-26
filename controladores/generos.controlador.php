<?php


class ControladorGeneros{

	/*=============================================
	            REGISTRO DE GENERO            
	=============================================*/
	
	static public function ctrCrearGenero(){

		if (isset($_POST["nuevoNombre"])) {
			
				
				$tabla = "generos";

				$datos = array("nombre" => $_POST["nuevoNombre"]);

				$respuesta = ModeloGeneros::mdlIngresarGenero($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>

					swal({

						type: "success",
						title: "El género ha sido creado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false							

					}).then((result)=>{

						if(result.value){

							window.location = "generos";
							
							}

						});

				</script>';

				

			}else{

				echo '<script>

					swal({

						type: "error",
						title: "El género no puede ir vacío",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false							

					}).then((result)=>{

						if(result.value){

							window.location = "generos";
							
							}

						})

				</script>';

			}
		}

	}


		/*=============================================
        MOSTRAR GENEROS            
		=============================================*/

		static public function ctrMostrarGeneros($item, $valor){

			$tabla = "generos";

			$respuesta = ModeloGeneros::mdlMostrarGeneros($tabla, $item, $valor);

			return $respuesta;

			//var_dump($valor);
		}


		



		/*=============================================
		EDITAR GENERO
		=============================================*/

		static public function ctrEditarGenero(){

			if (isset($_POST["editarGenero"])) {
				
				if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["editarGenero"])) {
					
					$tabla = "generos";

					$datos = array("nombre" => $_POST["editarGenero"], "id" => $_POST["idGenero"]);

					$respuesta = ModeloGeneros::mdlEditarGenero($tabla, $datos);

					if ($respuesta == "ok") {
						
						echo '<script>

						swal({
							type: "success",
							title: "El género ha sido modificado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
								if(result.value){

									window.location = "generos";										
								}
							})

					</script>';

					}

				}else{

					echo '<script>

						swal({
							type: "error",
							title: "El género no puede ir vacío o llevar caracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
								if(result.value){

									window.location = "generos";										
								}
							})

					</script>';
				}
			}
		}


		/*=============================================
		            BORRAR GENERO
		=============================================*/

		static public function ctrBorrarGenero(){

			if (isset($_GET["idGenero"])) {
				
				$tabla = "generos";
				$datos = $_GET["idGenero"];

				$respuesta = ModeloGeneros::mdlBorrarGenero($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>

						swal({
							type: "success",
							title: "El género ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result) => {

								if(result.value){

									window.location = "generos";
								}
							})

					</script>';
				}
			}
		}

}