<?php

	require_once "../controladores/generos.controlador.php";
	require_once "../modelos/generos.modelo.php";

	class AjaxGeneros{

		/*=============================================
		EDITAR GENERO          
		=============================================*/

		public $idGenero;

		public function ajaxEditarGenero(){

			$item = "id";
			$valor = $this->idGenero;

			$respuesta = ControladorGeneros::ctrMostrarGeneros($item, $valor);

			echo json_encode($respuesta);

		}		

		/*=============================================
		ACTIVAR GENERO
		=============================================*/

		public $activarGenero;
		public $activarId;

		public function ajaxActivarGenero(){

			$tabla = "generos";

			$item1 = "estado";
			$valor1 = $this->activarGenero;

			$item2 = "id";
			$valor2 = $this->activarId;

			$respuesta = ModeloGeneros::mdlActualizarGenero($tabla, $item1, $valor1, $item2, $valor2);

		}

	}

		/*=============================================
		ACTIVAR GENERO
		=============================================*/

		if (isset($_POST["activarGenero"])) {
			
			$activarGenero = new AjaxGeneros();
			$activarGenero -> activarGenero = $_POST["activarGenero"];
			$activarGenero -> activarId = $_POST["activarId"];
			$activarGenero -> ajaxActivarGenero();

		}


		/*=============================================
		EDITAR GENERO          
		=============================================*/

		if (isset($_POST["idGenero"])) {
			
			$genero = new AjaxGeneros();
			$genero -> idGenero = $_POST["idGenero"];
			$genero -> ajaxEditarGenero();
		}