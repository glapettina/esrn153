<?php

	require_once "../controladores/libros.controlador.php";
	require_once "../modelos/libros.modelo.php";

	class AjaxLibros{

		/*=============================================
		EDITAR LIBRO         
		=============================================*/

		public $idLibro;

		public function ajaxEditarLibro(){

			$item = "id";
			$valor = $this->idLibro;

			$respuesta = ControladorLibros::ctrMostrarLibros($item, $valor);

			echo json_encode($respuesta);


		}	
		
	

		/*=============================================
		ACTIVAR LIBRO 
		=============================================*/

		public $activarLibro;
		public $activarId;

		public function ajaxActivarLibro(){


			$item1 = "estado";
			$valor1 = $this->activarLibro;

			$item2 = "id";
			$valor2 = $this->activarId;


			$respuesta = ModeloLibros::mdlActualizarLibro($item1, $valor1, $item2, $valor2);

		}
		
		
		
	}

	/*=============================================
	EDITAR LIBRO          
	=============================================*/

	if (isset($_POST["idLibro"])) {
		
		$libro = new AjaxLibros();
		$libro -> idLibro = $_POST["idLibro"];
		$libro -> ajaxEditarLibro();
	}



	/*=============================================
	ACTIVAR LIBRO
	=============================================*/

		if (isset($_POST["activarLibro"])) {
			
			$activarLibro = new AjaxLibros();
			$activarLibro -> activarLibro = $_POST["activarLibro"];
			$activarLibro -> activarId = $_POST["activarId"];
			$activarLibro -> ajaxActivarLibro();

		}