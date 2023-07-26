  <div class="content-wrapper">
    
    <section class="content-header">
      <h1>
        Administrar Usuarios
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
            
            Agregar Usuario
          </button>
          
        </div>
        <div class="box-body">
          
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            
            <thead>
              
              <tr>
                
                <th style="width: 10px">#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Foto</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Último Login</th>
                <th>Acciones</th>

              </tr> 

            </thead>
            <tbody>

              <?php

                $item = null;
                $valor = null;

                $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                foreach ($usuarios as $key => $value) {
                  
                  echo '<tr>
                
                        <td>'.($key+1).'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["usuario"].'</td>';

                          if ($value["foto"] != "") {
                            
                            echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                          }else{

                            echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                          }


                        
                        echo '<td>'.$value["perfil"].'</td>';

                        if ($value["estado"] != 0) {
                          
                          echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                        }else{

                          echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';
                        }


                        
                        
                        echo '<td>'.$value["ultimo_login"].'</td>
                        <td>
                          
                          <div class="btn-group">
                              
                            <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

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
  MODAL AGREGAR USUARIO
  ======================================-->


<div id="modalAgregarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background: #3c8dbc; color: white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar Usuario</h4>

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
                  <input class="form-control input-lg" type="text" name="nuevoNombre" placeholder="Ingresar Apellidos y Nombres" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL CUIL -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input class="form-control input-lg" type="text" name="nuevoCuil" placeholder="Ingresar CUIL (Solo números)" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL Nº DE LEGAJO -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input class="form-control input-lg" type="text" name="nuevoLegajo" placeholder="Ingresar Nº Legajo Personal" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL TELEFONO -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <input class="form-control input-lg" type="text" name="nuevoTelefono" placeholder="Ingresar teléfono" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL DOMICILIO -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-home"></i></span>
                  <input class="form-control input-lg" type="text" name="nuevoDomicilio" placeholder="Ingresar domicilio" required>

                </div>

              </div>

              <!-- ENTRADA PARA SELECCIONAR CIUDAD -->

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  
                  <select class="form-control input-lg" id="nuevaCiudad" name="nuevaCiudad" required>
                    
                    <option value="">Seleccionar ciudad</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $ciudades = ControladorCiudades::ctrMostrarCiudades($item, $valor);

                      foreach ($ciudades as $key => $value) {
                        
                        echo '<option value="'.$value["id_ciudad"].'">'.$value["nombre"].'</option>';
                      }

                    ?>
                    

                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA SELECCIONAR MOVILIDAD -->

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                  
                  <select class="form-control input-lg" name="nuevoMovilidad">
                    
                    <option value="">Percibe movilidad?</option>
                    <option value="1">SI</option>
                    <option value="0">NO</option>

                  </select>

                </div>

              </div>

               <!-- ENTRADA PARA SELECCIONAR TIPO DE VEHICULO -->

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-bus"></i></span>
                  
                  <select class="form-control input-lg" name="nuevoVehiculo">
                    
                    <option value="">Seleccione tipo de vehículo</option>
                    <option value="Particular">Particular</option>
                    <option value="Taxi">Taxi</option>
                    <option value="Motocicleta">Motocicleta</option>


                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA EL DOMINIO -->      

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-car"></i></span>
                  <input class="form-control input-lg" type="text" name="nuevoDominio" placeholder="Ingresar dominio" id="nuevoDominio">

                </div>

              </div>

              <!-- ENTRADA PARA EL USUARIO -->      

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input class="form-control input-lg" type="text" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

                </div>

              </div>

              <!-- ENTRADA PARA LA CONTRASEÑA -->      

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input class="form-control input-lg" type="password" name="nuevoPassword" placeholder="Ingresar contraseña" required>

                </div>

              </div>

              <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  
                  <select class="form-control input-lg" name="nuevoPerfil">
                    
                    <option value="">Seleccionar perfil</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Directivo">Directivo</option>
                    <option value="Secretario">Secretario</option>
                    <option value="Docente Científica">Docente Científica</option>
                    <option value="Docente Sociales">Docente Sociales</option>
                    <option value="Docente Segundas Lenguas">Docente Segundas Lenguas</option>
                    <option value="Docente Matemática">Docente Matemática</option>
                    <option value="Docente Educación Física">Docente Educación Física</option>
                    <option value="Docente Educación Artística">Docente Educación Artística</option>
                    <option value="Docente Lengua y Literatura">Docente Lengua y Literatura</option>
                    <option value="Docente Modalidad">Docente Modalidad</option>
                    <option value="Preceptor">Preceptor</option>
                    <option value="REVE">REVE</option>


                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA SUBIR FOTO -->

              <div class="form-group">
                
               <div class="panel">SUBIR FOTO</div>
               <input type="file" class="nuevaFoto" name="nuevaFoto">

               <p class="help-block">Peso máximo de la foto 2 MB</p>
               <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              </div>

            </div>
            
          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->



          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar Usuario</button>

          </div>

          <?php

              $crearUsuario = new ControladorUsuarios();
              $crearUsuario -> ctrCrearUsuario();

          ?>

    </form>
    </div>

  </div>
</div>



<!--=====================================
  MODAL EDITAR USUARIO
  ======================================-->


<div id="modalEditarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background: #3c8dbc; color: white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Editar Usuario</h4>

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
                  <input class="form-control input-lg" type="text" id="editarNombre" name="editarNombre" value="" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL CUIL -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input class="form-control input-lg" type="text" name="editarCuil" id="editarCuil" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL Nº DE LEGAJO -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input class="form-control input-lg" type="text" name="editarLegajo" id="editarLegajo" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL TELEFONO -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <input class="form-control input-lg" type="text" name="editarTelefono" id="editarTelefono"  required>

                </div>

              </div>

              <!-- ENTRADA PARA EL DOMICILIO -->          
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-home"></i></span>
                  <input class="form-control input-lg" type="text" name="editarDomicilio" id="editarDomicilio" required>

                </div>

              </div>

              <!-- ENTRADA PARA SELECCIONAR CIUDAD -->

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  
                  <select class="form-control input-lg" id="editarCiudad" name="editarCiudad" required>
                    
                    <option value="">Seleccionar ciudad</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $ciudades = ControladorCiudades::ctrMostrarCiudades($item, $valor);

                      foreach ($ciudades as $key => $value) {
                        
                        echo '<option value="'.$value["id_ciudad"].'">'.$value["nombre"].'</option>';
                      }

                    ?>
                    

                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA SELECCIONAR MOVILIDAD -->

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                  
                  <select class="form-control input-lg" name="editarMovilidad" id="editarMovilidad">
                    
                    <option value="">Percibe movilidad?</option>
                    <option value="1">SI</option>
                    <option value="0">NO</option>

                  </select>

                </div>

              </div>

               <!-- ENTRADA PARA SELECCIONAR TIPO DE VEHICULO -->

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-bus"></i></span>
                  
                  <select class="form-control input-lg" name="editarVehiculo" id="editarVehiculo">
                    
                    <option value="">Seleccione tipo de vehículo</option>
                    <option value="Particular">Particular</option>
                    <option value="Taxi">Taxi</option>
                    <option value="Motocicleta">Motocicleta</option>


                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA EL DOMINIO -->      

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-car"></i></span>
                  <input class="form-control input-lg" type="text" name="editarDominio" id="editarDominio">

                </div>

              </div>

              <!-- ENTRADA PARA EL USUARIO -->      

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input class="form-control input-lg" type="text" id="editarUsuario" name="editarUsuario" value="" readonly>

                </div>

              </div>

              <!-- ENTRADA PARA LA CONTRASEÑA -->      

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input class="form-control input-lg" type="password" name="editarPassword" placeholder="Ingrese una nueva contraseña">
                  <input type="hidden" id="passwordActual" name="passwordActual">

                </div>

              </div>

              <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  
                  <select class="form-control input-lg" name="editarPerfil" id="editarPerfil">
                    
                    <option value="">Seleccionar perfil</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Directivo">Directivo</option>
                    <option value="Secretario">Secretario</option>
                    <option value="Docente Científica">Docente Científica</option>
                    <option value="Docente Sociales">Docente Sociales</option>
                    <option value="Docente Segundas Lenguas">Docente Segundas Lenguas</option>
                    <option value="Docente Matemática">Docente Matemática</option>
                    <option value="Docente Educación Física">Docente Educación Física</option>
                    <option value="Docente Educación Artística">Docente Educación Artística</option>
                    <option value="Docente Lengua y Literatura">Docente Lengua y Literatura</option>
                    <option value="Docente Modalidad">Docente Modalidad</option>
                    <option value="Preceptor">Preceptor</option>
                    <option value="REVE">REVE</option>


                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA SUBIR FOTO -->

              <div class="form-group">
                
               <div class="panel">SUBIR FOTO</div>
               <input type="file" class="nuevaFoto" name="editarFoto">

               <p class="help-block">Peso máximo de la foto 2 MB</p>
               <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
               <input type="hidden" name="fotoActual" id="fotoActual">

              </div>

            </div>
            
          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->



          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Modificar Usuario</button>

          </div>

           <?php

              $editarUsuario = new ControladorUsuarios();
              $editarUsuario -> ctrEditarUsuario();

          ?> 

    </form>
    </div>

  </div>
</div>

<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?>  
  
  

  