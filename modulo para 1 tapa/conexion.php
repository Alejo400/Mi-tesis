<?php

class conexion

//clase global para conexion a base de datos local

{

	public static function connectar()

	{ 

		$con=mysql_connect("mysql.hostinger.es","u669645102_alejo","123456");
		mysql_query("SET NAMES 'utf8'"); //esto asegura que los datos de php sean enviados a la base de datos utilizando UTF como idioma
		mysql_select_db("u669645102_alejo");
		return $con;

	}

}

$nuevo2=new conexion();
$nuevo2->connectar();


?> 