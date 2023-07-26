<?php


	require_once "conexion.php";

	class ModeloArticulos{


		/*=============================================
	    CREAR ARTICULO           
		=============================================*/


		static public function mdlIngresarArticulo($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(n_articulo, descripcion) VALUES (:n_articulo, :descripcion)");

			$stmt->bindParam(":n_articulo", $datos["articulo"], PDO::PARAM_INT);
			$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				
				return "ok";
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;

		}


		/*=============================================
	                     MOSTRAR ARTICULOS            
		=============================================*/

		static public function mdlMostrarArticulos($tabla, $item, $valor){

			if ($item != null) {
				
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
	    ACTUALIZAR ARTICULO            
		=============================================*/

		static public function mdlActualizarArticulo($tabla, $item1, $valor1, $item2, $valor2){

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
		EDITAR ARTICULO            
		=============================================*/

		static public function mdlEditarArticulo($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET n_articulo = :n_articulo, descripcion = :descripcion WHERE id_articulo = :id_articulo");

			$stmt->bindParam(":n_articulo", $datos["articulo"], PDO::PARAM_INT);
			$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":id_articulo", $datos["id_articulo"], PDO::PARAM_INT);

			if ($stmt->execute()) {
				
				return "ok";
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;

		}

		/*=============================================
		BORRAR ARTICULO            
		=============================================*/

		static public function mdlBorrarArticulo($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_articulo = :id_articulo");

			$stmt -> bindParam(":id_articulo", $datos, PDO::PARAM_INT);

			if ($stmt->execute()) {
				
				return "ok";
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;

		}

	}