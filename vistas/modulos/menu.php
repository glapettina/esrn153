<aside class="main-sidebar">

	<section class="sidebar">

		<ul class="sidebar-menu">

			<li class="active">
				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>
			</li>

			<?php

			if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Secretario" || $_SESSION["perfil"] == "Directivo") {

					echo '<li class="treeview">
			          <a href="#">
			            <i class="fa fa-graduation-cap"></i>
			            <span>Alumnos</span>
			            <span class="pull-right-container">
			              <i class="fa fa-angle-left pull-right"></i>
			            </span>
			          </a>
			          <ul class="treeview-menu">
			            <li><a href="primero"><i class="fa fa-circle-o"></i> Primer Año</a></li>
			            <li><a href="segundo"><i class="fa fa-circle-o"></i> Segundo Año</a></li>
			            <li><a href="tercero"><i class="fa fa-circle-o"></i> Tercer Año</a></li>
			            <li><a href="cuarto"><i class="fa fa-circle-o"></i> Cuarto Año</a></li>
			            <li><a href="quinto"><i class="fa fa-circle-o"></i> Quinto Año</a></li>
			          </ul>
		    	    </li>';


    			}

    		?>

    		<li class="treeview">
            
                <a href="#">
                    <i class="fa fa-calendar" aria-hidden="true"></i> <span>Informes Cualitativos</span>
                    <!-- <span class="pull-right-container badge bg-blue"> -->
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  
                </a>
               
               <?php
                 
                  if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Secretario" || $_SESSION["perfil"] == "Directivo" || $_SESSION["perfil"] == "Preceptor") {
  

             echo'<li class="treeview">
                <a href="#">
                  <i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span>Emisión de Informes</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>

                  <ul class="treeview-menu">
                      <li><a href="primero"><i class="fa fa-circle-o"></i> 1er. Año</a></li>
                      <li><a href="segundo"><i class="fa fa-circle-o"></i> 2º Año</a></li>
                      <li><a href="tercero"><i class="fa fa-circle-o"></i> 3er. Año</a></li>
                      <li><a href="cuarto"><i class="fa fa-circle-o"></i> 4º Año</a></li>             
                      <li><a href="quinto"><i class="fa fa-circle-o"></i> 5º Año</a></li>             
                  </ul>           
            </li>';

            }

        ?>

        <?php

        if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Directivo" || $_SESSION["perfil"] == "Docente Científica") {
           

 			echo'<li class="treeview">
                <a href="#">
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i> <span>Científica y Tecnológica</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>

               <ul class="treeview-menu">                
                  <li><a href="1tm-cientifica"><i class="fa fa-circle-o"></i> 1er. Año - TM</a></li>
                  <li><a href="1tt-cientifica"><i class="fa fa-circle-o"></i> 1er. Año - TT</a></li>
                  <li><a href="2tm-cientifica"><i class="fa fa-circle-o"></i> 2º Año - TM</a></li>
                  <li><a href="2tt-cientifica"><i class="fa fa-circle-o"></i> 2º Año - TT</a></li>
                  <li><a href="3tm-cientifica"><i class="fa fa-circle-o"></i> 3er. Año - TM</a></li>
                  <li><a href="3tt-cientifica"><i class="fa fa-circle-o"></i> 3er. Año - TT</a></li>
                  <li><a href="4tm-cientifica"><i class="fa fa-circle-o"></i> 4º Año - TM</a></li>             
                  <li><a href="41tt-cientifica"><i class="fa fa-circle-o"></i> 4º Año 1ra. - TT</a></li>             
                  <li><a href="42tt-cientifica"><i class="fa fa-circle-o"></i> 4º Año 2da. - TT</a></li>             
                  <li><a href="5tm-cientifica"><i class="fa fa-circle-o"></i> 5º Año - TM</a></li>             
                  <li><a href="51tt-cientifica"><i class="fa fa-circle-o"></i> 5º Año 1ra. - TT</a></li>             
                  <li><a href="52tt-cientifica"><i class="fa fa-circle-o"></i> 5º Año 2da. - TT</a></li>             
              </ul>

           
            </li>';

             }

        ?>

        <?php

        if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Directivo" || $_SESSION["perfil"] == "Docente Sociales") {

            echo '<li class="treeview">
                <a href="#">
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i> <span>Sociales y Humanidades</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>

               <ul class="treeview-menu">
                  <li><a href="1tm-sociales"><i class="fa fa-circle-o"></i> 1er. Año - TM</a></li>
                  <li><a href="1tt-sociales"><i class="fa fa-circle-o"></i> 1er. Año - TT</a></li>
                  <li><a href="2tm-sociales"><i class="fa fa-circle-o"></i> 2º Año - TM</a></li>
                  <li><a href="2tt-sociales"><i class="fa fa-circle-o"></i> 2º Año - TT</a></li>
                  <li><a href="3tm-sociales"><i class="fa fa-circle-o"></i> 3er. Año - TM</a></li>
                  <li><a href="3tt-sociales"><i class="fa fa-circle-o"></i> 3er. Año - TT</a></li>
                  <li><a href="4tm-sociales"><i class="fa fa-circle-o"></i> 4º Año - TM</a></li>             
                  <li><a href="41tt-sociales"><i class="fa fa-circle-o"></i> 4º Año 1ra. - TT</a></li>             
                  <li><a href="42tt-sociales"><i class="fa fa-circle-o"></i> 4º Año 2da. - TT</a></li>             
                  <li><a href="5tm-sociales"><i class="fa fa-circle-o"></i> 5º Año - TM</a></li>             
                  <li><a href="51tt-sociales"><i class="fa fa-circle-o"></i> 5º Año 1ra. - TT</a></li>             
                  <li><a href="52tt-sociales"><i class="fa fa-circle-o"></i> 5º Año 2da. - TT</a></li>             
              </ul>

           
            </li>';

            }

        ?>

        <?php


        if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Directivo" || $_SESSION["perfil"] == "Docente Lengua y Literatura") {



            echo'<li class="treeview">
                <a href="#">
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i> <span>Lengua y Literatura</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>

               <ul class="treeview-menu">
                  <li><a href="1tm-literatura"><i class="fa fa-circle-o"></i> 1er. Año - TM</a></li>
                  <li><a href="1tt-literatura"><i class="fa fa-circle-o"></i> 1er. Año - TT</a></li>
                  <li><a href="2tm-literatura"><i class="fa fa-circle-o"></i> 2º Año - TM</a></li>
                  <li><a href="2tt-literatura"><i class="fa fa-circle-o"></i> 2º Año - TT</a></li>
                  <li><a href="3tm-literatura"><i class="fa fa-circle-o"></i> 3er. Año - TM</a></li>
                  <li><a href="3tt-literatura"><i class="fa fa-circle-o"></i> 3er. Año - TT</a></li>
                  <li><a href="4tm-literatura"><i class="fa fa-circle-o"></i> 4º Año - TM</a></li>             
                  <li><a href="41tt-literatura"><i class="fa fa-circle-o"></i> 4º Año 1ra. - TT</a></li>             
                  <li><a href="42tt-literatura"><i class="fa fa-circle-o"></i> 4º Año 2da. - TT</a></li>             
                  <li><a href="5tm-literatura"><i class="fa fa-circle-o"></i> 5º Año - TM</a></li>             
                  <li><a href="51tt-literatura"><i class="fa fa-circle-o"></i> 5º Año 1ra. - TT</a></li>             
                  <li><a href="52tt-literatura"><i class="fa fa-circle-o"></i> 5º Año 2da. - TT</a></li>             
             
              </ul>

           
            </li>';

            }

        ?>

        <?php

        if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Directivo" || $_SESSION["perfil"] == "Docente Matemática") {


            echo'<li class="treeview">
                <a href="#">
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i> <span>Matemática</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>

               <ul class="treeview-menu">
                  <li><a href="1tm-matematica"><i class="fa fa-circle-o"></i> 1er. Año - TM</a></li>
                  <li><a href="1tt-matematica"><i class="fa fa-circle-o"></i> 1er. Año - TT</a></li>
                  <li><a href="2tm-matematica"><i class="fa fa-circle-o"></i> 2º Año - TM</a></li>
                  <li><a href="2tt-matematica"><i class="fa fa-circle-o"></i> 2º Año - TT</a></li>
                  <li><a href="3tm-matematica"><i class="fa fa-circle-o"></i> 3er. Año - TM</a></li>
                  <li><a href="3tt-matematica"><i class="fa fa-circle-o"></i> 3er. Año - TT</a></li>
                  <li><a href="4tm-matematica"><i class="fa fa-circle-o"></i> 4º Año - TM</a></li>             
                  <li><a href="41tt-matematica"><i class="fa fa-circle-o"></i> 4º Año 1ra. - TT</a></li>             
                  <li><a href="42tt-matematica"><i class="fa fa-circle-o"></i> 4º Año 2da. - TT</a></li>             
                  <li><a href="5tm-matematica"><i class="fa fa-circle-o"></i> 5º Año - TM</a></li>             
                  <li><a href="51tt-matematica"><i class="fa fa-circle-o"></i> 5º Año 1ra. - TT</a></li>             
                  <li><a href="52tt-matematica"><i class="fa fa-circle-o"></i> 5º Año 2da. - TT</a></li>             
             
              </ul>

           
            </li>';

            }

        ?>

        <?php

        if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Directivo" || $_SESSION["perfil"] == "Docente Segundas Lenguas") {

            echo'<li class="treeview">
                <a href="#">
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i> <span>Segundas Lenguas</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>

               <ul class="treeview-menu">
                  <li><a href="1tm-ingles"><i class="fa fa-circle-o"></i> 1er. Año - TM</a></li>
                  <li><a href="1tt-ingles"><i class="fa fa-circle-o"></i> 1er. Año - TT</a></li>
                  <li><a href="2tm-ingles"><i class="fa fa-circle-o"></i> 2º Año - TM</a></li>
                  <li><a href="2tt-ingles"><i class="fa fa-circle-o"></i> 2º Año - TT</a></li>
                  <li><a href="3tm-ingles"><i class="fa fa-circle-o"></i> 3er. Año - TM</a></li>
                  <li><a href="3tt-ingles"><i class="fa fa-circle-o"></i> 3er. Año - TT</a></li>
                  <li><a href="4tm-ingles"><i class="fa fa-circle-o"></i> 4º Año - TM</a></li>             
                  <li><a href="41tt-ingles"><i class="fa fa-circle-o"></i> 4º Año 1ra. - TT</a></li>             
                  <li><a href="42tt-ingles"><i class="fa fa-circle-o"></i> 4º Año 2da. - TT</a></li>             
                  <li><a href="5tm-ingles"><i class="fa fa-circle-o"></i> 5º Año - TM</a></li>             
                  <li><a href="51tt-ingles"><i class="fa fa-circle-o"></i> 5º Año 1ra. - TT</a></li>             
                  <li><a href="52tt-ingles"><i class="fa fa-circle-o"></i> 5º Año 2da. - TT</a></li>             
             
              </ul>

           
            </li>';

            }

        ?>

        <?php

        if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Directivo" || $_SESSION["perfil"] == "Docente Educación Física") {


            echo'<li class="treeview">
                <a href="#">
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i> <span>Educación Física</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>

               <ul class="treeview-menu">
                  <li><a href="1tm-edfisica"><i class="fa fa-circle-o"></i> 1er. Año - TM</a></li>
                  <li><a href="1tt-edfisica"><i class="fa fa-circle-o"></i> 1er. Año - TT</a></li>
                  <li><a href="2tm-edfisica"><i class="fa fa-circle-o"></i> 2º Año - TM</a></li>
                  <li><a href="2tt-edfisica"><i class="fa fa-circle-o"></i> 2º Año - TT</a></li>
                  <li><a href="3tm-edfisica"><i class="fa fa-circle-o"></i> 3er. Año - TM</a></li>
                  <li><a href="3tt-edfisica"><i class="fa fa-circle-o"></i> 3er. Año - TT</a></li>
                  <li><a href="4tm-edfisica"><i class="fa fa-circle-o"></i> 4º Año - TM</a></li>             
                  <li><a href="41tt-edfisica"><i class="fa fa-circle-o"></i> 4º Año 1ra. - TT</a></li>             
                  <li><a href="42tt-edfisica"><i class="fa fa-circle-o"></i> 4º Año 2da. - TT</a></li>             
                  <li><a href="5tm-edfisica"><i class="fa fa-circle-o"></i> 5º Año - TM</a></li>             
                  <li><a href="51tt-edfisica"><i class="fa fa-circle-o"></i> 5º Año 1ra. - TT</a></li>             
                  <li><a href="52tt-edfisica"><i class="fa fa-circle-o"></i> 5º Año 2da. - TT</a></li>             
             
              </ul>

           
            </li>';

            }

        ?>

        <?php


        if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Directivo" || $_SESSION["perfil"] == "Docente Educación Artística") {


            echo'<li class="treeview">
                <a href="#">
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i> <span>Lenguajes Artísticos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>

               <ul class="treeview-menu">
                  <li><a href="1tm-artistica"><i class="fa fa-circle-o"></i> 1er. Año - TM</a></li>
                  <li><a href="1tt-artistica"><i class="fa fa-circle-o"></i> 1er. Año - TT</a></li>
                  <li><a href="2tm-artistica"><i class="fa fa-circle-o"></i> 2º Año - TM</a></li>
                  <li><a href="2tt-artistica"><i class="fa fa-circle-o"></i> 2º Año - TT</a></li>
                  <li><a href="3tm-artistica"><i class="fa fa-circle-o"></i> 3er. Año - TM</a></li>
                  <li><a href="3tt-artistica"><i class="fa fa-circle-o"></i> 3er. Año - TT</a></li>
                  <li><a href="4tm-artistica"><i class="fa fa-circle-o"></i> 4º Año - TM</a></li>             
                  <li><a href="41tt-artistica"><i class="fa fa-circle-o"></i> 4º Año 1ra. - TT</a></li>             
                  <li><a href="42tt-artistica"><i class="fa fa-circle-o"></i> 4º Año 2da. - TT</a></li>             
             
              </ul>

           
            </li>';

               }

            ?>

            <?php

            if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Directivo" || $_SESSION["perfil"] == "Docente Modalidad") {


                  echo'<li class="treeview">
                      <a href="#">
                          <i class="fa fa-graduation-cap"></i>  Ciclo Orientado
                          <i class="fa fa-angle-left pull-right"></i>
                      </a>                            

                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i>
                                    3er. Año
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>

                                <ul class="treeview-menu">
                                    <li class="treeview">
                                      <li>
                                            <a href="3-fotografia">
                                            <i class="fa fa-check-circle-o"></i>
                                                Fotografía                          
                                            </a>
                                      </li>  
                                      <li>
                                            <a href="3-realizacion">
                                            <i class="fa fa-check-circle-o"></i>
                                                Realización                          
                                            </a>
                                      </li>  
                                  </li>
                              </li>
                          </ul>
                          </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-circle-o"></i>
                                    4º Año
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                            
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <li>
                                          <a href="4-fotografia">
                                          <i class="fa fa-check-circle-o"></i>
                                              Fotografía                          
                                          </a>
                                    </li>
                                    <li>
                                          <a href="4-realizacion">
                                          <i class="fa fa-check-circle-o"></i>
                                              Realización                          
                                          </a>
                                    </li>
                                    <li>
                                          <a href="4-guion">
                                          <i class="fa fa-check-circle-o"></i>
                                              Guion                          
                                          </a>
                                    </li>
                                    <li>
                                          <a href="4-sonido">
                                          <i class="fa fa-check-circle-o"></i>
                                              Sonido                          
                                          </a>
                                    </li>
                                </li>
                            </ul>
                            </li>
                            </li>
                            <li class="treeview">
                                  <a href="#">
                                      <i class="fa fa-circle-o"></i>
                                      5º Año
                                      <i class="fa fa-angle-left pull-right"></i>
                                  </a>
                            
                            <ul class="treeview-menu">
                                <li class="treeview">
                                      <li>
                                          <a href="5-fotografia">
                                          <i class="fa fa-check-circle-o"></i>
                                              Fotografía                          
                                          </a>
                                      </li>
                                     <li>
                                          <a href="5-realizacion">
                                          <i class="fa fa-check-circle-o"></i>
                                              Realización                          
                                          </a>
                                     </li>
                                     <li>
                                          <a href="5-guion">
                                          <i class="fa fa-check-circle-o"></i>
                                              Guion                          
                                          </a>
                                      </li>
                                      <li>
                                            <a href="5-sonido">
                                            <i class="fa fa-check-circle-o"></i>
                                                Sonido                          
                                            </a>
                                      </li>
                                      <li>
                                            <a href="5-taller">
                                            <i class="fa fa-check-circle-o"></i>
                                            Taller Realización                          
                                            </a>
                                      </li>
                                      <li>
                                            <a href="5-semiotica">
                                            <i class="fa fa-check-circle-o"></i>
                                            Semiótica                          
                                            </a>
                                      </li>
                              </li>
                            </ul>
                            </li>

                      </ul>   
             </li>';

             }

            ?>
                



</ul>
</li>
</li>

    		<?php

	    		if ($_SESSION["perfil"] == "Administrador") {

		    	    echo '<li>
						<a href="cursos">

							<i class="fa fa-university"></i>
							<span>Cursos</span>

						</a>
					</li>';

			}

			?>

			<?php

				if ($_SESSION["perfil"] == "Administrador") {

				echo '<li>
					<a href="usuarios">

						<i class="fa fa-users"></i>
						<span>Usuarios</span>

					</a>
				</li>';

		}

		?>

		<?php

			if ($_SESSION["perfil"] == "Administrador") {

				echo '<li>
					<a href="ciudades">

						<i class="fa fa-building"></i>
						<span>Ciudades</span>

					</a>
				</li>';

			}

		?>

    <?php

    if ($_SESSION["perfil"] == "Administrador") {

      echo '<li>
        <a href="periodos">

          <i class="fa fa-calendar-check-o"></i>
          <span>Períodos</span>

        </a>
      </li>';

    }

    ?>

		<?php

			if ($_SESSION["movilidad"] == "1") {

				echo '<li class="treeview">
		          <a href="#">
		            <i class="fa fa-car"></i>
		            <span>Movilidad</span>
		            <span class="pull-right-container">
		              <i class="fa fa-angle-left pull-right"></i>
		            </span>
		          </a>
		          <ul class="treeview-menu">
		            <li><a href="movilidad"><i class="fa fa-circle-o"></i> Registro Movilidad</a></li>
		            <li><a href="movilidad-fecha"><i class="fa fa-circle-o"></i> Resumen x Fecha</a></li>
		          </ul>
	    	    </li>';

	    	}

    	?>


    	<?php

    		if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Secretario" || $_SESSION["perfil"] == "Directivo") {

	    	    echo '<li class="treeview">
		          <a href="#">
		            <i class="fa fa-car"></i>
		            <span>Resumen Movilidad</span>
		            <span class="pull-right-container">
		              <i class="fa fa-angle-left pull-right"></i>
		            </span>
		          </a>
		          <ul class="treeview-menu">
		            <li><a href="resumen-movilidad"><i class="fa fa-circle-o"></i> Informe Movilidad</a></li>
		            <li><a href="resumen-docente"><i class="fa fa-circle-o"></i> Resumen x Docente</a></li>
		          </ul>
	    	    </li>';

	    	}

    	?>

    	<?php

    		if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Directivo") {

	    	    echo '<li class="treeview">
		          <a href="#">
		            <i class="fa fa-laptop"></i>
		            <span>Conectar Igualdad</span>
		            <span class="pull-right-container">
		              <i class="fa fa-angle-left pull-right"></i>
		            </span>
		          </a>
		          <ul class="treeview-menu">
		            <li><a href="netbooks"><i class="fa fa-circle-o"></i> Netbooks</a></li>
		            <li><a href="servicios"><i class="fa fa-circle-o"></i> Servicio Técnico</a></li>
		            <li><a href="historial-servicios"><i class="fa fa-circle-o"></i> Historial</a></li>
		          </ul>
	    	    </li>';

	    	}

    	?>


        <?php

            if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Directivo") {

                echo '<li class="treeview">
                  <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Biblioteca</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="generos"><i class="fa fa-circle-o"></i> Géneros</a></li>
                    <li><a href="libros"><i class="fa fa-circle-o"></i> Libros</a></li>
                  </ul>
                </li>';

            }

        ?>

<!--         <?php

            if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Directivo") {

                echo '<li class="treeview">
                  <a href="#">
                    <i class="fa fa-life-ring"></i>
                    <span>Licencias</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="articulos"><i class="fa fa-circle-o"></i> Artículos</a></li>
                    <li><a href="licencias"><i class="fa fa-circle-o"></i> Carga Licencias</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Consulta x Docente</a></li>
                  </ul>
                </li>';

            }

        ?> -->

<!--         <?php

            if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Directivo"
                || $_SESSION["perfil"] == "Secretario" || $_SESSION["perfil"] == "Docente Científica"
                || $_SESSION["perfil"] == "Docente Sociales" || $_SESSION["perfil"] == "Docente Segundas Lenguas" || $_SESSION["perfil"] == "Docente Matemática" || $_SESSION["perfil"] == "Docente Educación Física" || $_SESSION["perfil"] == "Docente Educación Artística" || $_SESSION["perfil"] == "Docente Lengua y Literatura" || $_SESSION["perfil"] == "Docente Modalidad" || $_SESSION["perfil"] == "Preceptor" || $_SESSION["perfil"] == "REVE") {

                echo '<li class="treeview">
                  <a href="#">
                    <i class="fa fa-life-ring"></i>
                    <span>Licencias</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="licencias-docente"><i class="fa fa-circle-o"></i> Consulta</a></li>
                  </ul>
                </li>';

            }

        ?> -->


        <?php

            if ($_SESSION["perfil"] == "Administrador") {

                echo '<li class="treeview">
                  <a href="#">
                    <i class="fa fa-database"></i>
                    <span>Backup</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="copia"><i class="fa fa-circle-o"></i> Copia de Seguridad</a></li>
                  </ul>
                </li>';

            }

        ?>


		</ul>

	</section>

</aside>