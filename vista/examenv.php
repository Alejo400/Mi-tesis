<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistema de Flotabilidad</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/npm.js"></script>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="css/radios.css">

<body>

	<?php 

	error_reporting(E_ERROR);

	session_start(); 

	require_once("../modelo/conexion.php");
	
	$user2 = $_SESSION['user'];
	$examen = $_GET["examen"];

	$sql_bus = "SELECT examen,login FROM evaluacion WHERE login='$user2' and examen='$examen'";
    $res_bus =  mysql_query($sql_bus);
    $row_bus = mysql_num_rows($res_bus);

    if($row_bus == 1){

    	echo "<script type='text/javascript'> alert('Usted ya ha realizado esta evaluación'); window.location='../vista/index2.php'; </script>";

    }

    else{

//*********************************************************

// SELECCIONAR EL EXAMEN DISTINGUIENDO ENTRE LOS VALORES REPETIDOS

$sql_lista = "SELECT DISTINCT examen,pregunta FROM examen WHERE examen ='$examen'";
$res_lista = mysql_query($sql_lista);
$req_lista=mysql_fetch_array($res_lista);

$nombre_examen = $req_lista["examen"];

// SELECCIONAR LA PREGUNTA DISTINGUIENDO ENTRE LOS VALORES REPETIDOS

$sql_lista2 = "SELECT DISTINCT pregunta FROM examen WHERE examen ='$examen'";
$res_lista2 = mysql_query($sql_lista2);

$row_lista = mysql_num_rows($res_lista);
$row_lista2 = mysql_num_rows($res_lista2);


	?>

                <form action="../modelo/evaluacion.php" method="POST" class="form-horizontal">

<!-- *********************************** EL EXAMEN **************************************************************** -->

<div class="container">

<table class="table table-bordered table-condensed" style="box-shadow: -2px -4px 28px 11px rgba(0,0,0,0.32);">

<a href="index2.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-arrow-left">
 <STRONG>Volver</STRONG></span></a> 

<th style="color: white; background-color: #337ab7;">
	<center> <h3><strong><?php echo $req_lista["examen"]; ?></strong></h3> </center> </th>

<tr>

<td>

<?php if($_SESSION['tipo'] == "usuario") { ?>

<div class="alert alert-danger"> <h5> <span class="glyphicon glyphicon-list-alt"></span> Modo de Evaluación </h5></div>

<?php } else { ?>

<div class="alert alert-danger"> <h5> <span class="glyphicon glyphicon-eye-open"></span> Modo de Lectura </h5></div>

<?php } ?>

</td>

</tr>

<?php 

for($i=1;$i<=$row_lista2;$i++){

	$req_lista2=mysql_fetch_array($res_lista2);
	$lista2 = $req_lista2["pregunta"]; ?>

	<tr style="background-color: #DFDFDF">

<th><h4><strong> <?php echo $lista2; ?> </strong></h4> </th>

</tr>

<tr>
	<td style="background-color:">
		<div class="form-group col-md-12">

	<?php

	$sql_opcion = "SELECT opcion,respuesta FROM examen WHERE pregunta='$lista2' and examen ='$examen'";
	$res_opcion = mysql_query($sql_opcion);
	$row_opcion = mysql_num_rows($res_opcion);

		for ($y=1; $y <=$row_opcion; $y++) { 
			
			$req_opcion = mysql_fetch_array($res_opcion);

?>

<div class="example">
<div>

<input type="radio" required value="<?php echo $req_opcion['respuesta']; ?>" name="opcion<?php echo $i?>" id="opciones<?php echo $i.$y?>">
<label for="radie<?php echo $i.$y?>"><span><span></span></span>
			<?php

			echo $req_opcion["opcion"]; ?></span></div></div> <?php

		}

?>

</div> <?php

}

?>

<input type="hidden" name="examen" value="<?php echo $nombre_examen; ?>">

<input type="hidden" name="lista" value="<?php echo $row_lista2; ?>">

</div>

<?php if($_SESSION['tipo'] == "usuario") { ?>

<button class="btn btn-success btn-lg pull-right"><span class="glyphicon glyphicon-floppy-disk"></span> Enviar</button> <?php } ?>

</form>

<?php } ?>

</body>
</html>