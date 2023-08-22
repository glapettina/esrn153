<?php


	require_once "conexion.php";

	class ModeloPeriodos{


		/*=============================================
	                     CREAR PERÍODO           
		=============================================*/


		static public function mdlIngresarPeriodo($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES (:nombre)");

			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				
				return "ok";
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;

		}


		/*=============================================
	                    MOSTRAR PERÍODOS            
		=============================================*/

		static public function mdlMostrarPeriodos($tabla, $item, $valor, $ingreso){

			if ($item != null) {
				
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else if($ingreso != 1){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

				$stmt -> execute();

				return $stmt -> fetchAll();
			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado= 1");

				$stmt -> execute();

				return $stmt -> fetchAll();
			}

			$stmt -> close();
			$stmt = null;

		}


		/*=============================================
	    			ACTUALIZAR PERÍODO            
		=============================================*/

		static public function mdlActualizarPeriodo($tabla, $item1, $valor1, $item2, $valor2){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

			$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

			if ($stmt -> execute()) {
				
				return "ok";
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;

		}


		/*=============================================
						EDITAR PERÍODO            
		=============================================*/

		static public function mdlEditarPeriodo($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id_periodo = :id_periodo");

			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":id_periodo", $datos["id_periodo"], PDO::PARAM_INT);

			if ($stmt->execute()) {
				
				return "ok";
				
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;

		}

		/*=============================================
						BORRAR PERÍODO            
		=============================================*/

		static public function mdlBorrarPeriodo($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_periodo = :id_periodo");

			$stmt -> bindParam(":id_periodo", $datos, PDO::PARAM_INT);

			if ($stmt->execute()) {
				
				return "ok";
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;

		}

	}