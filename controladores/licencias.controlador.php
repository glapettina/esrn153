<?php


class ControladorLicencias{

	/*=============================================
	REGISTRO DE LICENCIA            
	=============================================*/
	
	static public function ctrCrearLicencia(){

		if (isset($_POST["nuevoDocente"])) {
			
				
				$tabla = "licencias";

				$fecha1 = $_POST["datepicker"];
           		$date = str_replace('/', '-', $fecha1);
          		$fecha_inicial = date("Y-m-d", strtotime($date));

          		$fecha2 = $_POST["datepicker2"];
           		$date = str_replace('/', '-', $fecha2);
          		$fecha_final = date("Y-m-d", strtotime($date));

          		$array = explode('/', $_SESSION["periodo"]);
          		$anio = $array[1];


				$datos = array("id_usuario" => $_POST["nuevoDocente"], 
								"id_articulo" => $_POST["nuevoArticulo"],
								"desde" => $fecha_inicial,
								"hasta" => $fecha_final,
								"anio" => $anio);

				$respuesta = ModeloLicencias::mdlIngresarLicencia($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>

					swal({

						type: "success",
						title: "La licencia ha sido creada correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false							

					}).then((result)=>{

						if(result.value){

							window.location = "licencias";
							
							}

						});

				</script>';

				

			}else{

				echo '<script>

					swal({

						type: "error",
						title: "La licencia no puede ir vacía",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false							

					}).then((result)=>{

						if(result.value){

							window.location = "licencias";
							
							}

						})

				</script>';

			}
		}

	}


		/*=============================================
        MOSTRAR LICENCIAS            
		=============================================*/

		static public function ctrMostrarLicencias($item, $valor, $verifica){

			$tabla = "licencias";

			$respuesta = ModeloLicencias::mdlMostrarLicencias($tabla, $item, $valor, $verifica);

			return $respuesta;

			//var_dump($valor);
		}


		/*=============================================
		BORRAR LICENCIA
		=============================================*/

		static public function ctrBorrarLicencia(){

			if (isset($_GET["idLicencia"])) {
				
				$tabla = "licencias";
				$datos = $_GET["idLicencia"];

				$respuesta = ModeloLicencias::mdlBorrarLicencia($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>

						swal({
							type: "success",
							title: "La licencia ha sido borrada correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result) => {

								if(result.value){

									window.location = "licencias";
								}
							})

					</script>';
				}
			}
		}
		

}