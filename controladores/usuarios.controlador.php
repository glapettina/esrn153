<?php


class ControladorUsuarios{

	/*=============================================
	            INGRESO DE USUARIO            
	=============================================*/
	
	static public function ctrIngresoUsuario(){

		if (isset($_POST["ingUsuario"])) {
			
			if (preg_match('/^[a-zA-Z0-9_\-.@]+$/', $_POST["ingUsuario"]) &&
				preg_match('/^[a-zA-Z0-9*]+$/', $_POST["ingPassword"])) {

				$encriptar = crypt($_POST["ingPassword"], '$2a$07$usesomesillystringforsalt$');
				
				$tabla = "usuarios";

				$item = "usuario";
				$valor = $_POST["ingUsuario"];

				$periodo = $_POST["periodo"];

				$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

				if (is_array($respuesta) && $respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar) {

					if ($respuesta["estado"] == 1) {
						
						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["usuario"] = $respuesta["usuario"];
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["perfil"] = $respuesta["perfil"];
						$_SESSION["movilidad"] = $respuesta["movilidad"];
						$_SESSION["periodo"] = $periodo;

						/*=============================================
	            		REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN            
						=============================================*/

						date_default_timezone_set('America/Argentina/Buenos_Aires');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$tabla = "usuarios";

						$item1 = "ultimo_login";
						$valor1 = $fechaActual;

						$item2 = "id";
						$valor2 = $respuesta["id"];

						$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

						if ($ultimoLogin == "ok") {
							
							echo '<script>

								window.location = "inicio";

							</script>';

						}

						

					}else{

						echo '<br><div class="alert alert-danger">El usuario aún no está activado</div>';

					}
					
					

				}else{

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
				}

			}

		}

	}
	
	/*=============================================
	            REGISTRO DE USUARIO            
	=============================================*/
	
	static public function ctrCrearUsuario(){

		if (isset($_POST["nuevoUsuario"])) {
			
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])) {

				/*=============================================
	            VALIDAR IMAGEN            
				=============================================*/

				$ruta = "";

				if (isset($_FILES["nuevaFoto"]["tmp_name"])) {
					
					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
	            	CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO          
					=============================================*/

					$directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];

					mkdir($directorio, 0755);

					/*=============================================
	            	DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP          
					=============================================*/

					if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {
						
						/*=============================================
	            		GUARDAMOS LA IMAGEN EN EL DIRECTORIO    
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
					}

					if ($_FILES["nuevaFoto"]["type"] == "image/png") {
						
						/*=============================================
	            		GUARDAMOS LA IMAGEN EN EL DIRECTORIO    
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);
					}



				}
				
				$tabla = "usuarios";

				$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$usesomesillystringforsalt$');

				$datos = array("nombre" => $_POST["nuevoNombre"],
								"legajo" => $_POST["nuevoLegajo"],
								"cuil" => $_POST["nuevoCuil"], 
								"telefono" => $_POST["nuevoTelefono"],
								"domicilio" => $_POST["nuevoDomicilio"],
								"ciudad" => $_POST["nuevaCiudad"],
								"movilidad" => $_POST["nuevoMovilidad"],
								"tipo_vehiculo" => $_POST["nuevoVehiculo"],
								"dominio" => $_POST["nuevoDominio"],
								"usuario" => $_POST["nuevoUsuario"],
								"password" => $encriptar,
								"perfil" => $_POST["nuevoPerfil"],
								"foto" => $ruta);

				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>

					swal({

						type: "success",
						title: "El usuario ha sido creado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false							

					}).then((result)=>{

						if(result.value){

							window.location = "usuarios";
							
							}

						});

				</script>';

				}

			}else{

				echo '<script>

					swal({

						type: "error",
						title: "El usuario no puede ir vacío o llevar caracteres especiales",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false							

					}).then((result)=>{

						if(result.value){

							window.location = "usuarios";
							
							}

						})

				</script>';

			}
		}

	}
	
	/*=============================================
	MOSTRAR USUARIOS            
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

		//var_dump($respuesta);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR DOCENTES            
	=============================================*/

	static public function ctrMostrarDocentes($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarDocentes($tabla, $item, $valor);

		//var_dump($respuesta);

		return $respuesta;
	}


	/*=============================================
	            EDITAR USUARIOS            
	=============================================*/

	static public function ctrEditarUsuario(){

		if (isset($_POST["editarUsuario"])) {
			
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				/*=============================================
	            VALIDAR IMAGEN            
				=============================================*/

				$ruta = $_POST["fotoActual"];

				if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {
					
					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
	            	CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO          
					=============================================*/

					$directorio = "vistas/img/usuarios/".$_POST["editarUsuario"];

					/*=============================================
	            	PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD          
					=============================================*/

					if (!empty($_POST["fotoActual"])) {
						
						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);
					}


					

					/*=============================================
	            	DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP          
					=============================================*/

					if ($_FILES["editarFoto"]["type"] == "image/jpeg") {
						
						/*=============================================
	            		GUARDAMOS LA IMAGEN EN EL DIRECTORIO    
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
					}

					if ($_FILES["editarFoto"]["type"] == "image/png") {
						
						/*=============================================
	            		GUARDAMOS LA IMAGEN EN EL DIRECTORIO    
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);
					}

				}

				$tabla = "usuarios";

				if ($_POST["editarPassword"] != "") {

					if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {
						
						$encriptar = crypt($_POST["editarPassword"], '$2a$07$usesomesillystringforsalt$');

					}else{

						echo '<script>

							swal({
									type: "error",
									title: "La contraseña no puede estar vacía o llevar caracteres especiales",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
									}).then((result)=>{
										if(result.value){
											window.location = "usuarios";
										}	
									})
								

						</script>';
					}
						

				}else{

					$encriptar = $_POST["passwordActual"];
				}


				$datos = array("nombre" => $_POST["editarNombre"],
							   "legajo" => $_POST["editarLegajo"],
							   "cuil" => $_POST["editarCuil"],
							   "telefono" => $_POST["editarTelefono"],
							   "domicilio" => $_POST["editarDomicilio"],
							   "ciudad" => $_POST["editarCiudad"],
							   "movilidad" => $_POST["editarMovilidad"],
							   "tipo_vehiculo" => $_POST["editarVehiculo"],
							   "dominio" => $_POST["editarDominio"],
							   "usuario" => $_POST["editarUsuario"],
							   "password" => $encriptar,
							   "perfil" => $_POST["editarPerfil"],
							   "foto" => $ruta);

				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

				if ($respuesta == "ok") {
					
					echo '<script>

							swal({
									type: "success",
									title: "El usuario ha sido editado correctamente",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
									}).then((result)=>{
										if(result.value){
											window.location = "usuarios";
										}	
									})

								

						</script>';
				}

			}else{

				echo '<script>

							swal({
									type: "error",
									title: "El nombre no puede estar vacío o llevar caracteres especiales",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
									}).then((result)=>{
										if(result.value){
											window.location = "usuarios";
										}	
									})							

						</script>';
			}			
		}
	}


	/*=============================================
	 BORRAR USUARIO   
	=============================================*/

	static public function ctrBorrarUsuario(){

		if (isset($_GET["idUsuario"])) {
			
			$tabla = "usuarios";
			$datos = $_GET["idUsuario"];

			if ($_GET["fotoUsuario"] != "") {
				
				unlink($_GET["fotoUsuario"]);
				rmdir('vistas/img/usuarios/'.$_GET["usuario"]);
			}

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if ($respuesta == "ok") {
				
				echo '<script>

					swal({
						type: "success",
						title: "El usuario ha sido borrado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result) => {
							if(result.value){
								window.location = "usuarios";
							}
							})

				</script>';
			}
		}
	}

 }


