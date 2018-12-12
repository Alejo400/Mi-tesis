<?php

class conexion

//clase global para conexion a base de datos local

{

	public static function connectar()

	{ 

		$con=mysql_connect("localhost","root","");
		mysql_query("SET NAMES 'utf8'"); //esto asegura que los datos de php sean enviados a la base de datos utilizando UTF como idioma
		mysql_select_db("flotabilidad");
		return $con;

	}

}

$nuevo2=new conexion();
$nuevo2->connectar();


?> 