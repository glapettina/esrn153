<?php

    $item = null;
    $valor = null;   

    $generos = ControladorGeneros::ctrMostrarGeneros($item, $valor);


?>       


  <div class="content-wrapper">
    
    <section class="content-header">
      <h1>
        Libros 
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Libros</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarLibro">
            
            Agregar Libro
          </button>
          
        </div>
        <div class="box-body">
          
          <table class="table table-bordered table-striped dt-responsive tablas">
            
            <thead>
              
              <tr>
                
                <th style="width: 10px">#</th>
                <th>Código</th>
                <th>Título</th>
                <th>Género</th>
                <th>Cantidad</th>
                <th>Ubicación</th>
                <th>Estado</th>
                <th>Acciones</th>
                

              </tr> 

            </thead>
            <tbody>

              <?php

                  $item = null;
                  $valor = null;
                  $tabla = "libros";


                  $libros = ControladorLibros::ctrMostrarLibros($item, $valor, $tabla);

                  foreach ($libros as $key => $value) {
                    
                    echo '<tr>
                
                          <td>'.($key+1).'</td>
                          <td>'.$value["codigo"].'</td>
                          <td>'.$value["nombre"].'</td>';

                          $item = "id";
                          $valor = $value["id_genero"];

                          $genero = ControladorGeneros::ctrMostrarGeneros($item, $valor);

                          echo '<td>'.$genero["nombre"].'</td>  

                          <td>'.$value["cantidad"].'</td>
                          <td>'.$value["ubicacion"].'</td>';

                          if ($_SESSION["perfil"] != "Preceptor") {

                              if ($value["estado"] != 0) {
                              
                                echo '<td><button class="btn btn-success btn-xs btnActivarLibro" idLibro="'.$value["id"].'" estadoLibro="0">Activado</button></td>';

                            }else{

                                echo '<td><button class="btn btn-danger btn-xs btnActivarLibro" idLibro="'.$value["id"].'" estadoLibro="1">Desactivado</button></td>';
                            }
                            
                          }else{


                          if ($value["estado"] != 0) {
                              
                                echo '<td><button class="btn btn-success btn-xs" idLibro="'.$value["id"].'" estadoLibro="0">Activado</button></td>';

                            }else{

                                echo '<td><button class="btn btn-danger btn-xs" idLibro="'.$value["id"].'" estadoLibro="1">Desactivado</button></td>';
                            }



                          }

                          


                          echo '<td>
                            
                            <div class="btn-group">';


                            if ($_SESSION["perfil"] != "Preceptor") {
                              
                                echo'<button class="btn btn-warning btnEditarLibro" idLibro="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarLibro"><i class="fa fa-pencil"></i></button>

                                  <button class="btn btn-danger btnEliminarLibro" idLibro="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                            }


                              // echo'<button class="btn btn-primary btnImprimirInformeCb" informe="informecb" tabla="primero" idAlumno="'.$value["id"].'" data-toggle="modal" data-target="#modalImprimirInformeCb"><i class="fa fa-print"></i></button>

                            echo '</div>

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
  MODAL AGREGAR LIBRO
  ======================================-->


<div id="modalAgregarLibro" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background: #3c8dbc; color: white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar Libro</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->


          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA EL CODIGO -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                  <input class="form-control input-lg" type="text" name="nuevoCodigo" placeholder="Ingresar PLU" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL NOMBRE -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input class="form-control input-lg" type="text" name="nuevoNombre" placeholder="Ingresar Título" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL GENERO --> 

              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  
                  <select class="form-control input-lg" name="nuevoGenero">

                    <option value="">Seleccionar género</option>

                    <?php

                      foreach ($generos as $key => $value) {

                        echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                        
                      }

                    ?>
                                        


                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA EL AUTOR -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input class="form-control input-lg" type="text" name="nuevoAutor" placeholder="Ingresar Autor" required>

                </div>

              </div>

              <!-- ENTRADA PARA LA EDITORIAL -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input class="form-control input-lg" type="text" name="nuevaEditorial" placeholder="Ingresar Editorial" required>

                </div>

              </div>

              <!-- ENTRADA PARA LA CANTIDAD -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input class="form-control input-lg" type="text" name="nuevaCantidad" placeholder="Ingresar Cantidad" required>

                </div>

              </div>

              <!-- ENTRADA PARA LA UBICACION -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input class="form-control input-lg" type="text" name="nuevaUbicacion" placeholder="Ingresar Ubicación" required>

                </div>

              </div>
              
            </div>
            
          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->



          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar Libro</button>

          </div>

          <?php
             

              $crearLibro = new ControladorLibros();
              $crearLibro -> ctrCrearLibro();

          ?>

    </form>
    </div>

  </div>
</div>


<!--=====================================
  MODAL EDITAR LIBRO
  ======================================-->


<div id="modalEditarLibro" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background: #3c8dbc; color: white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Editar Libro</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->


          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA EL CODIGO -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input class="form-control input-lg" type="text" id="editarCodigo" name="editarCodigo" required>

                  <input type="hidden" name="idLibro" id="idLibro"> 

                </div>

              </div>

              <!-- ENTRADA PARA EL NOMBRE -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input class="form-control input-lg" type="text" id="editarNombre" name="editarNombre" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL GENERO --> 

              
              <div class="form-group">
                
                    <div class="input-group">
                  
                       <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  
                       <select class="form-control input-lg" name="editarGenero" readonly required>
                    
                           <option id="editarGenero"></option>                    
                    
                       </select>

                </div>

              </div>

              <!-- ENTRADA PARA EL AUTOR -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input class="form-control input-lg" type="text" id="editarAutor" name="editarAutor" required>

                </div>

              </div>

              <!-- ENTRADA PARA LA EDITORIAL -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input class="form-control input-lg" type="text" id="editarEditorial" name="editarEditorial" required>

                </div>

              </div>

              <!-- ENTRADA PARA LA CANTIDAD -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input class="form-control input-lg" type="text" id="editarCantidad" name="editarCantidad" required>

                </div>

              </div>

              <!-- ENTRADA PARA LA UBICACION -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input class="form-control input-lg" type="text" id="editarUbicacion" name="editarUbicacion" required>

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
              

              $editarLibro = new ControladorLibros();
              $editarLibro -> ctrEditarLibro();

          ?>

    </form>

          
    </div>

  </div>
</div>

  <?php


      $borrarlibro = new ControladorLibros();
      $borrarlibro -> ctrBorrarLibro();

  ?>
  
  
  

  