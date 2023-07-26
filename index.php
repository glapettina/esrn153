<?php

	require_once "controladores/plantilla.controlador.php";
	require_once "controladores/usuarios.controlador.php";
	require_once "controladores/cursos.controlador.php";
	require_once "controladores/ciudades.controlador.php";
	require_once "controladores/alumnos.controlador.php";
	require_once "controladores/movilidades.controlador.php";
	require_once "controladores/netbooks.controlador.php";
	require_once "controladores/servicios.controlador.php";
	require_once "controladores/informes.controlador.php";
	require_once "controladores/generos.controlador.php";
	require_once "controladores/libros.controlador.php";
	require_once "controladores/articulos.controlador.php";
	require_once "controladores/licencias.controlador.php";

	require_once "modelos/usuarios.modelo.php";
	require_once "modelos/cursos.modelo.php";
	require_once "modelos/ciudades.modelo.php";
	require_once "modelos/alumnos.modelo.php";
	require_once "modelos/movilidades.modelo.php";
	require_once "modelos/netbooks.modelo.php";
	require_once "modelos/servicios.modelo.php";
	require_once "modelos/informes.modelo.php";
	require_once "modelos/generos.modelo.php";
	require_once "modelos/libros.modelo.php";
	require_once "modelos/articulos.modelo.php";
	require_once "modelos/licencias.modelo.php";


	$plantilla = new ControladorPlantilla();
	$plantilla -> ctrPlantilla();