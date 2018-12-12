<?php 

require_once("conexion.php");

//Estadisticas del usuario

$sql_u = "SELECT *FROM historialaccion WHERE tipo = 'usuario' and Actividad like '%Objetos Macizos%'";
$res_u = mysql_query($sql_u);
$row_u = mysql_num_rows($res_u);

//Estadisticas del operador

$sql_o = "SELECT *FROM historialaccion WHERE tipo = 'operador' and Actividad like '%Objetos Macizos%'";
$res_o = mysql_query($sql_o);
$row_o = mysql_num_rows($res_o);

//Estadisticas del administrador

$sql_ad = "SELECT *FROM historialaccion WHERE tipo = 'administrador' and Actividad like '%Objetos Macizos%'";
$res_ad = mysql_query($sql_ad);
$row_ad = mysql_num_rows($res_ad);

//Estadisticas de las Mujeres

$sql_m = "SELECT *FROM historialaccion WHERE sexo = 'Masculino' and Actividad like '%Objetos Macizos%'";
$res_m = mysql_query($sql_m);
$row_m = mysql_num_rows($res_m);

//Estadisticas de los hombres

$sql_h = "SELECT *FROM historialaccion WHERE sexo = 'Femenino' and Actividad like '%Objetos Macizos%'";
$res_h = mysql_query($sql_h);
$row_h = mysql_num_rows($res_h);

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Objetos Macizos</title>

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/npm.js"></script>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

		<style type="text/css">

		</style>
	</head>
	<body>

<script src="../../code/highcharts.js"></script>
<script src="../../code/highcharts-3d.js"></script>
<script src="../../code/modules/exporting.js"></script>

<div class="col-md-12" style="margin-bottom: 5%;"> <center> <h3>Visitas a el simulador de Objetos Macizos</h3></center></div>

<div id="container" class="col-md-6" style="height: 400px"></div>


		<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Estadísticas por tipo de Usuario'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Porcentaje:',
        data: [
            ['Usuario', <?php echo $row_u; ?>],
            ['Operador', <?php echo $row_o; ?>],
            ['Administrador', <?php echo $row_ad; ?>],
        ]
    }]
});
		</script>

        <div id="container2" class="col-md-6" style="height: 400px"></div>


        <script type="text/javascript">

Highcharts.chart('container2', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Estadísticas por Género'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Porcentaje:',
        data: [
            ['Mujeres', <?php echo $row_m; ?>],
            ['Hombres', <?php echo $row_h; ?>]
        ]
    }]
});
        </script>

	</body>
</html>
