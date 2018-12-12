<?php

error_reporting(E_ERROR | E_WARNING);

session_start(); 

// Validad Inicio de sesion

require_once("../../modelo/conexion.php");

$evaluacion = $_SESSION["mievaluacion"]; 


?> 

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Sistema de Flotabilidad </title>
</head>

<body>

            <style type="text/css">
            tr:nth-child(even) {background-color: #f2f2f2}
        td,th{
    padding: 40px;
    padding-left: 90px;
    padding-right: 90px;
    text-align: left;
        }
        th{
    background-color: #4CAF50;
    color: white;   
        }
        table{

            text-align: center;
                border-collapse: collapse;
    width: 100%;

        }
        h3{

            text-align: center;
            margin:30px;

        }
        img {
        max-width: 100%;
    height: auto;
}
        </style>

            <!-- BUSCAR SECCIONES -->
<?php 

        //Todos los estudiantes
        $sql_all = "SELECT fecha, seccion, nota, usuario_personal.nombre FROM usuario,usuario_personal,evaluacion 
        WHERE evaluacion.login = usuario.login and usuario.login = usuario_personal.login and examen='$evaluacion'";
        $res_all = mysql_query($sql_all);
        $req_all = mysql_fetch_array($res_all);

        $hoy = date ("Y");

?>

<img src="../imagenes/iut.png">

<h3><?php echo $_SESSION['nombre']."."; ?> 

Examen: <?php echo $_SESSION['mievaluacion']."."; ?> Periodo <?php echo $req_all["fecha"]; ?>. PNF "Ingeniería Naval", <?php echo $hoy."."; ?></h3>

<table border="1" align="center" width="50%">

<tr class="active">

    <th>Nombre</th>
    <th>Sección</th>
    <th>Nota</th>

</tr>

<?php while($req_all = mysql_fetch_assoc($res_all)) { ?>

<tr>

    <td><?php echo $req_all["nombre"]; ?></td>
    <td><?php echo $req_all["seccion"]; ?></td>
    <td><?php echo $req_all["nota"]; ?></td>

</tr>

<?php } ?>

</table>

</body>
</html>