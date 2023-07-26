<?php

require_once "../../../controladores/informes.controlador.php";
require_once "../../../modelos/informes.modelo.php";

require_once "../../../controladores/cursos.controlador.php";
require_once "../../../modelos/cursos.modelo.php";


class imprimirReporte{


	public $id;
	public $periodo;

	public function traerImpresionReporte(){

		// TRAEMOS LA INFORMACION DE LOS INFORMES

		if ($_GET["tabla"] == "primero") {
			
			$tablaInforme = "primero";
		}

		if ($_GET["tabla"] == "segundo") {
			
			$tablaInforme = "segundo";
		}

		if ($_GET["tabla"] == "tercero") {
			
			$tablaInforme = "tercero";
		}

		if ($_GET["tabla"] == "cuarto") {
			
			$tablaInforme = "cuarto";
		}

		if ($_GET["tabla"] == "quinto") {
			
			$tablaInforme = "quinto";
		}

		$itemInforme = "id";
		$valorInforme = $this->id;
		$verifica = false;
		$periodo = $_GET["periodo"];

		$per = explode('/', $periodo);

		$per2 = $per[1];

		if ($per[0] == '01') {
			
			$titulo = 'INFORME CUALITATIVO MARZO - MAYO ' .$per2;
		}else{

			$titulo = 'INFORME CUALITATIVO JULIO - OCTUBRE ' .$per2;
		}
		

		$respuestaInforme = ControladorInformes::ctrMostrarInformes($itemInforme, $valorInforme, $tablaInforme, $periodo, $verifica);

		$nombre = $respuestaInforme["nombre"];
		$idCurso = $respuestaInforme["id_curso"];
		
		if ($_GET["area"] == "cientifica") {

			$area = "CIENTÍFICA Y TECNOLÓGICA";

			$saberes = $respuestaInforme["saberes_cientifica"];
			$aprecia = $respuestaInforme["aprecia_cientifica"];
			$asistencia = $respuestaInforme["asistencia_cientifica"];
			$observa = $respuestaInforme["observa_cientifica"];

		}

		if ($_GET["area"] == "sociales") {

			$area = "SOCIALES Y HUMANIDADES";

			$saberes = $respuestaInforme["saberes_sociales"];
			$aprecia = $respuestaInforme["aprecia_sociales"];
			$asistencia = $respuestaInforme["asistencia_sociales"];
			$observa = $respuestaInforme["observa_sociales"];

		}

		if ($_GET["area"] == "literatura") {

			$area = "LENGUA Y LITERATURA";

			$saberes = $respuestaInforme["saberes_lengua"];
			$aprecia = $respuestaInforme["aprecia_lengua"];
			$asistencia = $respuestaInforme["asistencia_lengua"];
			$observa = $respuestaInforme["observa_lengua"];

		}

		if ($_GET["area"] == "matematica") {

			$area = "MATEMÁTICA";

			$saberes = $respuestaInforme["saberes_matematica"];
			$aprecia = $respuestaInforme["aprecia_matematica"];
			$asistencia = $respuestaInforme["asistencia_matematica"];
			$observa = $respuestaInforme["observa_matematica"];

		}

		if ($_GET["area"] == "ingles") {

			$area = "SEGUNDAS LENGUAS";

			$saberes = $respuestaInforme["saberes_ingles"];
			$aprecia = $respuestaInforme["aprecia_ingles"];
			$asistencia = $respuestaInforme["asistencia_ingles"];
			$observa = $respuestaInforme["observa_ingles"];

		}

		if ($_GET["area"] == "edfisica") {

			$area = "EDUCACIÓN FÍSICA";

			$saberes = $respuestaInforme["saberes_fisica"];
			$aprecia = $respuestaInforme["aprecia_fisica"];
			$asistencia = $respuestaInforme["asistencia_fisica"];
			$observa = $respuestaInforme["observa_fisica"];

		}

		if ($_GET["area"] == "artistica") {

			$area = "LENGUAJES ARTÍSTICOS";

			$saberes = $respuestaInforme["saberes_artistica"];
			$aprecia = $respuestaInforme["aprecia_artistica"];
			$asistencia = $respuestaInforme["asistencia_artistica"];
			$observa = $respuestaInforme["observa_artistica"];

		}

		if ($_GET["area"] == "fotografia") {

			$area = "CICLO ORIENTADO - FOTOGRAFIA";

			$saberes = $respuestaInforme["saberes_fotografia"];
			$aprecia = $respuestaInforme["aprecia_fotografia"];
			$asistencia = $respuestaInforme["asistencia_fotografia"];
			$observa = $respuestaInforme["observa_fotografia"];

		}

		if ($_GET["area"] == "realizacion") {

			$area = "CICLO ORIENTADO - REALIZACIÓN AUDIOVISUAL";

			$saberes = $respuestaInforme["saberes_realizacion"];
			$aprecia = $respuestaInforme["aprecia_realizacion"];
			$asistencia = $respuestaInforme["asistencia_realizacion"];
			$observa = $respuestaInforme["observa_realizacion"];

		}

		if ($_GET["area"] == "guion") {

			$area = "CICLO ORIENTADO - GUION";

			$saberes = $respuestaInforme["saberes_guion"];
			$aprecia = $respuestaInforme["aprecia_guion"];
			$asistencia = $respuestaInforme["asistencia_guion"];
			$observa = $respuestaInforme["observa_guion"];

		}

		if ($_GET["area"] == "sonido") {

			$area = "CICLO ORIENTADO - SONIDO";

			$saberes = $respuestaInforme["saberes_sonido"];
			$aprecia = $respuestaInforme["aprecia_sonido"];
			$asistencia = $respuestaInforme["asistencia_sonido"];
			$observa = $respuestaInforme["observa_sonido"];

		}

		if ($_GET["area"] == "taller") {

			$area = "CICLO ORIENTADO - TALLER DE REALIZACIÓN";

			$saberes = $respuestaInforme["saberes_taller"];
			$aprecia = $respuestaInforme["aprecia_taller"];
			$asistencia = $respuestaInforme["asistencia_taller"];
			$observa = $respuestaInforme["observa_taller"];

		}

		if ($_GET["area"] == "semiotica") {

			$area = "CICLO ORIENTADO - SEMIÓTICA DE LA IMAGEN";

			$saberes = $respuestaInforme["saberes_semiotica"];
			$aprecia = $respuestaInforme["aprecia_semiotica"];
			$asistencia = $respuestaInforme["asistencia_semiotica"];
			$observa = $respuestaInforme["observa_semiotica"];

		}
				
		

			


		// TRAEMOS LA INFORMACION DE LOS CURSOS

		$itemCurso = "id";
		$valorCurso = $respuestaInforme["id_curso"];
		$tablaCurso = "primero";

		$respuestaCurso = ControladorCursos::ctrMostrarCursos($itemCurso, $valorCurso, $tablaCurso);

		$curso = $respuestaCurso["nombre"];
		$turno = $respuestaCurso["turno"];
	


require_once('tcpdf_include.php');

//$pdf=new FPDF(‘L’,’cm’,’A4’);

$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);

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

				<strong>$titulo</strong>


			</td>


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

				$nombre


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

			<td style="width:780px"><img src="images/backFact2.jpg"></td>

		</tr>

		

		<tr>

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:#C2BDBC; width:180px">

				<br>

				AREAS DEL CONOCIMIENTO


			</td>



			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:#C2BDBC; width:200px">

				<br>

				SABERES

			</td>

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:#C2BDBC; width:165px">

				<br>

				APRECIACION CUALITATIVA


			</td>

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:#C2BDBC; width:80px">

				<br>

				ASISTENCIA

			</td>	

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:#C2BDBC; width:156px">

				<br>

				OBSERVACIONES

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

			<td style="font-size: 7px; text-align: center; border: 1px solid #666; background-color:white; width:180px">

				<br>

				$area


			</td>



			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:200px">

				<br>

				$saberes

			</td>

			<td style="font-size: 8px; text-align: center; border: 1px solid #666; background-color:white; width:165px">

				<br>

				$aprecia


			</td>

			<td style="font-size: 8px; text-align: center; border: 1px solid #666; background-color:white; width:80px">

				<br>

				$asistencia

			</td>	

			<td style="font-size: 8px; text-align: justify; border: 1px solid #666; background-color:white; width:156px">

				<br>

				$observa

			</td>	



		</tr>

	</table>

EOF;


$pdf->writeHTML($bloque6, false, false, false, false, '');

//--------------------------------------------------------

//SALIDA DEL ARCHIVO

$pdf->Output('informe_'.$nombre.'.pdf');


}
}

$reporte = new imprimirReporte();
$reporte -> id = $_GET["id"];
$reporte -> informe = $_GET["informe"];
$reporte -> area = $_GET["area"];
$reporte -> traerImpresionReporte();


?>	