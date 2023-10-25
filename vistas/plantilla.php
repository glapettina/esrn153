<?php

  session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ESRN Nº 153 | Choele Choel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/plantilla/logo.png">

  <!--======================================
  PLUGINS DE CSS
  =======================================--> 

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- Date Picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">


  <!--======================================
  PLUGINS DE JAVASCRIPT
  =======================================-->    

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>
  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
  <!-- daterangepicker -->
  <script src="vistas/bower_components/moment/min/moment.min.js"></script>
  <script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="vistas/bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js"></script>


</head>

<!--======================================
  CUERPO DOCUMENTO
=======================================--> 

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">


<?php

  if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
    
    
    echo '<div class="wrapper">';

    /*======================================
    HEADER
    =======================================*/

    include "modulos/header.php";

    /*======================================
    MENU
    =======================================*/

    include "modulos/menu.php";

    /*======================================
    CONTENIDO
    =======================================*/

    if(isset($_GET["ruta"])){

      if ($_GET["ruta"] == "inicio" ||
          $_GET["ruta"] == "usuarios" ||
          $_GET["ruta"] == "cursos" ||
          $_GET["ruta"] == "ciudades" ||
          $_GET["ruta"] == "movilidad" ||
          $_GET["ruta"] == "movilidad-fecha" ||
          $_GET["ruta"] == "resumen-movilidad" ||
          $_GET["ruta"] == "resumen-docente" ||
          $_GET["ruta"] == "netbooks" ||
          $_GET["ruta"] == "servicios" ||
          $_GET["ruta"] == "periodos" ||
          $_GET["ruta"] == "historial-servicios" ||
          $_GET["ruta"] == "primero" ||
          $_GET["ruta"] == "segundo" ||
          $_GET["ruta"] == "tercero" ||
          $_GET["ruta"] == "cuarto" ||
          $_GET["ruta"] == "quinto" ||          
          $_GET["ruta"] == "1tm-cientifica" ||
          $_GET["ruta"] == "1tt-cientifica" ||
          $_GET["ruta"] == "2tm-cientifica" ||
          $_GET["ruta"] == "2tt-cientifica" ||
          $_GET["ruta"] == "3tm-cientifica" ||
          $_GET["ruta"] == "3tt-cientifica" ||
          $_GET["ruta"] == "4tm-cientifica" ||
          $_GET["ruta"] == "41tt-cientifica" ||
          $_GET["ruta"] == "42tt-cientifica" ||
          $_GET["ruta"] == "5tm-cientifica" ||
          $_GET["ruta"] == "51tt-cientifica" ||
          $_GET["ruta"] == "52tt-cientifica" ||
          $_GET["ruta"] == "1tm-sociales" ||
          $_GET["ruta"] == "1tt-sociales" ||
          $_GET["ruta"] == "2tm-sociales" ||
          $_GET["ruta"] == "2tt-sociales" ||
          $_GET["ruta"] == "3tm-sociales" ||
          $_GET["ruta"] == "3tt-sociales" ||
          $_GET["ruta"] == "4tm-sociales" ||
          $_GET["ruta"] == "41tt-sociales" ||
          $_GET["ruta"] == "42tt-sociales" ||
          $_GET["ruta"] == "5tm-sociales" ||
          $_GET["ruta"] == "51tt-sociales" ||
          $_GET["ruta"] == "52tt-sociales" ||
          $_GET["ruta"] == "1tm-literatura" ||
          $_GET["ruta"] == "1tt-literatura" ||
          $_GET["ruta"] == "2tm-literatura" ||
          $_GET["ruta"] == "2tt-literatura" ||
          $_GET["ruta"] == "3tm-literatura" ||
          $_GET["ruta"] == "3tt-literatura" ||
          $_GET["ruta"] == "4tm-literatura" ||
          $_GET["ruta"] == "41tt-literatura" ||
          $_GET["ruta"] == "42tt-literatura" ||
          $_GET["ruta"] == "5tm-literatura" ||
          $_GET["ruta"] == "51tt-literatura" ||
          $_GET["ruta"] == "52tt-literatura" ||
          $_GET["ruta"] == "1tm-matematica" ||
          $_GET["ruta"] == "1tt-matematica" ||
          $_GET["ruta"] == "2tm-matematica" ||
          $_GET["ruta"] == "2tt-matematica" ||
          $_GET["ruta"] == "3tm-matematica" ||
          $_GET["ruta"] == "3tt-matematica" ||
          $_GET["ruta"] == "4tm-matematica" ||
          $_GET["ruta"] == "41tt-matematica" ||
          $_GET["ruta"] == "42tt-matematica" ||
          $_GET["ruta"] == "5tm-matematica" ||
          $_GET["ruta"] == "51tt-matematica" ||
          $_GET["ruta"] == "52tt-matematica" ||
          $_GET["ruta"] == "1tm-ingles" ||
          $_GET["ruta"] == "1tt-ingles" ||
          $_GET["ruta"] == "2tm-ingles" ||
          $_GET["ruta"] == "2tt-ingles" ||
          $_GET["ruta"] == "3tm-ingles" ||
          $_GET["ruta"] == "3tt-ingles" ||
          $_GET["ruta"] == "4tm-ingles" ||
          $_GET["ruta"] == "41tt-ingles" ||
          $_GET["ruta"] == "42tt-ingles" ||
          $_GET["ruta"] == "5tm-ingles" ||
          $_GET["ruta"] == "51tt-ingles" ||
          $_GET["ruta"] == "52tt-ingles" ||
          $_GET["ruta"] == "1tm-edfisica" ||
          $_GET["ruta"] == "1tt-edfisica" ||
          $_GET["ruta"] == "2tm-edfisica" ||
          $_GET["ruta"] == "2tt-edfisica" ||
          $_GET["ruta"] == "3tm-edfisica" ||
          $_GET["ruta"] == "3tt-edfisica" ||
          $_GET["ruta"] == "4tm-edfisica" ||
          $_GET["ruta"] == "41tt-edfisica" ||
          $_GET["ruta"] == "42tt-edfisica" ||
          $_GET["ruta"] == "5tm-edfisica" ||
          $_GET["ruta"] == "51tt-edfisica" ||
          $_GET["ruta"] == "52tt-edfisica" ||
          $_GET["ruta"] == "1tm-artistica" ||
          $_GET["ruta"] == "1tt-artistica" ||
          $_GET["ruta"] == "2tm-artistica" ||
          $_GET["ruta"] == "2tt-artistica" ||
          $_GET["ruta"] == "3tm-artistica" ||
          $_GET["ruta"] == "3tt-artistica" ||
          $_GET["ruta"] == "4tm-artistica" ||
          $_GET["ruta"] == "41tt-artistica" ||
          $_GET["ruta"] == "42tt-artistica" ||
          $_GET["ruta"] == "3-fotografia" ||
          $_GET["ruta"] == "3-realizacion" ||
          $_GET["ruta"] == "4-fotografia" ||
          $_GET["ruta"] == "4-realizacion" ||
          $_GET["ruta"] == "4-guion" ||
          $_GET["ruta"] == "4-sonido" ||
          $_GET["ruta"] == "5-fotografia" ||
          $_GET["ruta"] == "5-realizacion" ||
          $_GET["ruta"] == "5-guion" ||
          $_GET["ruta"] == "5-sonido" ||
          $_GET["ruta"] == "5-taller" ||
          $_GET["ruta"] == "5-semiotica" ||
          $_GET["ruta"] == "informe-area" ||
          $_GET["ruta"] == "informe-area-orientacion" ||
          $_GET["ruta"] == "generos" ||
          $_GET["ruta"] == "libros" ||
          $_GET["ruta"] == "articulos" ||
          $_GET["ruta"] == "licencias" ||
          $_GET["ruta"] == "licencias-docente" ||
          $_GET["ruta"] == "copia" ||
          $_GET["ruta"] == "seguimiento" ||
          $_GET["ruta"] == "2tm-seguimiento-cientifica" ||
          $_GET["ruta"] == "salir") {
        
          include "modulos/".$_GET["ruta"].".php";

      }else{

        include "modulos/404.php";

      }

    }else{

      include "modulos/inicio.php";

    }

    /*======================================
    FOOTER
    =======================================*/

    include "modulos/footer.php";

    echo '</div>';

  }else{

    include "modulos/login.php";

  }  

?>



<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/cursos.js"></script>
<script src="vistas/js/ciudades.js"></script>
<script src="vistas/js/alumnos.js"></script>
<script src="vistas/js/movilidades.js"></script>
<script src="vistas/js/netbooks.js"></script>
<script src="vistas/js/servicios.js"></script>
<script src="vistas/js/informes.js"></script>
<script src="vistas/js/generos.js"></script>
<script src="vistas/js/libros.js"></script>
<script src="vistas/js/articulos.js"></script>
<script src="vistas/js/licencias.js"></script>
<script src="vistas/js/periodos.js"></script>



<!--CAMPO FECHA - DATEPICKER-->

<script>
      
      $('#datepicker').datepicker({
      /*dateFormat: 'dd-mm-yy',
      autoclose: true*/
       format: "dd/mm/yyyy",
        /*clearBtn: true,*/
        language: "es",
        autoclose: true,
        /*keyboardNavigation: false,
        todayHighlight: true*/
    })

      $('#datepicker2').datepicker({
          /*dateFormat: 'dd-mm-yy',
          autoclose: true*/
           format: "dd/mm/yyyy",
            /*clearBtn: true,*/
            language: "es",
            autoclose: true,
            /*keyboardNavigation: false,
            todayHighlight: true*/
    })

        $('#datepicker3').datepicker({
      /*dateFormat: 'dd-mm-yy',
      autoclose: true*/
       format: "dd/mm/yyyy",
        /*clearBtn: true,*/
        language: "es",
        autoclose: true,
        /*keyboardNavigation: false,
        todayHighlight: true*/
    })


</script>    

</body>
</html>


