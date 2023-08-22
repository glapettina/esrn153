<?php


class ControladorPeriodos{

	/*=============================================
	            REGISTRO DE PERÍODO            
	=============================================*/
	
	static public function ctrCrearPeriodo(){

		if (isset($_POST["nuevoPeriodo"])) {
			
				
				$tabla = "periodos";

				$datos = array("nombre" => $_POST["nuevoPeriodo"]);

				$respuesta = ModeloPeriodos::mdlIngresarPeriodo($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>

					swal({

						type: "success",
						title: "El período ha sido creado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false							

					}).then((result)=>{

						if(result.value){

							window.location = "periodos";
							
							}

						});

				</script>';

				

			}else{

				echo '<script>

					swal({

						type: "error",
						title: "El período no puede ir vacío",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false							

					}).then((result)=>{

						if(result.value){

							window.location = "periodos";
							
							}

						})

				</script>';

			}
		}

	}


		/*=============================================
        				MOSTRAR PERÍODOS            
		=============================================*/

		static public function ctrMostrarPeriodos($item, $valor, $ingreso){

			$tabla = "periodos";

			$respuesta = ModeloPeriodos::mdlMostrarPeriodos($tabla, $item, $valor, $ingreso);

			return $respuesta;
		}


		/*=============================================
						EDITAR PERÍODO
		=============================================*/

		static public function ctrEditarPeriodo(){

			if (isset($_POST["editarPeriodo"])) {
				
				if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. \/]+$/', $_POST["editarPeriodo"])) {
					
					$tabla = "periodos";

					$datos = array("nombre" => $_POST["editarPeriodo"], "id_periodo" => $_POST["idPeriodo"]);

					$respuesta = ModeloPeriodos::mdlEditarPeriodo($tabla, $datos);

					if ($respuesta == "ok") {
						
						echo '<script>

						swal({
							type: "success",
							title: "El período ha sido modificado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
								if(result.value){

									window.location = "periodos";										
								}
							})

					</script>';

					}

				}else{

					echo '<script>

						swal({
							type: "error",
							title: "El período no puede ir vacío o llevar caracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
								if(result.value){

									window.location = "periodos";										
								}
							})

					</script>';
				}
			}
		}


		/*=============================================
					BORRAR PERÍODO
		=============================================*/

		static public function ctrBorrarPeriodo(){

			if (isset($_GET["idPeriodo"])) {
				
				$tabla = "periodos";
				$datos = $_GET["idPeriodo"];

				$respuesta = ModeloPeriodos::mdlBorrarPeriodo($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>

						swal({
							type: "success",
							title: "El período ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result) => {

								if(result.value){

									window.location = "periodos";
								}
							})

					</script>';
				}
			}
		}

}