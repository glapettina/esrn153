<?php


	require_once "conexion.php";

	class ModeloLicencias{


		/*=============================================
	    CREAR LICENCIA           
		=============================================*/


		static public function mdlIngresarLicencia($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_usuario, id_articulo, desde, hasta, anio) VALUES (:id_usuario, :id_articulo, :desde, :hasta, :anio)");

			$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
			$stmt->bindParam(":id_articulo", $datos["id_articulo"], PDO::PARAM_INT);
			$stmt->bindParam(":desde", $datos["desde"], PDO::PARAM_STR);
			$stmt->bindParam(":hasta", $datos["hasta"], PDO::PARAM_STR);
			$stmt->bindParam(":anio", $datos["anio"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				
				return "ok";
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;

		}


		/*=============================================
	    MOSTRAR LICENCIAS            
		=============================================*/

		static public function mdlMostrarLicencias($tabla, $item, $valor, $verifica){

		    	$array = explode('/', $_SESSION["periodo"]);
          		$anio = $array[1];


			if ($item != null && $verifica == true) {
				
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND anio = $anio");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();

			}else if ($item != null && $verifica == false) {

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();
			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

				$stmt -> execute();

				return $stmt -> fetchAll();
			}

			$stmt -> close();
			$stmt = null;

		}


		/*=============================================
		BORRAR LICENCIA            
		=============================================*/

		static public function mdlBorrarLicencia($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_licencia = :id_licencia");

			$stmt -> bindParam(":id_licencia", $datos, PDO::PARAM_INT);

			if ($stmt->execute()) {
				
				return "ok";
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;

		}


	}