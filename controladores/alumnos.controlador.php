<?php

	class ControladorAlumnos{

		/*=============================================
		CREAR ALUMNO          
		=============================================*/

		static public function ctrCrearAlumno($tabla,$curso){

			if (isset($_POST["nuevoNombre"])) {
				
				if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])) {
					
					

					$datos = array("documento" => $_POST["nuevoDocumento"], 
								"nombre" => $_POST["nuevoNombre"],
								"id_curso" => $_POST["nuevoCurso"],
								"periodo" => $_SESSION["periodo"],
								"id_usuario" => $_SESSION["id"]);


					$respuesta = ModeloAlumnos::mdlCrearAlumno($tabla, $datos);

					if ($respuesta == "ok") {
						
						echo '<script>

						swal({
							type: "success",
							title: "El alumno ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
								if(result.value){

									window.location = "'.$curso.'";										
								}
							})

					</script>';

					}

				}else{

					echo '<script>

						swal({
							type: "error",
							title: "El alumno no puede ir vacío o llevar caracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
								if(result.value){

									window.location = "'.$curso.'";										
								}
							})

					</script>';
				}
			}
		}

		/*=============================================
		MOSTRAR ALUMNOS            
		=============================================*/		

		static public function ctrMostrarAlumnos($item, $valor, $tabla){			


			$respuesta = ModeloAlumnos::mdlMostrarAlumnos($item, $valor, $tabla);

			return $respuesta;

		}

		/*=============================================
		EDITAR ALUMNO 
		=============================================*/

		static public function ctrEditarAlumno($tabla,$curso){

			if (isset($_POST["editarNombre"])) {
				
				if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {
					
					

					$datos = array("documento" => $_POST["editarDocumento"], "nombre" => $_POST["editarNombre"], "id" => $_POST["idAlumno"]);


					$respuesta = ModeloAlumnos::mdlEditarAlumno($tabla, $datos);

					if ($respuesta == "ok") {
						
						echo '<script>

						swal({
							type: "success",
							title: "El alumno ha sido modificado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
								if(result.value){

									window.location = "'.$curso.'";										
								}
							})

					</script>';

					}

				}else{

					echo '<script>

						swal({
							type: "error",
							title: "El alumno no puede ir vacío o llevar caracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
								if(result.value){

									window.location = "'.$curso.'";										
								}
							})

					</script>';
				}
			}
		}

		/*=============================================
		BORRAR ALUMNO
		=============================================*/

		static public function ctrBorrarAlumno($tabla,$curso){

			if (isset($_GET["idAlumno"])) {
				
				
				$datos = $_GET["idAlumno"];

				$respuesta = ModeloAlumnos::mdlBorrarAlumno($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>

						swal({
							type: "success",
							title: "El alumno ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result) => {

								if(result.value){

									window.location = "'.$curso.'";
								}
							})

					</script>';
				}
			}
		}

	}