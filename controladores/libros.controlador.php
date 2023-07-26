<?php

	class ControladorLibros{

		/*=============================================
		CREAR LIBRO          
		=============================================*/

		static public function ctrCrearLibro(){

			if (isset($_POST["nuevoNombre"])) {
				
				if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])) {
					
					$tabla = "libros";

					$datos = array("codigo" => $_POST["nuevoCodigo"], 
								"nombre" => $_POST["nuevoNombre"],
								"id_genero" => $_POST["nuevoGenero"],
								"autor" => $_POST["nuevoAutor"],
								"editorial" => $_POST["nuevaEditorial"],
								"cantidad" => $_POST["nuevaCantidad"],
								"ubicacion" => $_POST["nuevaUbicacion"]);


					$respuesta = ModeloLibros::mdlCrearLibro($tabla, $datos);

					if ($respuesta == "ok") {
						
						echo '<script>

						swal({
							type: "success",
							title: "El libro ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
								if(result.value){

									window.location = "libros";										
								}
							})

					</script>';

					}

				}else{

					echo '<script>

						swal({
							type: "error",
							title: "El libro no puede ir vacío o llevar caracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
								if(result.value){

									window.location = "libros";										
								}
							})

					</script>';
				}
			}
		}

		/*=============================================
		MOSTRAR LIBROS            
		=============================================*/		

		static public function ctrMostrarLibros($item, $valor){

			$tabla = "libros";


			$respuesta = ModeloLibros::mdlMostrarLibros($item, $valor, $tabla);

			return $respuesta;

		}

		/*=============================================
		EDITAR LIBRO 
		=============================================*/

		static public function ctrEditarLibro(){

			if (isset($_POST["editarNombre"])) {
				
				if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {


					$tabla = "libros";
					

					$datos = array("codigo" => $_POST["editarCodigo"], "nombre" => $_POST["editarNombre"], "autor" => $_POST["editarAutor"], "editorial" => $_POST["editarEditorial"], "cantidad" => $_POST["editarCantidad"], "ubicacion" => $_POST["editarUbicacion"], "id" => $_POST["idAlumno"]);


					$respuesta = ModeloLibros::mdlEditarLibro($tabla, $datos);

					if ($respuesta == "ok") {
						
						echo '<script>

						swal({
							type: "success",
							title: "El libro ha sido modificado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
								if(result.value){

									window.location = "libros";										
								}
							})

					</script>';

					}

				}else{

					echo '<script>

						swal({
							type: "error",
							title: "El libro no puede ir vacío o llevar caracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
								if(result.value){

									window.location = "libros";										
								}
							})

					</script>';
				}
			}
		}

		/*=============================================
		BORRAR LIBRO
		=============================================*/

		static public function ctrBorrarLibro(){

			if (isset($_GET["idLibro"])) {
				
				$tabla = "libros";
				
				$datos = $_GET["idLibro"];

				$respuesta = ModeloLibros::mdlBorrarLibro($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>

						swal({
							type: "success",
							title: "El libro ha sido borrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result) => {

								if(result.value){

									window.location = "libros";
								}
							})

					</script>';
				}
			}
		}

	}