
<?php
/*IMPORTANTE:ESTE ARCHIVO DE PDF NO ACEPTA LOS ESTILOS DE LIBRERIAS EXTERNAS NI BOOTSTRAP, HAY QUE USAR STYLE COMO ATRIBUTO Y LA ETIQUETA STYLE DEBAJO DE HEAD*/

  require_once("../../modelos/conexion.php"); 



  require_once("../../modelos/informes.modelo.php");

//$informes = new Informe();

$id_alumno = $_GET["inf"];


$datos=$informes->get_informe_por_id_informe($id_alumno);

$datos_informe=$informes->get_informe_por_id_alumno($id_alumno);



ob_start(); 

   
?>

<link type="text/css" rel="stylesheet" href="dompdf/css/print_static.css"/>
  <style type="text/css">

    @page { margin: 150px 40px 40px 40px; }
    #cabeza { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px; text-align: center; }
    #footer { position: fixed; left: 0px; bottom: -150px; right: 0px; height: 150px;  }
    #footer .page:after { content: counter(page, upper-roman); }

    
    .Estilo1{
      font-size: 14px;
      font-weight: bold;
    }
    .Estilo2{font-size: 13px}
    .Estilo3{font-size: 13px; font-weight: bold;}
    .Estilo4{color: #FFFFFF}

    


  </style>

<div id="cabeza">
    <table style="width: 100%;" class="header">
    <tr>
    <td id="cabeza" width="54%" height="80"><h1 style="text-align: left; margin-right:100px;"><img src="../public/images/logo.jpg" width="130" height="80"  /></h1></td>
    <td id="cabeza" width="250%" height="80"><h1 style="text-align: right;"><img src="../public/images/logo2.jpg" width="200" height="80"  /></h1></td>
    </table>
</div>




  <!-- <div align="center" style="color:black; font-weight:bolder; font-size:20px;">CUENTAS DE PRODUCTOS A CLIENTES   </div> -->

  <table class="change_order_items">
<tr>
  <th colspan="3" style="font-size:12pt">INFORME CUALITATIVO JULIO - OCTUBRE 2021</th>
  </tr>


<tr>
    <th width="5%" style="font-size:10pt" ><span class="Estilo1">Estudiante</span></th>
    <th width="5%" style="font-size:10pt" ><span class="Estilo1">Agrupamiento</span></th>
    <!-- <th width="20%" style="font-size:10pt" ><span class="Estilo1">División</span></th> -->
    <th width="5%" style="font-size:10pt" ><span class="Estilo1">Turno</span></th>
</tr>




<?php
  
  for($i=0;$i<sizeof($datos);$i++){

    $alumno = $datos[$i]["nombre_alumno"].' '.$datos[$i]["apellido_alumno"];



?>


<tr style="font-size:10pt" class="even_row">
<td><div align="center"><span class=""><?php echo $datos[$i]["nombre_alumno"].' '.$datos[$i]["apellido_alumno"];?></span></div></td>
<td style="text-align: center"><div align="center"><span class=""><?php echo $datos[$i]["curso"];?></span></div></td>
<td style="text-align:center"><div align="center"><span class=""><?php echo $datos[$i]["turno"];?></span></div></td>
</tr>

<?php
  }
?>

</table>




 <div style="font-size: 7pt">

<table width="20%" class="change_order_items">
  <tr>
    <td width="25%" style="font-size:8pt"><div align="center"><strong>AREAS DEL CONOCIMIENTO </strong></div></td>
    <td width="30%" style="font-size:8pt"><div align="center"><strong>SABERES </strong></div></td>
    <td width="20%" style="font-size:8pt"><div align="center"><strong>APRECIACION CUALITATIVA PRESENCIAL</strong></div></td>
    <td width="18%" style="font-size:8pt"><div align="center"><strong>APRECIACION CUALITATIVA NO PRESENCIAL </strong></div></td>
    <td width="20%" style="font-size:8pt"><div align="center"><strong>OBSERVACIONES </strong></div></td> 
  </tr>

  <?php
  
  for($i=0;$i<sizeof($datos_informe);$i++){

    


?>

<!-- <div id="footer">
    <p class="page">Página </p>
  </div> -->

  <tr>
    <td style="text-align:center">CIENTIFICA Y TECNOLOGICA</td>
    <td style="text-align:justify"><?php echo $datos_informe[$i]["saberes_cientifica"];?></td>
    <td style="text-align:center"><?php echo $datos_informe[$i]["aprecia_pres_cientifica"];?></td>
    <td style="text-align:center"><?php echo $datos_informe[$i]["aprecia_no_pres_cientifica"];?></td>
    <td style="text-align:justify"><?php echo $datos_informe[$i]["observaciones_cientifica"];?></td>
</tr>
<tr>
    <td style="text-align:center">CS. SOCIALES Y HUMANIDADES</td>
    <td style="text-align:justify"><?php echo $datos_informe[$i]["saberes_sociales"];?></td>
    <td style="text-align:center"><?php echo $datos_informe[$i]["aprecia_pres_sociales"];?></td>
    <td style="text-align:center"><?php echo $datos_informe[$i]["aprecia_no_pres_sociales"];?></td>
    <td style="text-align:justify"><?php echo $datos_informe[$i]["observaciones_sociales"];?></td>
</tr>
<tr>
    <td style="text-align:center">LENGUA Y LITERATURA</td>
    <td style="text-align:justify"><?php echo $datos_informe[$i]["saberes_lengua"];?></td>
    <td style="text-align:center"><?php echo $datos_informe[$i]["aprecia_pres_lengua"];?></td>
    <td style="text-align:center"><?php echo $datos_informe[$i]["aprecia_no_pres_lengua"];?></td>
    <td style="text-align:justify"><?php echo $datos_informe[$i]["observaciones_lengua"];?></td>
</tr>
<tr>
    <td style="text-align:center">SEGUNDAS LENGUAS</td>
    <td style="text-align:justify"><?php echo $datos_informe[$i]["saberes_ingles"];?></td>
    <td style="text-align:center"><?php echo $datos_informe[$i]["aprecia_pres_ingles"];?></td>
    <td style="text-align:center"><?php echo $datos_informe[$i]["aprecia_no_pres_ingles"];?></td>
    <td style="text-align:justify"><?php echo $datos_informe[$i]["observaciones_ingles"];?></td>

</tr>
<tr>
    <td style="text-align:center">MATEMATICA</td>
    <td style="text-align:justify"><?php echo $datos_informe[$i]["saberes_matematica"];?></td>
    <td style="text-align:center"><?php echo $datos_informe[$i]["aprecia_pres_matematica"];?></td>
    <td style="text-align:center"><?php echo $datos_informe[$i]["aprecia_no_pres_matematica"];?></td>
    <td style="text-align:justify"><?php echo $datos_informe[$i]["observaciones_matematica"];?></td>

</tr>
<tr>
    <td style="text-align:center">EDUCACION FISICA</td>
    <td style="text-align:justify"><?php echo $datos_informe[$i]["saberes_fisica"];?></td>
    <td style="text-align:center"><?php echo $datos_informe[$i]["aprecia_pres_fisica"];?></td>
    <td style="text-align:center"><?php echo $datos_informe[$i]["aprecia_no_pres_fisica"];?></td>
    <td style="text-align:justify"><?php echo $datos_informe[$i]["observaciones_fisica"];?></td>

</tr>
<tr>
    <td style="text-align:center">EDUCACION ARTISTICA</td>
    <td style="text-align:justify"><?php echo $datos_informe[$i]["saberes_artistica"];?></td>
    <td style="text-align:center"><?php echo $datos_informe[$i]["aprecia_pres_artistica"];?></td>
    <td style="text-align:center"><?php echo $datos_informe[$i]["aprecia_no_pres_artistica"];?></td>
    <td style="text-align:justify"><?php echo $datos_informe[$i]["observaciones_artistica"];?></td>

</tr> 



<?php
  }
?>



</table>





  <?php
  
  $salida_html = ob_get_contents();
  ob_end_clean(); 

  

    require_once("dompdf/dompdf_config.inc.php");       
    $dompdf = new DOMPDF();
    $dompdf->set_paper('A4', 'landscape');
    $dompdf->load_html(utf8_decode($salida_html));
    //$dompdf->set_paper(array(0, 0, 595, 841), 'landscape');
    $dompdf->render();
    $pdf = $dompdf->output();
    //$dompdf->stream("Informe.pdf", array('Attachment'=>'0'));
    $dompdf->stream($alumno.".pdf", array('Attachment'=>'0'));



    
?>