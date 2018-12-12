 <?php

class usuario {

var $usuario;
var $pass;
var $pass2;
var $tipo;
var $nombre;
var $cedula;
var $sexo;
var $comparar;

public function registrar($usuario,$pass,$pass2,$tipo,$nombre,$cedula,$sexo,$comparar){

$sqluser = "SELECT login FROM usuario WHERE login='$usuario'";
$resuser = mysql_query($sqluser);
$rowuser = mysql_num_rows($resuser);

$sqlci = "SELECT cedula FROM usuario_personal WHERE cedula='$cedula'";
$resci = mysql_query($sqlci);
$rowci = mysql_num_rows($resci);

if($rowuser == 1){

		if($comparar == 1)

	{

	echo "<script type='text/javascript'> alert('Este nombre de usuario ya existe'); window.location='../vista/index.php'; </script>";

	}

	if($comparar == 2){

		echo "<script type='text/javascript'> alert('Este nombre de usuario ya existe'); window.location='../vista/usuariov.php'; </script>";

	}

}

else if($rowci == 1){

			if($comparar == 1)

	{

	echo "<script type='text/javascript'> alert('Ya existe un usuario registrado con esta cedula'); window.location='../vista/index.php'; </script>";

	}

	if($comparar == 2){

		echo "<script type='text/javascript'> alert('Ya existe un usuario registrado con esta cedula'); window.location='../vista/usuariov.php'; </script>";

	}



}

else if($pass!=$pass2){

				if($comparar == 1)

	{

	echo "<script type='text/javascript'> alert('Las contraseñas no son iguales'); window.location='../vista/index.php'; </script>";

	}

	if($comparar == 2){

		echo "<script type='text/javascript'> alert('Las contraseñas no son iguales'); window.location='../vista/usuariov.php'; </script>";

	}

}

else{

	$sql = "INSERT INTO usuario VALUES ('$usuario',AES_ENCRYPT('$pass','cifrado$pass'),'$tipo')";
	$res = mysql_query($sql);

	$sql2 = "INSERT INTO usuario_personal VALUES ('Activado','$usuario','$nombre','$cedula','$sexo')";
	$res2 = mysql_query($sql2);

	if($comparar == 1)

	{

	echo "<script type='text/javascript'> alert('Usuario registrado con exito'); window.location='../vista/index.php'; </script>";

	}

	if($comparar == 2){

		echo "<script type='text/javascript'> alert('Usuario registrado con exito'); window.location='../vista/usuariov.php'; </script>";

	}

}

}

public function editar($usuario,$pass,$pass2,$nombre,$cedula,$sexo){

$sqluser = "SELECT login FROM usuario WHERE login='$usuario'";
$resuser = mysql_query($sqluser);
$rowuser = mysql_num_rows($resuser);

$sqlci = "SELECT cedula FROM usuario_personal WHERE cedula='$cedula'";
$resci = mysql_query($sqlci);
$rowci = mysql_num_rows($resci);

if($pass!=$pass2){


	echo "<script type='text/javascript'> alert('Las contraseñas no son iguales'); window.location='../vista/index2.php'; </script>";

}

else{

	$sql = "UPDATE usuario SET password=AES_ENCRYPT('$pass','cifrado$pass') WHERE login='$usuario'";
	$res = mysql_query($sql);

	$sql2 = "UPDATE usuario_personal SET nombre='$nombre', cedula='$cedula', sexo='$sexo' WHERE login='$usuario'";
	$res2 = mysql_query($sql2);

				//* Historial

$sql_b = "SELECT *FROM usuario, usuario_personal WHERE usuario.login = usuario_personal.login and usuario.login = '$usuario'";
$res_b = mysql_query($sql_b);
$req_b = mysql_fetch_array($res_b);
$nombre2 = $req_b["nombre"];
$tipo = $req_b["tipo"];
$genero = $req_b["sexo"];
date_default_timezone_set("America/Caracas");
$actual=date ("Y-m-d"); //El año actual en el calendario espanol
$hora_actual=date("h:i:sa");

$sql2 = "INSERT INTO historialaccion VALUES ('','$usuario','$nombre2','El usuario $usuario ha modificado sus datos',
	'$tipo','$genero','$hora_actual','$actual')";
$res2 = mysql_query($sql2);

//***********************

		echo "<script type='text/javascript'> alert('Los cambios han sido guardados, para preservar los cambios debe iniciar sesión nuevamente'); 
		window.location='../vista/index2.php'; </script>";

}

}

}

?>