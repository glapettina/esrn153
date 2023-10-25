<?php

require_once "../../../controladores/informes.controlador.php";
require_once "../../../modelos/informes.modelo.php";

require_once "../../../controladores/cursos.controlador.php";
require_once "../../../modelos/cursos.modelo.php";


class imprimirReporte{


	public $idCurso;

	public function traerImpresionReporte(){

		// TRAEMOS LA INFORMACION DE LOS INFORMES

		if ($_GET["tabla"] == "seguimiento") {
			
			$tablaInforme = "seguimiento";
		}


		
		$itemInforme = "id_curso";
		//$valorInforme = $this->idCurso;
		$valorInforme = $_GET["idCurso"];
		//$tablaInforme = "primero";
		$periodo = $_GET["periodo"];
		$verifica = true;


		$per = explode('/', $periodo);

		$per2 = $per[1];

		if ($per[0] == '01') {
			
			$titulo = 'INFORME FINAL DE SEGUIMIENTO DEL BLOQUE ACADÉMICO ' .$per2;
		}else{

			$titulo = 'INFORME FINAL DE SEGUIMIENTO DEL BLOQUE ACADÉMICO ' .$per2;
		}
		

		$respuestaInforme = ControladorInformes::ctrMostrarInformes($itemInforme, $valorInforme, $tablaInforme, $periodo, $verifica);

		//$nombre = $respuestaInforme["nombre"];
		//$idCurso = $respuestaInforme["id_curso"];
		$idCurso = $_GET["idCurso"];
		
		 if ($_GET["area"] == "cientifica") {

		 	$area = "CIENTÍFICA Y TECNOLÓGICA";

		 }	

		 if ($_GET["area"] == "sociales") {

		 	$area = "SOCIALES Y HUMANIDADES";

		 }	

		 if ($_GET["area"] == "literatura") {

		 	$area = "LENGUA Y LITERATURA";

		 }	

		 if ($_GET["area"] == "matematica") {

		 	$area = "MATEMÁTICA";

		 }

		  if ($_GET["area"] == "ingles") {

		 	$area = "SEGUNDAS LENGUAS";

		 }

		  if ($_GET["area"] == "edfisica") {

		 	$area = "EDUCACIÓN FÍSICA";

		 }

		 if ($_GET["area"] == "artistica") {

		 	$area = "LENGUAJES ARTÍSTICOS";

		 }



		// TRAEMOS LA INFORMACION DE LOS CURSOS

		$itemCurso = "id";
		$valorCurso = $_GET["idCurso"];
		$tablaCurso = "primero";

		$respuestaCurso = ControladorCursos::ctrMostrarCursos($itemCurso, $valorCurso, $tablaCurso);

		$curso = $respuestaCurso["nombre"];
		$turno = $respuestaCurso["turno"];
	


require_once('tcpdf_include.php');

//$pdf=new FPDF(‘L’,’cm’,’A4’);

$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);

$pdf->setPrintHeader(false); //Ahora si imprimirá cabecera
$pdf->setPrintFooter(true); //Ahora si imprimirá pie de página


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->startPageGroup();

$pdf->AddPage();


//--------------------------------------------------------------------------------

$bloque1 = <<<EOF

	<table>

		<tr>

			<td style="width: 780px"><img src="images/header.png"></td>

			<td style="background-color:white; width:606px">

				<div style="font-size:14px; text-align: right; line-height:10px;">

					<br>	
					ESCUELA SECUNDARIA RIO NEGRO Nº 153					

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

		<tr>

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:780px">

				<br>

				<strong>$titulo - ÁREA: $area</strong>


			</td>

			

			
			

		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque2, false, false, false, false, '');

//--------------------------------------------------------

//----------------------------------------------------------------------------------

foreach ($respuestaInforme as $key => $value) {


	if ($_GET["area"] == "cientifica") {

			$area = "CIENTÍFICA Y TECNOLÓGICA";

			$acreditacion = $value["criterio_acreditacion_cientifica"];
			$evaluacion = $value["criterio_evaluacion_cientifica"];
			$indicador = $value["indicador_evaluacion_cientifica"];
			$aprecia = $value["apreciacion_cualitativa_cientifica"];
			$asistencia = $value["asistencia_cientifica"];
			$observaciones = $value["observaciones_cientifica"];


		}


//----------------------------------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		

		<tr>

			<td style="text-align: center; border: 1px solid #666; background-color:#C2BDBC;; width:260px">

				<br>

				Estudiante


			</td>

			<td style="text-align: center; border: 1px solid #666; background-color:#C2BDBC;; width:260px">

				<br>

				Agrupamiento


			</td>		

			<td style="text-align: center; border: 1px solid #666; background-color:#C2BDBC;; width:260px">

				<br>

				Turno


			</td>			

		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque3, false, false, false, false, '');

//--------------------------------------------------------





//----------------------------------------------------------------------------------


$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		

		<tr>

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:260px">

				<br>

				$value[nombre]


			</td>



			<td style="text-align: center; border: 1px solid #666; background-color:white; width:260px">

				<br>

				$curso


			</td>

			<td style="text-align: center; border: 1px solid #666; background-color:white; width:260px">

				<br>

				$turno


			</td>


		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque4, false, false, false, false, '');

//--------------------------------------------------------


//----------------------------------------------------------------------------------


$bloque5 = <<<EOF

	<table style="font-size:8px; padding:5px 10px;">

	

		

		<tr>

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:#C2BDBC; width:150px">

				<br>

				AREAS DEL CONOCIMIENTO


			</td>



			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:#C2BDBC; width:165px">

				<br>

				CRITERIOS DE ACREDITACIÓN INSTITUCIONALES

			</td>

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:#C2BDBC; width:165px">

				<br>

				CRITERIOS DE EVALUACIÓN


			</td>

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:#C2BDBC; width:165px">

				<br>

				INDICADORES DE EVALUACIÓN

			</td>	

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:#C2BDBC; width:156px">

				<br>

				APRECIACIÓN CUALITATIVA

			</td>	

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:#C2BDBC; width:156px">

			<br>

			ASISTENCIA

		</td>

		<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:#C2BDBC; width:156px">

		<br>

		COMENTARIOS Y SUGERENCIAS  PARA LA CONTINUIDAD DE LA TRAYECTORIA

	</td>



		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque5, false, false, false, false, '');

//--------------------------------------------------------

//----------------------------------------------------------------------------------


$bloque6 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

	

		

		<tr>

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:white; width:150px">

				<br>

				$area


			</td>



			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:165px">

				<br>

				$acreditacion

			</td>

			<td style="font-size: 8px; text-align: center; border: 1px solid #666; background-color:white; width:165px">

				<br>

				$evaluacion


			</td>

			<td style="font-size: 8px; text-align: center; border: 1px solid #666; background-color:white; width:165px">

				<br>

				$indicador

			</td>	

			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:156px">

				<br>

				$aprecia

			</td>	

			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:156px">

			<br>

			$asistencia

		</td>

		<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:156px">

		<br>

		$observaciones

	</td>



		</tr>

		<tr>

			<td style="width:780px"><img src="images/backFact2.jpg"></td>

		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque6, false, false, false, false, '');

}

//--------------------------------------------------------

//SALIDA DEL ARCHIVO

$pdf->Output('informe_area_'.$area.'.pdf');


}
}

$reporte = new imprimirReporte();
$reporte -> id = $_GET["idCurso"];
$reporte -> informe = $_GET["informe"];
$reporte -> area = $_GET["area"];
$reporte -> traerImpresionReporte();


?>	