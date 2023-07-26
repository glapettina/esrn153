<?php

    $item = null;
    $valor = null;   

    $articulos = ControladorArticulos::ctrMostrarArticulos($item, $valor);

    $itemDoc = null;
    $valorDoc = null;   

    $docentes = ControladorUsuarios::ctrMostrarUsuarios($itemDoc, $valorDoc);


?> 

  <div class="content-wrapper">
    
    <section class="content-header">
      <h1>
        Licencias Docentes
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Licencias Docentes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarLicencia">
            
            Agregar Licencia
          </button>
          
        </div>
        <div class="box-body">
          
          <table class="table table-bordered table-striped dt-responsive tablas">
            
            <thead>
              
              <tr>
                
                <th style="width: 10px">#</th>
                <th>Docente</th>
                <th>Artículo</th>
                <th>Descripción</th>
                <th>Desde</th>
                <th>Hasta</th>
                <th>Acciones</th>

              </tr> 

            </thead>
            <tbody>
              
              <?php

                  $item = null;
                  $valor = null;
                  $verifica = false;


                  $licencias = ControladorLicencias::ctrMostrarLicencias($item, $valor, $verifica);

                  foreach ($licencias as $key => $value) {
                    
                    echo '<tr>
                
                          <td>'.($key+1).'</td>';

                          $item = "id";
                          $valor = $value["id_usuario"];

                          $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                          echo '<td>'.$usuario["nombre"].'</td>';

                          $item = "id_articulo";
                          $valor = $value["id_articulo"];

                          $articulo = ControladorArticulos::ctrMostrarArticulos($item, $valor);

                          echo '<td>'.$articulo["n_articulo"].'</td>';
                          echo '<td>'.$articulo["descripcion"].'</td>';

                          $fecha_desde = date("d-m-Y",strtotime($value["desde"]));

                          echo '<td>'.$fecha_desde.'</td>';

                          $fecha_hasta = date("d-m-Y",strtotime($value["hasta"]));

                          echo '<td>'.$fecha_hasta.'</td>

                          <td>
                            
                            <div class="btn-group">
                                
                              <button class="btn btn-danger btnEliminarLicencia" idLicencia="'.$value["id_licencia"].'"><i class="fa fa-times"></i></button>

                            </div>

                          </td>

                        </tr> ';
                  }


              ?>

            </tbody>

          </table>

        </div>
        
        
      </div>

    </section>
  </div>


  <!--=====================================
  MODAL AGREGAR LICENCIA
  ======================================-->


<div id="modalAgregarLicencia" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background: #3c8dbc; color: white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar Licencia</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->


          <div class="modal-body">

            <div class="box-body">

            <!-- ENTRADA PARA EL DOCENTE -->

              <div class="form-group">
                
                <div class="input-group col-lg-8">
                  
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  
                  <select class="form-control input-lg" id="nuevoDocente" name="nuevoDocente">
                    
                    <option value="0">Docente</option>

                    <?php


                      foreach ($docentes as $key => $value) {

                        echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                        
                      }

                    ?>

                  </select>

                </div>

              </div>


              <!-- ENTRADA PARA EL ARTICULO -->

              <div class="form-group">
                
                <div class="input-group col-lg-8">
                  
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  
                  <select class="form-control input-lg" id="nuevoArticulo" name="nuevoArticulo">
                    
                    <option value="0">Artículo</option>

                    <?php


                      foreach ($articulos as $key => $value) {

                        echo '<option value="'.$value["id_articulo"].'">'.$value["n_articulo"].' - '.$value["descripcion"].'</option>';
                        
                      }

                    ?>

                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA LA PRIMER FECHA -->       

                
              
              <div class="form-group">
                
                <div class="input-group col-lg-4">
                  
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input class="form-control input-lg" type="text" name="datepicker" id="datepicker" placeholder="Ingresar Desde" required>

          

                </div>

              </div>

              <!-- ENTRADA PARA LA SEGUNDA FECHA -->

              <div class="form-group">
                
                <div class="input-group col-lg-4">
                  
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input class="form-control input-lg" type="text" name="datepicker2" id="datepicker2" placeholder="Ingresar Hasta" required>


                </div>

              </div>


            </div>
            
          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->



          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar Licencia</button>

          </div>

          <?php

              $crearlicencia = new ControladorLicencias();
              $crearlicencia -> ctrCrearLicencia();

          ?>

    </form>
    </div>

  </div>
</div>

  

  <?php

      $borrarlicencia = new ControladorLicencias();
      $borrarlicencia -> ctrBorrarLicencia();

  ?>
  

  