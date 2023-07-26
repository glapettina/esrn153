<?php

	class ControladorServicios{

		/*=============================================
		CREAR SERVICIO          
		=============================================*/

		static public function ctrCrearServicio(){

			if (isset($_POST["nuevoProblema"])) {
				
				
					
					
					$tabla = "servicios";

					$fecha = $_POST["datepicker3"];
           			$date = str_replace('/', '-', $fecha);
          			$fecha_final = date("Y-m-d", strtotime($date));

					$datos = array("fecha_servicio" => $fecha_final, 
								"id_netbook" => $_POST["nuevaNetbook"],
								"reclamo" => $_POST["nuevoReclamo"],
								"problema" => $_POST["nuevoProblema"],
								"solucion" => $_POST["nuevaSolucion"]);


					$respuesta = ModeloServicios::mdlCrearServicio($tabla, $datos);

					//var_dump($respuesta);


					if ($respuesta == "ok") {
						
						echo '<script>

						swal({
							type: "success",
							title: "El servicio ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
								if(result.value){

									window.location = "servicios";										
								}
							})

					</script>';

					}

				}
		}

		/*=============================================
		MOSTRAR SERVICIOS            
		=============================================*/		

		static public function ctrMostrarServicios($item, $valor){

			$tabla = "servicios";


			$respuesta = ModeloServicios::mdlMostrarServicios($item, $valor, $tabla);

			return $respuesta;

		}

		/*=============================================
		EDITAR SERVICIO 
		=============================================*/

		static public function ctrEditarServicio(){

			if (isset($_POST["editarProblema"])) {
				
				
					
					$tabla = "servicios";

					$datos = array("reclamo" => $_POST["editarReclamo"],
									"problema" => $_POST["editarProblema"],
									"solucion" => $_POST["editarSolucion"],
									"id_servicio" => $_POST["idServicio"]);


					$respuesta = ModeloServicios::mdlEditarServicio($tabla, $datos);


					if ($respuesta == "ok") {
						
						echo '<script>

						swal({
							type: "success",
							title: "El servicio ha sido modificado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
								if(result.value){

									window.location = "servicios";										
								}
							})

					</script>';

					}

				}
			}
		

		/*=============================================
		BORRAR SERVICIO
		=============================================*/

		static public function ctrBorrarServicio(){

			if (isset($_GET["idServicio"])) {

				$tabla = "servicios";				
				
				$datos = $_GET["idServicio"];

				$respuesta = ModeloServicios::mdlBorrarServicio($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>

						swal({
							type: "success",
							title: "El servicio ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result) => {

								if(result.value){

									window.location = "servicios";
								}
							})

					</script>';
				}
			}
		}



		/*=============================================
        LISTAR HISTORIAL SERVICIOS         
		=============================================*/

		static public function ctrServicios($itemServi, $valorServi){

			$tabla = "servicios";


			$respuesta = ModeloServicios::mdlHistorial($tabla, $itemServi, $valorServi);

			//var_dump($respuesta);


			return $respuesta;

		}

	}