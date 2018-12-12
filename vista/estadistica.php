<?php 

// Validad Inicio de sesion

error_reporting(E_ERROR | E_WARNING);

session_start(); 

require_once("../modelo/conexion.php");

$usuario = $_SESSION['user']; 

if(isset($_SESSION['iniciar'])){

  if($_SESSION['iniciar'] == 1){

?>

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

           <script src="js/jquery.min.js"></script>    
           <script src="js/table.js"></script>  
           <script src="js/tabledos.js"></script>            
           <link rel="stylesheet" href="css/tablecss.css" />  

           <script src="estadisticas/code/highcharts.js"></script>
           <script src="estadisticas/code/highcharts-3d.js"></script>
           <script src="estadisticas/code/modules/exporting.js"></script>

<body style="background-color: #FFFFFF" data-spy="scroll" data-target="#navbar1">

  <header>

    <nav class="navbar navbar-default">
      <div class="container-fluid">

        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">

            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>

          <a href="index2.php" class="navbar-brand"> SSFDTN <span class="glyphicon glyphicon-education"></span> </a>

        </div>

          <div class="collapse navbar-collapse" id="navbar1">

            <ul class="nav navbar-nav" role="tablist">

<?php if($_SESSION['tipo'] == "administrador") { ?> <li><a href="usuariov.php"><span class="glyphicon glyphicon-user"></span> Usuarios</a></li>
              <li><a href="historial.php"><span class="glyphicon glyphicon-record"></span> Historial</a></li> <?php } ?>
<?php if($_SESSION['tipo'] == "administrador" || $_SESSION['tipo'] == "operador") { ?>              
<li><a href="estadistica.php"><span class="glyphicon glyphicon-blackboard"></span> Estadísticas</a></li><?php } ?>
              <li><a href="#contacto"><span class="glyphicon glyphicon-envelope"></span> Contacto</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">

              <li class="dropdown">

                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
                  <span class="glyphicon glyphicon-home"></span> <?php echo $_SESSION['nombre']; ?> <span class="caret"></span> </a>

                  <ul class="dropdown-menu">
                    <li><a href="#perfil" data-toggle="modal"><span class="glyphicon glyphicon-cog"></span> Mi perfil</a></li>
                    <li><a href="construccion.html" target="__blank"><span class="glyphicon glyphicon-question-sign"></span> Ayuda</a></li>
<!-- <?php //if($_SESSION['tipo'] == "administrador") { ?> <li><a href="construccion.html" target="__blank"><span class="glyphicon glyphicon-cog">
</span> Respaldo</a></li> <?php //} ?> -->
                    <li class="divider"></li>
                    <li><a href="../controlador/destroy.php"><span class="glyphicon glyphicon-off"></span> Cerrar sesión</a></li>

                  </ul>

              </li>

            </ul>

          </div>

      </div>
    </nav>

  </header>

  <!--  VENTANA MODAL EDITAR USUARIO -->

<div class="container">

    <div class="modal fade" id="perfil">

      <div class="modal-dialog"> <!-- modal-lg para agrandar la ventana -->
     
        <div class="modal-content"> <!-- donde va el contenido -->

          <div class="modal-header"> <!-- encabezado del modal -->

            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <!-- BOTON PARA CERRAR VENTANA -->

            <h3 class="modal-title"> Mi perfil de usuario </h3>

          </div>

            <div class="modal-body col-md-12">

              <div class="col-md-3"><img src="imagenes/perfil.png" class="img-responsive" style="margin-top: 20%"></img></div>

              <div class="col-md-9">

                  <?php

                    $sql_new = "SELECT *FROM usuario, usuario_personal WHERE usuario_personal.login = usuario.login and usuario.login = '$usuario'";
                    $res_new = mysql_query($sql_new);
                    $req_new = mysql_fetch_array($res_new);

                   ?>

                   <p class="text-justify">

                     <div class="col-md-6">
                      <h5> <strong>Nombre de usuario:</strong></h5> <?php echo $req_new["login"]; ?>
                     <h5> <strong>Cédula:</strong></h5> <?php echo $req_new["cedula"]; ?>
                   </div>
                   <div class="col-md-6">
                     <h5> <strong>Nombre personal:</strong></h5> <?php echo $req_new["nombre"]; ?>
                     <h5> <strong>Género:</strong></h5> <?php echo $req_new["sexo"]; ?>
                     </div>

                   </p>

              </div>

            </div>

            <div class="modal-footer">

  <div class="panel-group col-md-12" id="accordion" role="tablist">

  <div class="panel" style="background-color: #FFFFFF">

    <div class="panel-heading" role="tab" id="heading1">

      <h4 class="panel-tittle">

        <a href="#collapse1" data-toggle="collapse" data-parent="#accordion" class="btn btn-primary">Editar mis datos</a>

      </h4>

    </div>

    <div id="collapse1" class="panel-collapse collapse">   

      <div class="panel-body">

        <form action="../controlador/editar_u.php" method="POST" class="form-horizontal" autocomplete="off">

<div class="form-group">

<label class="control-label col-md-2">Contraseña</label> 

<div class="col-md-10"> <input class="form-control" type="password" value="<?php echo $req_new['password']; ?>" name="pass" 
    placeholder="Escribe tu contraseña: " required  title="La contraseña debe contener al menos 8 caracteres, una letra minúscula, una mayúscula y un número" 
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"> </div>

</div>

<div class="form-group">

<label class="control-label col-md-2">Repetir contraseña</label> 

<div class="col-md-10"> <input class="form-control" type="password" value="<?php echo $req_new['password']; ?>" name="pass2" 
    placeholder="Repita su contraseña: " required  title="La contraseña debe contener al menos 8 caracteres, una letra minúscula, una mayúscula y un número" 
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"> </div>

</div>

<div class="form-group">

<label class="control-label col-md-2"> Nombre </label> 

<div class="col-md-10"> <input class="form-control" type="text" placeholder="Escribe tu nombre completo: " required maxlength="50" 
  title="Solo Letras, Minino 8 caracteres Máximo 50" value="<?php echo $req_new['nombre']; ?>" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ ]{8,50}$" name="nombre"> </div> 

</div>

  <input type="hidden" name="cedula" value="<?php echo $req_new["cedula"]; ?>">

<div class="form-group">

  <label class="control-label col-md-2"> Sexo </label>

  <div class="col-md-10"><select class="form-control" name="sexo">
    <option value="Masculino">Masculino</option>
    <option value="Femenino">Femenino</option>
  </select></div>

</div>

<input type="hidden" name="usuario" value="<?php echo $req_new["login"]; ?>">

<button class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
<input type="reset" value="Limpiar" class="btn btn-danger">

</form>

      </div>

    </div>

  </div>

            </div>

            </div>

        </div>
        

      </div>

    </div>

  </div>

  <!-- ********************************************************************************************************************************************** -->

  <div role="tabpanel">

        <ul class="nav nav-tabs" role="tablist">

      <li role="presentation" class="active"> <a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab"> Objetos Macizos</a></li>
      <li role="presentation">                <a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab"> Objetos Huecos</a></li>
      <li role="presentation">                <a href="#seccion3" aria-controls="seccion3" data-toggle="tab" role="tab"> Examen - General</a></li>
      <li role="presentation">                <a href="#seccion4" aria-controls="seccion4" data-toggle="tab" role="tab"> Examen - Por Fecha </a></li>
      <?php if($_SESSION['tipo'] == "operador") { ?>
      <li role="presentation">                <a href="#seccion5" aria-controls="seccion5" data-toggle="tab" role="tab"> Mis Examenes </a></li>
      <?php } ?>

        </ul>

          <div class="tab-content">

            <!-- *************************************************** OBJETOS MACIZOS ******************************************************************* -->

            <div role="tabpanel" class="tab-pane active" id="seccion1">

              <?php 

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

$sql_m = "SELECT *FROM historialaccion WHERE sexo = 'Femenino' and Actividad like '%Objetos Macizos%'";
$res_m = mysql_query($sql_m);
$row_m = mysql_num_rows($res_m);

//Estadisticas de los hombres

$sql_h = "SELECT *FROM historialaccion WHERE sexo = 'Masculino' and Actividad like '%Objetos Macizos%'";
$res_h = mysql_query($sql_h);
$row_h = mysql_num_rows($res_h);

?>

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

        <?php 

        // Resultados de estadisticas para los objetos macizos por tipo de usuario

if($row_u != 0 || $row_o != 0 || $row_ad!=0){

        if($row_u == $row_o and $row_u == $row_ad){ //SI TODOS POSEEN EL MISMO PORCENTAJE

        $res_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los usuarios, operadores y administradores poseen el mismo número de
        visitas al simulador de Objetos Macizos";   

        }

else {

        //EVALUAR LAS ESTADISTICAS CON RESPECTO AL USUARIO COMO MAYOR VISITANTE

        if($row_u > $row_o and $row_u > $row_ad){

        if($row_u == $row_o){ // Si los usuarios y operadores tienen el mismo numero de visitas

        $res_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los usuarios y operadores
        representan el mayor porcentaje de visitas realizadas por igual
        al simulador de Objetos Macizos y los administradores el menor número de visitas al mismo.";   

        }

        else if($row_u == $row_ad){ // Si los usuarios y administradores

        $res_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los usuarios y administradores
        representan el mayor porcentaje de visitas realizadas por igual
        al simulador de Objetos Macizos y los operadores el menor número de visitas al mismo.";   

        }

        else if($row_o < $row_ad){ // Si las visitas de los operadores son menores a las del administrador

          $res_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los usuarios representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Macizos y los operadores el menor número de visitas al mismo.";

        }

          else if($row_o == $row_ad){ //Si las visitas del operador son iguales a las del administrador

          $res_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los usuarios representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Macizos y los operadores y administradores un igual número de visitas al mismo.";

        }

        else if ($row_ad < $row_o){ //Si las visitas del administrador son menores a las del operador

          $res_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los usuarios representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Macizos y los administradores el menor número de visitas al mismo.";         

        }

        else{

          $res_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los usuarios representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Macizos";        

        }

        }

        //EVALUAR LAS ESTADISTICAS CON RESPECTO AL OPERADOR COMO MAYOR VISITANTE

        else if($row_o > $row_u and $row_o > $row_ad){ //Si el operador posee mayores visitas que el usuario y que el administrador

        if($row_o == $row_u){

        $res_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los operadores y usuarios
        representan el mayor porcentaje de visitas realizadas por igual
        al simulador de Objetos Macizos y los administradores el menor número de visitas al mismo.";   

        }

        else if($row_o == $row_ad){

        $res_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los operadores y administradores
        representan el mayor porcentaje de visitas realizadas por igual
        al simulador de Objetos Macizos y los usuarios el menor número de visitas al mismo.";   

        }

        else if($row_u < $row_ad){ // Si el usuario posee menores visitas que el administrador

          $res_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los operadores representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Macizos y los usuarios el menor número de visitas al mismo.";

        }

          else if($row_u == $row_ad){ //Si el usuario y administrador poseen visitas iguales

          $res_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los operadores representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Macizos y los usuarios y administradores un igual número de visitas al mismo.";

        }

        else if($row_ad < $row_u){ // Si el administrador posee menos visitas que el usuario

          $res_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los operadores representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Macizos y los administradores el menor número de visitas al mismo.";

        }

        else{

          $res_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los operadores representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Macizos.";         

        }

        }

        //EVALUAR LAS ESTADISTICAS CON RESPECTO AL ADMINISTRADOR COMO MAYOR VISITANTE

        else{

        if($row_ad == $row_o){

        $res_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los administradores y operadores
        representan el mayor porcentaje de visitas realizadas por igual
        al simulador de Objetos Macizos y los usuarios el menor número de visitas al mismo.";   

        }

        else if($row_ad == $row_u){

        $res_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los administradores y usuarios
        representan el mayor porcentaje de visitas realizadas por igual
        al simulador de Objetos Macizos y los operadores el menor número de visitas al mismo.";   

        }

        else if($row_u < $row_o){

          $res_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los administradores representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Macizos y los usuarios el menor número de visitas al mismo.";

        }

          else if($row_u == $row_o){

          $res_estadistica = "Con relación a la estadística se puede observar que los administradores representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Macizos y los usuarios y operadores un igual número de visitas al mismo.";

        }

        else if($row_o < $row_u){

          $res_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los administradores representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Macizos y los operadores el menor número de visitas al mismo.";         

        }

        else {

          $res_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los administradores representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Macizos.";  

        }

        }

      }

}

//***********************************************************************************************************************************************************

// Estadisticas de objetos macizos por genero

if($row_m != 0 || $row_h != 0){

        if($row_m < $row_h){ //Si hay mas visitas por hombres que por mujeres

          $res_estadistica2 = "Con relación a la estadística por genero se puede observar que los usuarios de sexo masculino tienen mayor visitas al simulador
          que las de sexo femenino";

        }

        else if($row_h < $row_m){ //Si hay mas visitas por mujeres que por hombres

          $res_estadistica2 = "Con relación a la estadística por genero se puede observar que los usuarios de sexo Femenino tienen mayor visitas al simulador
          que los de sexo Masculino";

        }

        else if($row_m == $row_h){ //Si ambos sexos poseen el mismo número de visitas

          $res_estadistica2 = "Con relación a la estadística por genero se puede observar que los usuarios de ambos sexos poseen el mismo numero de visitas al simulador";

        }

}

//***********************************************************************************************

        ?>

        <div class="col-md-6 text-justify"><article style="font-size: 18px;"><br><?php echo $res_estadistica; ?></article><br></div>
        <div class="col-md-6 text-justify"><article style="font-size: 18px;"><br><?php echo $res_estadistica2; ?></article><br></div>

            </div>

            <!-- *************************************************** OBJETOS HUECOS ******************************************************************* -->

        <div role="tabpanel" class="tab-pane" id="seccion2">

          <?php 

//Estadisticas del usuario

$sql_u2 = "SELECT *FROM historialaccion WHERE tipo = 'usuario' and Actividad like '%Objetos Huecos%'";
$res_u2 = mysql_query($sql_u2);
$row_u2 = mysql_num_rows($res_u2);

//Estadisticas del operador

$sql_o2 = "SELECT *FROM historialaccion WHERE tipo = 'operador' and Actividad like '%Objetos Huecos%'";
$res_o2 = mysql_query($sql_o2);
$row_o2 = mysql_num_rows($res_o2);

//Estadisticas del administrador

$sql_ad2 = "SELECT *FROM historialaccion WHERE tipo = 'administrador' and Actividad like '%Objetos Huecos%'";
$res_ad2 = mysql_query($sql_ad2);
$row_ad2 = mysql_num_rows($res_ad2);

//Estadisticas de las Mujeres

$sql_m2 = "SELECT *FROM historialaccion WHERE sexo = 'Femenino' and Actividad like '%Objetos Huecos%'";
$res_m2 = mysql_query($sql_m2);
$row_m2 = mysql_num_rows($res_m2);

//Estadisticas de los hombres

$sql_h2 = "SELECT *FROM historialaccion WHERE sexo = 'Masculino' and Actividad like '%Objetos Huecos%'";
$res_h2 = mysql_query($sql_h2);
$row_h2 = mysql_num_rows($res_h2);

?>


<div class="col-md-12" style="margin-bottom: 5%;"> <center> <h3>Visitas a el simulador de Objetos Huecos</h3></center></div>

<div id="container3" class="col-md-6" style="height: 400px"></div>


    <script type="text/javascript">

Highcharts.chart('container3', {
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
            ['Usuario', <?php echo $row_u2; ?>],
            ['Operador', <?php echo $row_o2; ?>],
            ['Administrador', <?php echo $row_ad2; ?>],
        ]
    }]
});
    </script>

        <div id="container4" class="col-md-6" style="height: 400px"></div>


        <script type="text/javascript">

Highcharts.chart('container4', {
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
            ['Mujeres', <?php echo $row_m2; ?>],
            ['Hombres', <?php echo $row_h2; ?>]
        ]
    }]
});
        </script>


        <?php 

        // Resultados de estadisticas para los objetos huecos por tipo de usuario

if($row_u2 != 0 || $row_o2 != 0 || $row_ad2 !=0){

        if($row_u2 == $row_o2 and $row_u2 == $row_ad2){ //SI TODOS POSEEN EL MISMO PORCENTAJE

        $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los usuarios, operadores y administradores poseen el mismo número de
        visitas al simulador de Objetos Huecos";   

        }

else {

        //EVALUAR LAS ESTADISTICAS CON RESPECTO AL USUARIO COMO MAYOR VISITANTE

        if($row_u2 > $row_o2 and $row_u2 > $row_ad2){

        if($row_u2 == $row_o2){ // Si los usuarios y operadores tienen el mismo numero de visitas

        $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los usuarios y operadores
        representan el mayor porcentaje de visitas realizadas por igual
        al simulador de Objetos Huecos y los administradores el menor número de visitas al mismo.";   

        }

        else if($row_u2 == $row_ad2){ // Si los usuarios y administradores

        $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los usuarios y administradores
        representan el mayor porcentaje de visitas realizadas por igual
        al simulador de Objetos Huecos y los operadores el menor número de visitas al mismo.";   

        }

        else if($row_o2 < $row_ad2){ // Si las visitas de los operadores son menores a las del administrador

          $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los usuarios representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Huecos y los operadores el menor número de visitas al mismo.";

        }

          else if($row_o2 == $row_ad2){ //Si las visitas del operador son iguales a las del administrador

          $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los usuarios representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Huecos y los operadores y administradores un igual número de visitas al mismo.";

        }

        else if ($row_ad2 < $row_o2){ //Si las visitas del administrador son menores a las del operador

          $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los usuarios representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Huecos y los administradores el menor número de visitas al mismo.";         

        }

        else{

          $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los usuarios representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Huecos";        

        }

        }

        //EVALUAR LAS ESTADISTICAS CON RESPECTO AL OPERADOR COMO MAYOR VISITANTE

        else if($row_o2 > $row_u2 and $row_o2 > $row_ad2){ //Si el operador posee mayores visitas que el usuario y que el administrador

        if($row_o2 == $row_u2){

        $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los operadores y usuarios
        representan el mayor porcentaje de visitas realizadas por igual
        al simulador de Objetos Huecos y los administradores el menor número de visitas al mismo.";   

        }

        else if($row_o2 == $row_ad2){

        $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los operadores y administradores
        representan el mayor porcentaje de visitas realizadas por igual
        al simulador de Objetos Huecos y los usuarios el menor número de visitas al mismo.";   

        }

        else if($row_u2 < $row_ad2){ // Si el usuario posee menores visitas que el administrador

          $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los operadores representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Huecos y los usuarios el menor número de visitas al mismo.";

        }

          else if($row_u2 == $row_ad2){ //Si el usuario y administrador poseen visitas iguales

          $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los operadores representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Huecos y los usuarios y administradores un igual número de visitas al mismo.";

        }

        else if($row_ad2 < $row_u2){ // Si el administrador posee menos visitas que el usuario

          $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los operadores representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Huecos y los administradores el menor número de visitas al mismo.";

        }

        else{

          $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los operadores representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Huecos.";         

        }

        }

        //EVALUAR LAS ESTADISTICAS CON RESPECTO AL ADMINISTRADOR COMO MAYOR VISITANTE

        else{

        if($row_ad2 == $row_o2){

        $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los administradores y operadores
        representan el mayor porcentaje de visitas realizadas por igual
        al simulador de Objetos Huecos y los usuarios el menor número de visitas al mismo.";   

        }

        else if($row_ad2 == $row_u2){

        $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los administradores y usuarios
        representan el mayor porcentaje de visitas realizadas por igual
        al simulador de Objetos Huecos y los operadores el menor número de visitas al mismo.";   

        }

        else if($row_u2 < $row_o2){

          $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los administradores representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Huecos y los usuarios el menor número de visitas al mismo.";

        }

          else if($row_u2 == $row_o2){

          $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los administradores representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Huecos y los usuarios y operadores un igual número de visitas al mismo.";

        }

        else if($row_o2 < $row_u2){

          $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los administradores representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Huecos y los operadores el menor número de visitas al mismo.";         

        }

        else {

          $resh_estadistica = "Con relación a la estadística por tipo de usuario se puede observar que los administradores representan el mayor porcentaje de visitas realizadas
          al simulador de Objetos Huecos.";  

        }

        }

      }

}

//***********************************************************************************************************************************************************

// Estadisticas de objetos huecos por genero

if($row_m2 != 0 || $row_h2 != 0){

        if($row_m2 < $row_h2){ //Si hay mas visitas por hombres que por mujeres

          $resh_estadistica2 = "Con relación a la estadística por genero se puede observar que los usuarios de sexo masculino tienen mayor visitas al simulador
          que las de sexo femenino";

        }

        else if($row_h2 < $row_m2){ //Si hay mas visitas por mujeres que por hombres

          $resh_estadistica2 = "Con relación a la estadística por genero se puede observar que los usuarios de sexo Femenino tienen mayor visitas al simulador
          que los de sexo Masculino";

        }

        else if($row_m2 == $row_h2){ //Si ambos sexos poseen el mismo número de visitas

        $resh_estadistica2 = "Con relación a la estadística por genero se puede observar que los usuarios de ambos sexos poseen el mismo numero de visitas al simulador";

        }

}

//***********************************************************************************************

        ?>

        <div class="col-md-6 text-justify"><article style="font-size: 18px;"><br><?php echo $resh_estadistica; ?></article><br></div>
        <div class="col-md-6 text-justify"><article style="font-size: 18px;"><br><?php echo $resh_estadistica2; ?></article><br></div>

        </div>

         <!-- *************************************************** EXAMEN - GENERAL ******************************************************************* -->

        <div role="tabpanel" class="tab-pane" id="seccion3">

          <?php 

//Estadisticas de aprobados

$sql_a = "SELECT *FROM evaluacion WHERE nota >= '50'";
$res_a = mysql_query($sql_a);
$row_a = mysql_num_rows($res_a);

//Estadisticas del reprobados

$sql_r = "SELECT *FROM evaluacion WHERE nota <= '49'";
$res_r = mysql_query($sql_r);
$row_r = mysql_num_rows($res_r);

?>


<div class="col-md-12" style="margin-bottom: 5%;"> <center> <h3>Examen Virtual</h3></center></div>

<center><div id="container5" class="col-md-12" style="height: 400px"></div></center>


    <script type="text/javascript">

Highcharts.chart('container5', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Estudiantes Aprobados y Reprobados'
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
            ['Aprobados', <?php echo $row_a; ?>],
            ['Reprobados', <?php echo $row_r; ?>],
        ]
    }]
});
    </script>

<?php 

//***********************************************************************************************************************************************************

// Estadisticas de examenes en general

if($row_a != 0 || $row_r != 0){

        if($row_a < $row_r){ //Si hay estudiantes reprobados que aprobados

          $rese_estadistica = "Con relación a la estadística se puede observar que la mayoría de los estudiantes han reprobado los examenes, lo cual indica
          deficiencia en el aprendizaje del estudio de flotabilidad";

        }

        else if($row_a > $row_r){ //Si hay mas estudiantes aprobados que reprobado

          $rese_estadistica = "Con relación a la estadística se puede observar que la mayoría de los estudiantes han aprobado los examenes, lo cual indica
          un incremento en el aprendizaje del estudio flotabilidad";

        }

        else if($row_a == $row_r){ //Si hay igualdad en aprobados y reprobados

        $rese_estadistica = "Con relación a la estadística se puede observar que existe igualdad en la cantidad de estudiantes aprobados y reprobados";

        }

}

//***********************************************************************************************

        ?>

        <div class="col-md-12 text-justify"><article style="font-size: 18px;"><br><?php echo $rese_estadistica; ?></article><br></div>

        </div>

    <!-- *************************************************** EXAMEN - POR FECHA ******************************************************************* -->

        <div role="tabpanel" class="tab-pane col-md-12" id="seccion4">

<!-- BUSCAR LAS SECCIONES POR PERIODOS DE A;O -->

<?php 

$sqlst = "SELECT DISTINCT fecha FROM evaluacion"; 
$resst = mysql_query($sqlst);
$rowst = mysql_num_rows($resst);

$resst2 = mysql_query($sqlst);

?>

          <div role="tabpanel" class="col-md-12">

            <!-- ******************************** CREAR LA LISTA ************************************************* -->

    <ul class="nav nav-tabs" role="tablist">

      <?php for($i = 1; $i <= $rowst; $i++){ $reqst = mysql_fetch_array($resst); ?>

      <li role="presentation" <?php if($i == 1){ ?> class="active" <?php } ?> > 
      <a href="#<?php echo $i; ?>" aria-controls="<?php echo $i; ?>" data-toggle="tab" role="tab">
        <?php echo $reqst["fecha"]; ?></a></li>

      <?php } ?>

    </ul>

    <div class="tab-content">

      <?php for($y = 1; $y <= $rowst; $y++){  //CARGAR LAS ESTADISTICAS

        $reqst2 = mysql_fetch_array($resst2);

        ?>

      <div role="tabpanel" class="tab-pane <?php if($y == 1) { ?> active <?php } ?>" id="<?php echo $y; ?>">

        <!-- **************************************** ESTADISTICAS **************************************************** -->

        <center>  <br> <br>  <div id="<?php echo $y; ?>" class="col-md-12" style="height: 400px;"></div></center>

<?php       

            $sql_ex = "SELECT DISTINCT seccion FROM evaluacion WHERE fecha = '".$reqst2["fecha"]."'";
            $res_ex = mysql_query($sql_ex);
            $row_ex = mysql_num_rows($res_ex);

?>

        <script type="text/javascript">

Highcharts.chart('<?php echo $y; ?>', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Estudiantes Aprobados y Reprobados'
    },
    subtitle: {
        text: 'Por Secciones'
    },
    xAxis: {
        categories: [
<?php while($req_ex = mysql_fetch_array($res_ex)) { 

$sql_log = "SELECT usuario_personal.nombre FROM usuario, usuario_personal,secciones WHERE usuario_personal.login = usuario.login
and usuario.login = secciones.login and secciones.nombre_sec = '".$req_ex["seccion"]."'"; 
$res_log = mysql_query($sql_log);
$req_log = mysql_fetch_array($res_log);

?>

 '<?php echo $req_ex["seccion"]." - ".$req_log["nombre"]; ?>', <?php } ?>],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad de estudiantes'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Aprobados',
        data:[

        <?php 

            $sql_ex = "SELECT DISTINCT seccion FROM evaluacion WHERE fecha = '".$reqst2["fecha"]."'";
            $res_ex = mysql_query($sql_ex);
            $row_ex = mysql_num_rows($res_ex);

        while($req_ex = mysql_fetch_array($res_ex)) { 

    $seccion = $req_ex["seccion"]; 

    $sql_a = "SELECT *FROM evaluacion WHERE nota >=50 and seccion = '$seccion' and fecha = '".$reqst2["fecha"]."'";
    $res_a = mysql_query($sql_a);
    $row_a = mysql_num_rows($res_a);

            ?> 

        [<?php echo $row_a; ?>], 

        <?php } ?>

            ]

    }, {
        name: 'Reprobados',
        data: [

        <?php 

            $sql_ex = "SELECT DISTINCT seccion FROM evaluacion WHERE fecha = '".$reqst2["fecha"]."'";
            $res_ex = mysql_query($sql_ex);
            $row_ex = mysql_num_rows($res_ex);

        while($req_ex = mysql_fetch_array($res_ex)) { 

    $seccion = $req_ex["seccion"]; 
    $sql_r = "SELECT *FROM evaluacion WHERE nota <=49 and seccion = '$seccion' and fecha = '".$reqst2["fecha"]."'";
    $res_r = mysql_query($sql_r);
    $row_r = mysql_num_rows($res_r);

            ?> 

        [<?php echo $row_r; ?>], 

        <?php } ?>]

    },]
});
        </script>

    </div>  

    <?php } ?>

  </div>

      </div>

      </div>

      <!-- ********************************************************* EXAMENES DEL PROFESOR ****************************************************** -->

      <?php if($_SESSION['tipo'] == "operador") { ?> <!-- SI EL USUARIO LOGEADO ES UN PROFESOR -->

      <div role="tabpanel" class="tab-pane" id="seccion5">

        <!-- BUSCAR LOS EXAMENES DEL PROFESOR -->

<?php 


     $sqle = "SELECT DISTINCT evaluacion.examen FROM evaluacion, examen_cont WHERE evaluacion.examen = examen_cont.examen and examen_cont.login='$usuario'";
     $rese = mysql_query($sqle);
     $rowe = mysql_num_rows($rese);

          $rese2 = mysql_query($sqle);

?>

        <!-- **************************************************** -->

        <div role="tabpanel">

    <ul class="nav nav-tabs" role="tablist">

      <?php for($o = 11; $o <= $rowe + 10; $o++){ $reqe = mysql_fetch_array($rese); ?>

      <li role="presentation" <?php if($o == 11){ ?> class="active" <?php } ?> > 
      <a href="#<?php echo $o; ?>" aria-controls="<?php echo $o; ?>" data-toggle="tab" role="tab">
        <?php echo $reqe["examen"]; ?></a></li>

      <?php } ?>

    </ul>

    <div class="tab-content">

      <?php for($op = 11; $op <= $rowe + 10; $op++){ 

        $reqe2 = mysql_fetch_array($rese2);

        ?>

        <!-- ************************************** ESTADISTICAS ********************************************************** -->

      <div role="tabpanel" class="tab-pane <?php if($op == 11){ ?> active <?php } ?>" id="<?php echo $op; ?>">

        <center><div id="<?php echo $op."".$op; ?>" class="col-md-12" style="height: 400px"></div></center>

        <?php 

        //ESTUDIANTES APROBADOS

        $sqlbe_a = "SELECT *FROM evaluacion WHERE nota >= '50' and examen='".$reqe2["examen"]."'";
        $resbe_a = mysql_query($sqlbe_a);
        $rowbe_a = mysql_num_rows($resbe_a);
        $reqbe_a = mysql_fetch_array($resbe_a);

        //ESTUDIANTES REPROBADOS

        $sqlbe_r = "SELECT *FROM evaluacion WHERE nota <= '49' and examen='".$reqe2["examen"]."'";
        $resbe_r = mysql_query($sqlbe_r);
        $rowbe_r = mysql_num_rows($resbe_r);

        //Fecha del examen
        $sqlff = "SELECT fecha FROM evaluacion WHERE examen='".$reqe2["examen"]."'";
        $resff = mysql_query($sqlff);
        $rowff = mysql_num_rows($resff);
        $reqff = mysql_fetch_array($resff);

        ?>

<div class="col-md-3">

 <a href="pdf/pdf_evaluacion.php?evaluacion=<?php echo $reqe2["examen"]; ?>" target="__blank"> <strong>Ver Listado de Estudiantes</strong>
<img src="imagenes/pdf.png" style="margin: 2%" width="10%"></a> </div>

<div class="col-md-12">

<h4><strong>Periodo: <?php echo $reqff["fecha"]; ?></strong> </h4></div>

        <script type="text/javascript">

Highcharts.chart('<?php echo $op."".$op; ?>', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Estudiantes Aprobados y Reprobados'
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
            ['Aprobados', <?php echo $rowbe_a; ?>],
            ['Reprobados', <?php echo $rowbe_r; ?>],
        ]
    }]
});
    </script>

    <?php

    //***********************************************************************************************************************************************************

// Estadisticas de examenes en especifico

if($rowbe_a != 0 || $rowbe_r != 0){

        if($rowbe_a < $rowbe_r){ //Si hay mas estudiantes reprobados que aprobados

          $resbe_estadistica = "Con relación a la estadística se puede observar que la mayoría de los estudiantes han reprobado este examen";

        }

        else if($rowbe_a > $rowbe_r){ //Si hay mas estudiantes aprobados que reprobado

          $resbe_estadistica = "Con relación a la estadística se puede observar que la mayoría de los estudiantes han aprobado este examen";

        }

        else if($rowbe_a == $rowbe_r){ //Si hay igualdad en aprobados y reprobados

        $resbe_estadistica = "Con relación a la estadística se puede observar que existe igualdad en la cantidad de estudiantes aprobados y reprobados";

        }

}

//***********************************************************************************************

        ?>

        <div class="col-md-12 text-justify"><article style="font-size: 18px;"><br><?php echo $resbe_estadistica; ?></article><br></div>

      </div>

      <?php } ?>

    </div>  

  </div>

</div>

<?php } ?>

</div>

</div>

</body>
</html>

<?php

} 

  }

  else{

    echo "<script type='text/javascript'> alert('Debe iniciar sesion para entrar a esta pantalla'); window.location='../vista/index.php'; </script>";

  } 

?>