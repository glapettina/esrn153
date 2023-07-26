<?php

require_once "../../../controladores/movilidades.controlador.php";
require_once "../../../modelos/movilidades.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/ciudades.controlador.php";
require_once "../../../modelos/ciudades.modelo.php";


class imprimirInformeMovilidad{


	public $desde;
	public $hasta;
	public $mes;
	public $anio;



	public function traerImpresionInformeMovilidad(){


		date_default_timezone_set('America/Argentina/Buenos_Aires');


		$dia = date('d/m/Y');

		// TRAEMOS LA INFORMACION DE LOS DOCENTES CON MOVILIDAD

		$item = "movilidad"; 
		$valor = 1;
		

		$respuestaDocentes = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);



			$desde = $this->desde;
			$hasta = $this->hasta;
			

			$anio = date("Y", strtotime($hasta));



require_once('tcpdf_include.php');

$pdf = new TCPDF('L', PDF_UNIT, 'LEGAL', true, 'UTF-8', false);

$pdf->setPrintHeader(false); //Ahora no imprimirá cabecera
$pdf->setPrintFooter(true); //Ahora si imprimirá pie de página

// set margins
$pdf->SetMargins(8, 8, 3);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(8);

$pdf->startPageGroup();

$pdf->AddPage();


//--------------------------------------------------------------------------------

$bloque1 = <<<EOF

	<table>

		<tr>

			<td style="width: 200px; font-size:8px">

				CONSEJO PROVINCIAL DE EDUCACION
				DIRECCION GENERAL DE PERSONAL

				<br>
				<br>

				ESTABLECIMIENTO: ESRN Nº 153
				<br>
				LOCALIDAD: CHOELE CHOEL
				<br>
				<br>
				DESDE: $desde - HASTA: $hasta

			</td>

			<td style="background-color:white; width:450px">

				<div style="font-size:10px; text-align:center; line-height:15px;">

					<br>
					COMPENSACION POR MOVILIDAD DOCENTE - LEY 2448					
					
				</div>

			</td>			


		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque1, false, false, false, false, '');

//----------------------------------------------------------------------------------

$bloque2 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="width:540px"><img src="images/backFact2.jpg"></td>

		</tr>


	</table>

EOF;


$pdf->writeHTML($bloque2, false, false, false, false, '');

//--------------------------------------------------------

//----------------------------------------------------------------------------------

//----------------------------------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		

		<tr>

		<td style="text-align: center; border: 1px solid #666; background-color:white; width:200px">

				<br>

				Apellido y Nombres


			</td>

			

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:60px">

				<br>

				Legajo


			</td>
			

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:250px">

				<br>

				Domicilio


			</td>
			
			

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:65px">

				<br>

				Distancia


			</td>

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:70px">

				<br>

				Total Días


			</td>

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:70px">

				<br>

				Total Kms.


			</td>

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:75px">

				<br>

				Tipo


			</td>

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:75px">

				<br>

				Dominio


			</td>

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:90px">

				<br>

				Observaciones


			</td>

			

		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque3, false, false, false, false, '');

//--------------------------------------------------------


foreach ($respuestaDocentes as $key => $value) {
	
		$itemMovi = "id_usuario";
		$valorMovi = $value["id"];
		$desde = $this->desde;
		$hasta = $this->hasta;

		$respuestaMovilidad = ControladorMovilidades::ctrResumenMovilidad($itemMovi, $valorMovi, $desde, $hasta);

		$itemCiu = "id_ciudad";
		$valorCiu = $value["ciudad"];

		$respuestaCiudad = ControladorCiudades::ctrMostrarCiudades($itemCiu, $valorCiu);



		$respuestaViajes = ControladorMovilidades::ctrCuentaMovilidad($itemMovi, $valorMovi, $desde, $hasta);


		$totalKms =  $respuestaCiudad["kilometros"] * $respuestaViajes["total"];



//}


$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		

		<tr>

		<td style="text-align: left; border: 1px solid #666; background-color:white; width:200px">

				<br>

				$value[nombre]


			</td>

			

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:60px">

				<br>

				$value[legajo]


			</td>
			

			<td style="text-align: left; border: 1px solid #666; background-color:white; width:250px">

				<br>

				$value[domicilio] - $respuestaCiudad[nombre]


			</td>
			
			

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:65px">

				<br>

				$respuestaCiudad[kilometros]


			</td>


			<td style="text-align: center; border: 1px solid #666; background-color:white; width:70px">

				<br>

				$respuestaViajes[total]


			</td>

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:70px">

				<br>

				$totalKms


			</td>

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:75px">

				<br>

				$value[tipo_vehiculo]


			</td>

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:75px">

				<br>

				$value[dominio]


			</td>

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:90px">

				<br>

			</td>

			

		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque4, false, false, false, false, '');

}



//--------------------------------------------------------------------------------

$bloque5 = <<<EOF

	<table>

		<tr>

			<br>

			<td style="width:540px"><img src="images/backFact2.jpg"></td>

		</tr>

		<tr>

		

			<td style="width: 300px; font-size:12px">

				Nota Nº ___________ - Choele Choel, $dia  

			</td>


		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque5, false, false, false, false, '');

//----------------------------------------------------------------------------------


//SALIDA DEL ARCHIVO

$pdf->Output("Movilidad_" .$desde. "-" .$hasta.".pdf");


}
}

$reporte = new imprimirInformeMovilidad();
//$reporte -> iddocente = $_GET["idDocente"];
$reporte -> desde = $_GET["desde"];
$reporte -> hasta = $_GET["hasta"];
$reporte -> traerImpresionInformeMovilidad();


?>