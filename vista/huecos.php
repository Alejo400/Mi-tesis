<?php 

require_once("../modelo/conexion.php");

$usuario = $_GET["user"];

$sql_b = "SELECT *FROM usuario, usuario_personal WHERE usuario.login = usuario_personal.login and usuario.login = '$usuario'";
$res_b = mysql_query($sql_b);
$req_b = mysql_fetch_array($res_b);
$nombre = $req_b["nombre"];
$tipo = $req_b["tipo"];
$genero = $req_b["sexo"];
date_default_timezone_set("America/Caracas");
$actual=date ("Y-m-d"); //El año actual en el calendario espanol
$hora_actual=date("h:i:sa");

$sql = "INSERT INTO historialaccion VALUES ('','$usuario','$nombre','Entrada a simulador de Objetos Huecos','$tipo','$genero','$hora_actual','$actual')";
$res = mysql_query($sql);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistema de Flotabilidad</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<body style="background-color: #BEFFF7">

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/npm.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 <script type="text/javascript">
$(function () { $('[data-toggle="tooltip"]').tooltip() })
$(function () { $('[data-toggle="popover"]').popover() })
 </script>

<div class="col-md-8">

<button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="tooltip" data-placement="bottom" 
title="Añade cada una de las caracteristicas al tanque y al objeto, luego Haz click en iniciar para dejar caerlo y ver 
el proceso de flotabilidad. Puedes ver los datos en cada esquina de la pantalla a medida que agregas las propiedades. Piensa bien antes de ejecutar el simulador ya que los botones se deshabilitan. !Recarga la pagina para comenzar desde cero"> <span class="glyphicon glyphicon-question-sign"> </span></button>

</div>

   <script src="p5/p5.min.js"></script>
   <script src="p5/p5.dom.js"></script>
   <script src="p5/p5.sound.js"></script>
   <script type="text/javascript" src="obhuecos.js"> </script>

</body>
</html>