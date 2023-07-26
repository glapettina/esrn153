<?php

	class Conexion{

		public static function conectar(){

			$link = new PDO("mysql:host=localhost;dbname=dbesrn153","root","");

			$link -> exec("set names utf8");

			return $link;
		}

	}