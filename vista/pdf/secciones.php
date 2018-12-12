<?php

error_reporting(E_ERROR | E_WARNING);

session_start(); 

// Validad Inicio de sesion

require_once("../../modelo/conexion.php");

$usuario = $_SESSION['user']; 


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
            margin:40px;

        }
        img {
        max-width: 100%;
    height: auto;
}
        </style>

            <!-- BUSCAR SECCIONES -->
<?php 

$sql ="SELECT usuario_personal.login, nombre_sec, cedula_u, nombre, sexo FROM seccion_usuario, usuario_personal 
WHERE seccion_usuario.cedula_u = usuario_personal.cedula and seccion_usuario.login = '$usuario' ORDER BY usuario_personal.nombre ASC";  
$res = mysql_query($sql);
$hoy = date ("Y");

?>

<img src="../imagenes/iut.png">

<h3>Secciones de <?php echo $_SESSION['nombre']; ?>. PNF "Ingeniería Naval", <?php echo $hoy; ?></h3>

<table border="1" align="center" width="50%">

<tr class="active">

    <th>Usuario</th>
    <th>Nombre</th>
    <th>Cedula</th>
    <th>Sexo</th>
    <th>Sección</th>

</tr>

<?php while($req = mysql_fetch_array($res)) { ?>

<tr>

    <td><?php echo $req["login"]; ?></td>
    <td><?php echo $req["nombre"]; ?></td>
    <td><?php echo $req["cedula_u"]; ?></td>
    <td><?php echo $req["sexo"]; ?></td>
    <td><?php echo $req["nombre_sec"]; ?></td>

</tr>

<?php } ?>

</table>

</body>
</html>