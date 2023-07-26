

  <div class="content-wrapper">
    
    <section class="content-header">
      <h1>
        Backup Base de Datos
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Backup Base de Datos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <!-- <button class="btn btn-primary" data-toggle="modal" method="post" name="backup">
            
            Realizar Backup
          </button> -->
          
        </div>
        <div class="box-body">
          
          <form method="post">

             <input type="hidden" value="true" name="backup">
             <input type="submit" value="Realizar copia de respaldo.">

          </form>

        </div>
        
        
      </div>

    </section>
  </div>


  <?php

      if ($_POST)
      {
        if ($_POST["backup"])
        {
          require("modelos/backup.php");
          $backupdb = new backupdb();
          echo "<a href='{$backupdb->getRuta()}'>Descargar archivo .sql</a>";
        }
      }


?>



