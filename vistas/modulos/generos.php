  <div class="content-wrapper">
    
    <section class="content-header">
      <h1>
        Administrar Géneros Literarios
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Géneros Literarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarGenero">
            
            Agregar Género
          </button>
          
        </div>
        <div class="box-body">
          
          <table class="table table-bordered table-striped dt-responsive tablas">
            
            <thead>
              
              <tr>
                
                <th style="width: 10px">#</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>

              </tr> 

            </thead>
            <tbody>
              
              <?php

                  $item = null;
                  $valor = null;

                  $generos = ControladorGeneros::ctrMostrarGeneros($item, $valor);

                  foreach ($generos as $key => $value) {
                    
                    echo '<tr>
                
                          <td>'.($key+1).'</td>
                          <td>'.$value["nombre"].'</td>';

                          if ($value["estado"] != 0) {
                          
                          echo '<td><button class="btn btn-success btn-xs btnActivarGenero" idGenero="'.$value["id"].'" estadoGenero="0">Activado</button></td>';

                        }else{

                          echo '<td><button class="btn btn-danger btn-xs btnActivarGenero" idGenero="'.$value["id"].'" estadoGenero="1">Desactivado</button></td>';
                        }

                          echo '<td>
                            
                            <div class="btn-group">
                                
                              <button class="btn btn-warning btnEditarGenero" idGenero="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarGenero"><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-danger btnEliminarGenero" idGenero="'.$value["id"].'"><i class="fa fa-times"></i></button>

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
  MODAL AGREGAR GENERO
  ======================================-->


<div id="modalAgregarGenero" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background: #3c8dbc; color: white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar Género</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->


          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA EL NOMBRE -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input class="form-control input-lg" type="text" name="nuevoNombre" placeholder="Ingresar nombre" required>

                </div>

              </div>


            </div>
            
          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->



          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar Género</button>

          </div>

          <?php

              $creargenero = new ControladorGeneros();
              $creargenero -> ctrCrearGenero();

          ?>

    </form>
    </div>

  </div>
</div>

  
  <!--=====================================
  MODAL EDITAR GENERO
  ======================================-->


<div id="modalEditarGenero" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background: #3c8dbc; color: white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Editar Género</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->


          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA EL NOMBRE -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input class="form-control input-lg" type="text" name="editarGenero" id="editarGenero" required>
                  <input type="hidden" name="idGenero" id="idGenero">

                </div>

              </div>  

              
            </div>
            
          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->



          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>

          </div>

          <?php

              $editargenero = new ControladorGeneros();
              $editargenero -> ctrEditarGenero();

          ?>

    </form>
    </div>

  </div>
</div>

  <?php

              $borrargenero = new ControladorGeneros();
              $borrargenero -> ctrBorrarGenero();

  ?>
  

  