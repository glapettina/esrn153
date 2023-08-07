<?php
  

    $item = null;
    $valor = null;   

    $cursos = ControladorCursos::ctrMostrarCursos($item, $valor);


?>       


  <div class="content-wrapper">
    
    <section class="content-header">
      <h1>
        4to. Año - Ciclo Orientado - Realización
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">4to. Año - Ciclo Orientado - Realización</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <?php

          if ($_SESSION["perfil"] != "Preceptor") {
            
              echo '<div class="box-header with-border">
                        
                <button type="submit" class="btn btn-danger" idCurso1=7 idCurso2=8 idCurso3=9 tabla="cuarto" data-toggle="modal" periodo="'.$_SESSION['periodo'].'" data-target="#modalCopiaSaberes">
                  
                  Copia Saberes
                </button>

                <button class="btn btn-primary btnInformeArea" area="realizacion" idCurso=7 idCurso2=8 idCurso3=9 tabla="cuarto" periodo="'.$_SESSION['periodo'].'" informe="informe-area-orientacion">
                  
                  Informes Curso
                </button>
                
              </div>';

          }

        ?>



        <div class="box-body">
          
          <table class="table table-bordered table-striped dt-responsive tablas">
            
            <thead>
              
              <tr>
                
                <th style="width: 10px">#</th>
                <th>DNI</th>
                <th>Apellidos y Nombres</th>
                <th>Curso</th>
                <th>Turno</th>
                <th>Acciones</th>

              </tr> 

            </thead>
            <tbody>

              <?php

                  $item = "id_curso";
                  $valor1 = 7;
                  $valor2 = 8;
                  $valor3 = 9;
                  $tabla = "cuarto";
                  $periodo = $_SESSION['periodo'];
                  $verifica = true;


                  $informes = ControladorInformes::ctrMostrarInformesOrientacion($item, $valor1, $valor2, $valor3, $tabla, $periodo, $verifica);


                  foreach ($informes as $key => $value) {
                    
                    echo '<tr>
                
                          <td>'.($key+1).'</td>
                          <td>'.$value["documento"].'</td>
                          <td>'.$value["nombre"].'</td>';

                          $item = "id";
                          $valor = $value["id_curso"];

                          $curso = ControladorCursos::ctrMostrarCursos($item, $valor);

                          echo '<td>'.$curso["nombre"].'</td>  

                          <td>'.$curso["turno"].'</td>';


                          echo '<td>';


                          if ($_SESSION["perfil"] != "Preceptor") {

                            
                            echo'<div class="btn-group">

                              <button class="btn btn-warning btnEditarInformeRealizacion" nombreAlumno="'.$value["nombre"].'" tabla="cuarto" idAlumno="'.$value["id"].'" data-toggle="modal" periodo="'.$_SESSION['periodo'].'" data-target="#modalEditarInforme"><i class="fa fa-pencil"></i></button>
                              
                            </div>';
                            
                             
                            }


                            echo '<div class="btn-group">
                                
                              <button class="btn btn-primary btnImprimirInformeIndividual" informe="informe-individual" tabla="cuarto" area="realizacion" idAlumno="'.$value["id"].'" data-toggle="modal" periodo="'.$_SESSION['periodo'].'" data-target="#modalImprimirInformeIndividual"><i class="fa fa-print"></i></button>
                              
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
  MODAL EDITAR INFORME
  ======================================-->


<div id="modalEditarInforme" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" id="modalInforme">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background: #3c8dbc; color: white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

           
            <h4 class="modal-title" id="alumnoEdicion"></h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA LOS SABERES -->          
              
              <div class="form-group">
                
                  <label for="saberesRealizacion">Saberes</label>
                      <textarea class="form-control" cols="80" rows="6" id="saberesRealizacion" name="saberesRealizacion">
                  </textarea>
              </div>

        <!-- ENTRADA PARA LA APRECIACION --> 

              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  
                  <select class="form-control input-lg" id="apreciaRealizacion" name="apreciaRealizacion">

                  <option value="">Apreciación Cualitativa</option>
                  <option value="Se Apropió de los Saberes">Se Apropió de los Saberes</option>
                  <option value="En Proceso de Apropiación de Saberes">En Proceso de Apropiación de Saberes</option>
                  <option value="No se Apropió de los Saberes">No se Apropió de los Saberes</option>
                                        

                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA LA ASISTENCIA --> 

              
              <div class="form-group">
                
                <div class="input-group">
                  
                  
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <select class="form-control input-lg" id="asistenciaRealizacion" name="asistenciaRealizacion">

                  <option value="">Asistencia</option>
                  <option value="0 %">0 %</option>
                  <option value="25 %">25 %</option>
                  <option value="50 %">50 %</option>
                  <option value="75 %">75 %</option>
                  <option value="100 %">100 %</option>
                                        

                  </select>

                </div>

              </div>


              <div class="form-group">          
                  <label for="observaRealizacion">Observaciones</label>
                      <textarea class="form-control" cols="80" rows="3" id="observaRealizacion" name="observaRealizacion">
                  </textarea>
              </div>


            </div>
            
          </div>
          
          <!--=====================================
          PIE DEL MODAL
          ======================================-->



          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

           <!--  <?php

              $idCurso = 1;

            echo'<button type="button" curso="'.$idCurso.'" tabla="primero" class="btn btn-danger pull-center" id="btnCopia">Copiar Saberes</button>';

            ?>  -->

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>

              <input type="hidden" name="idAlumno" id="idAlumno"> 

          </div>       

         <?php

              $tabla = "cuarto";
              $curso = "4-realizacion";

              $editarInforme = new ControladorInformes();
              $editarInforme -> ctrEditarInformeRealizacion($tabla, $curso);

          ?>

    </form>

          
    </div>

  </div>
</div>


<!--=====================================
  MODAL COPIA SABERES
  ======================================-->


<div id="modalCopiaSaberes" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background: #3c8dbc; color: white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

           
              <h4 class="modal-title">Copia Saberes</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA LOS SABERES -->          
              
              <div class="form-group">
                
                  <label for="copiaSaberesRealizacion">Saberes</label>
                      <textarea class="form-control" cols="80" rows="6" id="copiaSaberesRealizacion" name="copiaSaberesRealizacion">
                  </textarea>
              </div>


            </div>
            
          </div>
          
          <!--=====================================
          PIE DEL MODAL
          ======================================-->



          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
           

            <button type="submit" class="btn btn-primary">Copiar Saberes</button>

              <input type="hidden" name="idAlumno" id="idAlumno"> 

          </div>       

         <?php

              $tabla = "cuarto";
              $curso = "4-realizacion";
              $ncurso1 = 7;
              $ncurso2 = 8;
              $ncurso3 = 9;
              $periodo = $_SESSION['periodo'];

              $copiaSaberes = new ControladorInformes();
              $copiaSaberes -> ctrCopiarSaberesRealizacion($tabla, $curso, $ncurso1, $ncurso2, $ncurso3, $periodo);

          ?>

    </form>

          
    </div>

  </div>
</div>



