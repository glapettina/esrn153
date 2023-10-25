<?php
  

    $item = null;
    $valor = null;   

    $cursos = ControladorCursos::ctrMostrarCursos($item, $valor);


?>       


  <div class="content-wrapper">
    
    <section class="content-header">
      <h1>
        Informe de Seguimiento Bloque Académico - 2º Año TM - Area Científica y Tecnológica
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Informe de Seguimiento Bloque Académico - 2º Año TM - Area Científica y Tecnológica</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <?php

          if ($_SESSION["perfil"] != "Preceptor") {
            
              echo '<div class="box-header with-border">
                        

                <button class="btn btn-primary btnSeguimientoArea" area="cientifica" idCurso=3 tabla="seguimiento" periodo="'.$_SESSION['periodo'].'" informe="seguimiento-area">
                  
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
                  $valor = 3;
                  $tabla = "seguimiento";
                  $periodo = $_SESSION["periodo"];
                  $verifica = true;


                  $informes = ControladorInformes::ctrMostrarInformes($item, $valor, $tabla, $periodo, $verifica);


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

                              <button class="btn btn-warning btnEditarSeguimientoCientifica" nombreAlumno="'.$value["nombre"].'" tabla="seguimiento" periodo="'.$_SESSION['periodo'].'" idAlumno="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarSeguimiento"><i class="fa fa-pencil"></i></button>
                              
                            </div>';
                            
                             
                            }


                            echo '<div class="btn-group">
                                
                              <button class="btn btn-primary btnImprimirSeguimientoIndividual" informe="informe-seguimiento" periodo="'.$_SESSION['periodo'].'" tabla="seguimiento" area="cientifica" idAlumno="'.$value["id"].'" data-toggle="modal" data-target="#modalImprimirInformeIndividual"><i class="fa fa-print"></i></button>
                              
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
  MODAL EDITAR INFORME SEGUIMIENTO
  ======================================-->


<div id="modalEditarSeguimiento" class="modal fade" role="dialog">

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

              <!-- ENTRADA PARA EL CRITERIO DE ACREDITACIÓN  -->          
              
              <div class="form-group">
                
                  <label for="acreditacionCientifica">Criterio de Acreditación</label>
                      <textarea class="form-control" cols="80" rows="4" id="acreditacionCientifica" name="acreditacionCientifica">
                  </textarea>
              </div>

                <!-- ENTRADA PARA EL CRITERIO DE EVALUACIÓN  -->          
  
                <div class="form-group">
                
                <label for="evaluacionCientifica">Criterio de Evaluación</label>
                    <textarea class="form-control" cols="80" rows="4" id="evaluacionCientifica" name="evaluacionCientifica">
                </textarea>
            </div>

                <!-- ENTRADA PARA EL INDICADOR DE EVALUACIÓN  -->          

                <div class="form-group">
                
                <label for="indicadorCientifica">Indicador de Evaluación</label>
                    <textarea class="form-control" cols="80" rows="4" id="indicadorCientifica" name="indicadorCientifica">
                </textarea>
            </div>

        <!-- ENTRADA PARA LA APRECIACION --> 

              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  
                  <select class="form-control input-lg" id="apreciaCientifica" name="apreciaCientifica">

                  <option value="">Apreciación Cualitativa</option>
                  <option value="Saberes Apropiados">Saberes Apropiados</option>
                  <option value="Saberes No Apropiados">Saberes No Apropiados</option>
                                        

                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA LA ASISTENCIA --> 

              
              <div class="form-group">
                
                <div class="input-group">
                  
                  
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <select class="form-control input-lg" id="asistenciaCientifica" name="asistenciaCientifica">

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
                  <label for="observaCientifica">Comentarios y Sugerencias para la Continuidad de la Trayectoria</label>
                      <textarea class="form-control" cols="80" rows="4" id="observaCientifica" name="observaCientifica">
                  </textarea>
              </div>


            </div>
            
          </div>
          
          <!--=====================================
          PIE DEL MODAL
          ======================================-->



          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>

              <input type="hidden" name="idAlumno" id="idAlumno"> 

          </div>       

         <?php

              $tabla = "seguimiento";
              $curso = "2tm-seguimiento-cientifica";

              $editarInforme = new ControladorInformes();
              $editarInforme -> ctrEditarSeguimientoCientifica($tabla, $curso);

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
                
                  <label for="copiaSaberesCientifica">Saberes</label>
                      <textarea class="form-control" cols="80" rows="6" id="copiaSaberesCientifica" name="copiaSaberesCientifica">
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

              $tabla = "segundo";
              $curso = "2tm-cientifica";
              $ncurso = 3;
              $periodo = $_SESSION["periodo"];

              $copiaSaberes = new ControladorInformes();
              $copiaSaberes -> ctrCopiarSaberesCientifica($tabla, $curso, $ncurso, $periodo);

          ?>

    </form>

          
    </div>

  </div>
</div>



