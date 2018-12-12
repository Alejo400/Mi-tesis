<?php

session_start();

//Conexion a base de datos requerida por jquery
 
$con = mysql_connect('localhost','root','') or die('Error en conexion a la DB');
mysql_select_db('flotabilidad', $con) or die('Error al seleccionar la DB');

$usuario = $_SESSION['user']; 

$nombre = $_POST['name']; //Nombre de la seccion
$cedula = $_POST['ced'];  //Cedula del estudiante

//BUSCAMOS LA CEDULA DEL ESTUDIANTE PARA CONFIRMAR SI ESTE ES DEL TIPO USUARIO Y SI EXISTE EN LA BASE DE DATOS

$sql_ced = "SELECT cedula,nombre,usuario.login FROM usuario, usuario_personal WHERE usuario.login = usuario_personal.login and usuario.tipo='usuario' and 
usuario_personal.cedula='$cedula'";
$res_ced = mysql_query($sql_ced);
$row_ced = mysql_num_rows($res_ced);
$req = mysql_fetch_array($res_ced);
$nombre_u = $req["login"];

/*BUSCAMOS LA SECCION INGRESADA PARA VER SI ESTA VINCULADA AL PROFESOR OPERADOR QUE LA ESTA REGISTRANDO

$sql_prof = "SELECT DISTINCT nombre_sec,login FROM seccion_usuario WHERE login = '$usuario' and nombre_sec='$nombre'";
$res_prof = mysql_query($sql_prof);
$row_prof = mysql_num_rows($res_prof);*/

//BUSCAR SI LA SECCION INGRESADA POR EL OPERADOR EXISTE

$sql_s = "SELECT nombre_sec FROM secciones WHERE nombre_sec = '$nombre'";
$res_s = mysql_query($sql_s);
$row_s = mysql_num_rows($res_s);

if($row_s == 0){ // si la seccion no existe

	if($row_ced == 0){ // si la cedula no es de un estudiante (tipo usuario)

		echo "2";

	}

	else {

		$res2 = mysql_query("INSERT INTO seccion_usuario(id_seccion,nombre_sec,cedula_u,login) VALUES('','$nombre','$cedula','$usuario')");

		if(mysql_affected_rows()>0){

			//Historial de accion

		$sql_b = "SELECT *FROM usuario, usuario_personal WHERE usuario.login = usuario_personal.login and usuario.login = '$usuario'";
		$res_b = mysql_query($sql_b);
		$req_b = mysql_fetch_array($res_b);
		$nombres = $req_b["nombre"];
		$tipo = $req_b["tipo"];
		$genero = $req_b["sexo"];
		date_default_timezone_set("America/Caracas");
		$actual=date ("Y-m-d"); //El año actual en el calendario espanol
		$hora_actual=date("h:i:sa");

		$sql3 = "INSERT INTO historialaccion VALUES ('','$usuario','$nombres','Ha registrado el estudiante $nombre_u en la seccion $nombre',
			'$tipo','$genero','$hora_actual','$actual')";
		$res3 = mysql_query($sql3);

		//********************

			echo "1";
		}
		else{
			echo "2";
		}

	}

}

else if($row_s == 1){ // si la seccion existe

	if($row_ced == 0){ // si la seccion no es de un estudiante (tipo usuario)

	echo "2";

	}

	else {

		$res2 = mysql_query("INSERT INTO seccion_usuario(id_seccion,nombre_sec,cedula_u,login) VALUES('','$nombre','$cedula','$usuario')");

		if(mysql_affected_rows()>0){

			//Historial de accion

		$sql_b = "SELECT *FROM usuario, usuario_personal WHERE usuario.login = usuario_personal.login and usuario.login = '$usuario'";
		$res_b = mysql_query($sql_b);
		$req_b = mysql_fetch_array($res_b);
		$nombres = $req_b["nombre"];
		$tipo = $req_b["tipo"];
		$genero = $req_b["sexo"];
		date_default_timezone_set("America/Caracas");
		$actual=date ("Y-m-d"); //El año actual en el calendario espanol
		$hora_actual=date("h:i:sa");

		$sql3 = "INSERT INTO historialaccion VALUES ('','$usuario','$nombres','Ha registrado el estudiante $nombre_u en la seccion $nombre',
			'$tipo','$genero','$hora_actual','$actual')";
		$res3 = mysql_query($sql3);

		//********************

			echo "1";
		}
		else{
			echo "2";
		}

	}

}
 
?>