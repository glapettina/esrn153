<?php

	require_once "../controladores/articulos.controlador.php";
	require_once "../modelos/articulos.modelo.php";

	class AjaxArticulos{

		/*=============================================
		EDITAR ARTICULO           
		=============================================*/

		public $idArticulo;

		public function ajaxEditarArticulo(){

			$item = "id_articulo";
			$valor = $this->idArticulo;

			$respuesta = ControladorArticulos::ctrMostrarArticulos($item, $valor);

			echo json_encode($respuesta);

		}		

		/*=============================================
		ACTIVAR ARTICULO
		=============================================*/

		public $activarArticulo;
		public $activarId;

		public function ajaxActivarArticulo(){

			$tabla = "articulos";

			$item1 = "estado";
			$valor1 = $this->activarArticulo;

			$item2 = "id_articulo";
			$valor2 = $this->activarId;

			$respuesta = ModeloArticulos::mdlActualizarArticulo($tabla, $item1, $valor1, $item2, $valor2);

		}

	}

		/*=============================================
		ACTIVAR ARTICULO
		=============================================*/

		if (isset($_POST["activarArticulo"])) {
			
			$activarArticulo = new AjaxArticulos();
			$activarArticulo -> activarArticulo = $_POST["activarArticulo"];
			$activarArticulo -> activarId = $_POST["activarId"];
			$activarArticulo -> ajaxActivarArticulo();

		}


		/*=============================================
		EDITAR ARTICULO          
		=============================================*/

		if (isset($_POST["idArticulo"])) {
			
			$articulo = new AjaxArticulos();
			$articulo -> idArticulo = $_POST["idArticulo"];
			$articulo -> ajaxEditarArticulo();
		}