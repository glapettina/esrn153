  <div class="content-wrapper">
    
    <section class="content-header">
      <h1>
        Administrar Artículos
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Artículos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArticulo">
            
            Agregar Artículo
          </button>
          
        </div>
        <div class="box-body">
          
          <table class="table table-bordered table-striped dt-responsive tablas">
            
            <thead>
              
              <tr>
                
                <th style="width: 10px">#</th>
                <th>Artículo</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>

              </tr> 

            </thead>
            <tbody>
              
              <?php

                  $item = null;
                  $valor = null;

                  $articulos = ControladorArticulos::ctrMostrarArticulos($item, $valor);

                  foreach ($articulos as $key => $value) {
                    
                    echo '<tr>
                
                          <td>'.($key+1).'</td>
                          <td>'.$value["n_articulo"].'</td>
                          <td>'.$value["descripcion"].'</td>';

                          if ($value["estado"] != 0) {
                          
                          echo '<td><button class="btn btn-success btn-xs btnActivarArticulo" onclick="Activar()" idArticulo="'.$value["id_articulo"].'" estadoArticulo="0">Activado</button></td>';

                        }else{

                          echo '<td><button class="btn btn-danger btn-xs btnActivarArticulo" onclick="Activar()" idArticulo="'.$value["id_articulo"].'" estadoArticulo="1">Desactivado</button></td>';
                        }

                          echo '<td>
                            
                            <div class="btn-group">
                                
                              <button class="btn btn-warning btnEditarArticulo" idArticulo="'.$value["id_articulo"].'" data-toggle="modal" data-target="#modalEditarArticulo"><i class="fa fa-pencil"></i></button>

                              <button class="btn btn-danger btnEliminarArticulo" idArticulo="'.$value["id_articulo"].'"><i class="fa fa-times"></i></button>

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
  MODAL AGREGAR ARTICULO
  ======================================-->


<div id="modalAgregarArticulo" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background: #3c8dbc; color: white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar Artículo</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->


          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA EL ARTICULO -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input class="form-control input-lg" type="text" name="nuevoArticulo" placeholder="Ingresar Nº artículo" required>

                </div>

              </div>


              <!-- ENTRADA PARA LA DESCRIPCION -->

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input class="form-control input-lg" type="text" name="nuevaDescripcion" placeholder="Ingresar descripción" required>

                </div>

              </div>


              

            </div>
            
          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->



          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar Artículo</button>

          </div>

          <?php

              $creararticulo = new ControladorArticulos();
              $creararticulo -> ctrCrearArticulo();

          ?>

    </form>
    </div>

  </div>
</div>

  
  <!--=====================================
  MODAL EDITAR ARTICULO
  ======================================-->


<div id="modalEditarArticulo" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background: #3c8dbc; color: white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Editar Artículo</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->


          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA EL ARTICULO -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input class="form-control input-lg" type="text" name="editarArticulo" id="editarArticulo" required>
                  
                </div>

              </div>  

                <!-- ENTRADA PARA LA DESCRIPCION -->

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input class="form-control input-lg" type="text" name="editarDescripcion" id="editarDescripcion" required>

                  <input type="hidden" name="idArticulo" id="idArticulo">


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

              $editararticulo = new ControladorArticulos();
              $editararticulo -> ctrEditarArticulo();

          ?>

    </form>
    </div>

  </div>
</div>

  <?php

      $borrararticulo = new ControladorArticulos();
      $borrararticulo -> ctrBorrarArticulo();

  ?>
  

  