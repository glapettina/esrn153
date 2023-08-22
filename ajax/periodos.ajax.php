<?php

	require_once "../controladores/periodos.controlador.php";
	require_once "../modelos/periodos.modelo.php";

	class AjaxPeriodos{

		/*=============================================
						EDITAR PERÍODO           
		=============================================*/

		public $idPeriodo;

		public function ajaxEditarPeriodo(){

			$item = "id_periodo";
			$valor = $this->idPeriodo;

			$respuesta = ControladorPeriodos::ctrMostrarPeriodos($item, $valor);

			echo json_encode($respuesta);

		}		

		/*=============================================
						ACTIVAR PERÍODO
		=============================================*/

		public $activarPeriodo;
		public $activarId;

		public function ajaxActivarPeriodo(){

			$tabla = "periodos";

			$item1 = "estado";
			$valor1 = $this->activarPeriodo;

			$item2 = "id_periodo";
			$valor2 = $this->activarId;

			$respuesta = ModeloPeriodos::mdlActualizarPeriodo($tabla, $item1, $valor1, $item2, $valor2);

		}

	}

		/*=============================================
						ACTIVAR PERÍODO
		=============================================*/

		if (isset($_POST["activarPeriodo"])) {
			
			$activarPeriodo = new AjaxPeriodos();
			$activarPeriodo -> activarPeriodo = $_POST["activarPeriodo"];
			$activarPeriodo -> activarId = $_POST["activarId"];
			$activarPeriodo -> ajaxActivarPeriodo();

		}


		/*=============================================
						EDITAR PERÍODO          
		=============================================*/

		if (isset($_POST["idPeriodo"])) {
			
			$periodo = new AjaxPeriodos();
			$periodo -> idPeriodo = $_POST["idPeriodo"];
			$periodo -> ajaxEditarPeriodo();
		}