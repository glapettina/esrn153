<?php

	require_once "conexion.php";

	class ModeloLibros{


		/*=============================================
						CREAR LIBRO            
		=============================================*/

		static public function mdlCrearLibro($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, nombre, id_genero, autor, editorial, cantidad, ubicacion) VALUES (:codigo, :nombre, :id_genero, :autor, :editorial, :cantidad, :ubicacion)");

			$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":id_genero", $datos["id_genero"], PDO::PARAM_INT);
			$stmt->bindParam(":autor", $datos["autor"], PDO::PARAM_STR);
			$stmt->bindParam(":editorial", $datos["editorial"], PDO::PARAM_STR);
			$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
			$stmt->bindParam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);


			if ($stmt->execute()) {
				
				return "ok";
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;

		}

		/*=============================================
		MOSTRAR LIBROS
		=============================================*/

		static public function mdlMostrarLibros($item, $valor, $tabla){

			if ($item != null) {
				
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY nombre");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}

			$stmt -> close();

			$stmt = null;
		}


		/*=============================================
		EDITAR LIBRO            
		=============================================*/

		static public function mdlEditarLibro($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo = :codigo, nombre = :nombre, autor = :autor, editorial = :editorial, cantidad = :cantidad, ubicacion = :ubicacion WHERE id = :id");

			$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
			$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":autor", $datos["autor"], PDO::PARAM_STR);
			$stmt->bindParam(":editorial", $datos["editorial"], PDO::PARAM_STR);
			$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
			$stmt->bindParam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);





			if ($stmt->execute()) {
				
				return "ok";
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;

		}

		/*=============================================
		BORRAR LIBRO            
		=============================================*/

		static public function mdlBorrarLibro($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

			$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

			if ($stmt->execute()) {
				
				return "ok";
			}else{

				return "error";
			}

			$stmt->close();
			$stmt = null;

		}


		/*=============================================
	    				ACTUALIZAR LIBRO            
		=============================================*/

		static public function mdlActualizarLibro($tabla, $item1, $valor1, $item2, $valor2){

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

	}