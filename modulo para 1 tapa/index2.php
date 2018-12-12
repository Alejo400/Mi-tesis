<?php 

error_reporting(E_ERROR | E_WARNING);

session_start(); 

// Validad Inicio de sesion

require_once("../modelo/conexion.php");

$usuario = $_SESSION['user']; 

//SABER SI EL USUARIO ESTA O NO ACTIVADO

      $sql_estado = "SELECT estado FROM usuario_personal WHERE login = '$usuario'";
      $res_estado = mysql_query($sql_estado);
      $req_estado = mysql_fetch_assoc($res_estado);

if(isset($_SESSION['iniciar']) && $req_estado["estado"] == 'Activado'){

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
<script src="sweet/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweet/dist/sweetalert.css">      

<!-- ************************************************************* FUNCION JQUERY PARA AGREGAR SECCION ******************************************* -->

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
    <script type="text/javascript">
      $('document').ready(function(){
        $('#boton').click(function(){
          if($('#nombre').val()==""){
            return false;
          }
          else{
            var nombre = $('#nombre').val();
          }
          if($('#cedula').val()==""){
            return false;
          }
          else{
            var cedula = $('#cedula').val();
          }
          jQuery.post("../modelo/agregarsec.php", {
            name:nombre,
            ced:cedula
          }, function(data, textStatus){
            if(data == 1){
              $('#res').html("Datos insertados.");
              $('#res').css('color','green');
            }
            else{
              $('#res').html("Error, verifique la cedula del estudiante o si este ya esta inscrito en una sección.");
              $('#res').css('color','red');
            }
          });
        });
      });
    </script>

<body style="background-color: #FFFFFF" data-spy="scroll" data-target="#navbar1">

  <!-- ********************************************** MENU DE NAVEGACION **************************************************** -->

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

          <a href="#" class="navbar-brand"> SSFDTN <span class="glyphicon glyphicon-education"></a>

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
<?php if($_SESSION['tipo'] == "administrador") { ?> <li><a href="manualad.pdf" download="Manual del Administrador" target="__blank"><span class="glyphicon glyphicon-question-sign"></span> Ayuda</a></li> <?php } ?>
<?php if($_SESSION['tipo'] == "operador") { ?> <li><a href="manualop.pdf" download="Manual del Operador" target="__blank"><span class="glyphicon glyphicon-question-sign"></span> Ayuda</a></li> <?php } ?>
<?php if($_SESSION['tipo'] == "usuario") { ?> <li><a href="manualu.pdf" download="Manual del Usuario" target="__blank"><span class="glyphicon glyphicon-question-sign"></span> Ayuda</a></li> <?php } ?>
<?php if($_SESSION['tipo'] == "administrador") { ?> <li><a href="respaldo/respaldo.php" target="__blank">
<span class="glyphicon glyphicon-download-alt"></span> Respaldo</a></li> <?php } ?>
                    <li class="divider"></li>
                    <li><a href="../controlador/destroy.php"><span class="glyphicon glyphicon-off"></span> Cerrar sesión</a></li>

                  </ul>

              </li>

            </ul>

          </div>

      </div>
    </nav>

  </header>

  <div class="container">

    <!-- ******************************************************************************************OBJETOS MACIZOS ******************************* -->

  <div class="col-md-4" style="background-color:#5bc0de;"> 

   <center><img src="imagenes/cubos.png" style="margin: 5%;" width="49.2%"> </center>

    <center><a href="simulador.php?user=<?php echo $usuario; ?>" target="__blank" style="margin: 5%" class="btn btn-default btn-lg"> 
      <span class="glyphicon glyphicon-play-circle"></span> Iniciar simulador </a>

    </center> 

    <center> <h4>Objetos Macizos</h4></center> 

    <p class="text-center" style="color: #2E2525; margin: 5%; font-size: 15px">
      En este simulador podrás visualizar el flote de objetos macizos dentro de un fluido. Este cuenta con una lista de fluidos, materiales
      y figuras con su tamaño respectivo a añadir. A medida que crees tú escenario
      veras cada una de las características y valores de los elementos que has seleccionado y si el objeto flota o se hunde al iniciar el simulador.
    </p>

     </div>

       <!-- ******************************************************************************************OBJETOS HUECOS ******************************* -->

  <div class="col-md-4" style="background-color:#5cb85c;"> 

   <center><img src="imagenes/cilindro.png" style="margin: 5%" width="22.5%"> </center>

    <center><a href="huecos.php?user=<?php echo $usuario; ?>" target="__blank" style="margin: 5%" class="btn btn-default btn-lg"> 
      <span class="glyphicon glyphicon-play-circle"></span> Iniciar simulador </a></center> 

    <center> <h4>Objetos Huecos</h4></center> 

    <p class="text-center" style="color: #2E2525; margin: 5%; font-size: 15px">
      En este simulador podrás visualizar el flote de objetos huecos dentro de un fluido. Este cuenta con una lista de fluidos, materiales, espesor
      y figuras con su tamaño respectivo a añadir. A medida que crees tú escenario
      verás cada una de las características y valores de los elementos que has seleccionado y si el objeto flota o se hunde al iniciar el simulador.
    </p>

     </div>

 <!-- *************************************************** EXAMEN VIRTUAL ******************************************************** -->

 <div class="col-md-4" style="background-color:#d9534f;"> 

    <center><img src="imagenes/exam.ico" style="" width="50%"> </center>

    <!-- ADMINISTRADOR -->

      <?php if($_SESSION['tipo'] == "administrador") { ?>

      <div class="collapse navbar-collapse" id="navbar1">

            <ul class="nav navbar-nav navbar-center">

 <li><center><a href="#verexamen" class="btn btn-default btn-lg" style="margin: 10%; margin-left: 40%;"> 
  <!-- style="margin-left: 50%; margin-top: 7%; margin-bottom: 13%" -->

  <span class="glyphicon glyphicon-eye-open"></span> Ver Examenes</a></center></li></ul> </div> <?php } ?>

  <!-- OPERADOR -->

    <?php if($_SESSION['tipo'] == "operador") { ?>

    <div class="col-md-12">

  <div class="col-md-6"><center><a href="#crearseccion" data-toggle="modal" style="margin: 7.3%; margin-left: -1%" class="btn btn-default">
   <span class="glyphicon glyphicon-pencil"></span> Secciones</a></center> </div>

  <div class="col-md-6"> <center><a href="#crearexamen" data-toggle="modal" style="margin: 7.3%; margin-left: -1%" class="btn btn-default"> 

  <span class="glyphicon glyphicon-pencil"></span> Crear Examen</a></center><br></div></div>

   <?php } ?>

   <!-- USUARIO -->

   <?php if($_SESSION['tipo'] == "usuario") { ?>

   <div class="collapse navbar-collapse" id="navbar1">

            <ul class="nav navbar-nav navbar-center">

  <li><center><a href="#verexamen" style="margin-left: 40%; margin-top: 7%; margin-bottom: 13%" class="btn btn-default btn-lg">
   <span class="glyphicon glyphicon-list-alt"></span> Tomar examen</a></center></li></ul> </div> <?php } ?>

   <!-- ************************************************************************************************************* -->

   <center> <h4 <?php if($_SESSION['tipo'] == "operador") { ?> style="margin: 10%;" <?php } ?> >Examen Virtual</h4></center> 

   <p class="text-center" style="color: #2E2525; margin: 5%; font-size: 15px">
      Este examen es realizado por el administrador del sistema para que los profesores asignen que secciones podrán tomar alguno de los exámenes
      y el estudiante luego de culminar con el mismo, podrá visualizar su %. Esta evaluación está basada en el tema a tratar y mide el desempeño del estudiante
      a través de estadísticas.
    </p>

 </div>

</div>

<div class="main" id="verexamen">

     <?php 

     require_once("../modelo/conexion.php");

     if($_SESSION['tipo'] == "administrador") { //SI EL USUARIO ES ADMINISTRADOR BUSCAMOS TODOS LOS EXAMENES PARA MOSTRAR

     $sqle = "SELECT *FROM examen_cont";
     $rese = mysql_query($sqle);
     $rowe = mysql_num_rows($rese);

    }   
    
    if($_SESSION['tipo'] == "operador") { //SI EL USUARIO ES DE TIPO OPERADOR CONTAMOS LOS EXAMENES Q ESTE POSEE

     $sqle = "SELECT *FROM examen_cont WHERE login='$usuario'";
     $rese = mysql_query($sqle);
     $rowe = mysql_num_rows($rese);

    }     

    if($_SESSION['tipo'] == "usuario") { //SI EL USUARIO ES DE TIPO USUARIO BUSCAMOS SU CEDULA Y SI PERTENECE A UNA SECCION Y EXAMEN CON SU LOGIN

     $sql = "SELECT cedula from usuario_personal where login = '$usuario'";
     $res = mysql_query($sql);
     $fetch = mysql_fetch_array($res);
     $fetch = $fetch[0];

     $sql2 = "SELECT login FROM seccion_usuario WHERE cedula_u = '$fetch'";
     $res2 = mysql_query($sql2);
     $fetch2 = mysql_fetch_array($res2);
     $fetch2 = $fetch2[0];

     //CONTAR LA CANTIDAD DE EXAMENES
     
     $sqle = "SELECT *FROM examen_cont WHERE login='$fetch2'";
     $rese = mysql_query($sqle);
     $rowe = mysql_num_rows($rese);

     } 

     for($i=0; $i<$rowe; $i++){

      $req = mysql_fetch_assoc($rese);

      ?>

      <div class="col-md-4"> <center> <img src="imagenes/examen.png" style="height: 100px; margin-top: 10%"> <br>

        <?php if($_SESSION['tipo'] == "administrador") { ?>

       <a href="examenv.php?examen=<?php echo $req["examen"]; ?>" style="margin-top: 0%;" class="btn btn-success"> 
        <span class="glyphicon glyphicon-eye-open"></span> <?php echo $req["examen"]; ?> </a>

        <?php } ?>

        <?php if($_SESSION['tipo'] == "operador") { ?>

       <a href="examenv.php?examen=<?php echo $req["examen"]; ?>" style="margin-top: 0%;" class="btn btn-success"> 
        <span class="glyphicon glyphicon-eye-open"></span> <?php echo $req["examen"]; ?> </a>

        <a href="sweet/eliminarexam.php?examen=<?php echo $req["examen"]; ?>" style="margin-top: 0%;" class="btn btn-danger"> 
        <span class="glyphicon glyphicon-trash"> Eliminar</span></a>

        <?php } ?>

        <?php if($_SESSION['tipo'] == "usuario") {  ?>

       <a href="examenv.php?examen=<?php echo $req["examen"]; ?>" style="margin-top: 0%;" class="btn btn-success"> 
        <span class="glyphicon glyphicon-log-in"></span> <?php echo $req["examen"]; ?> </a>

        <?php } ?>

         </center></div>

        <?php } ?> 

        <!-- ************************************************************************************************************ -->

<!--  VENTANA MODAL CREAR SECCIONES -->

          <div class="modal fade" id="crearseccion">

            <div class="modal-dialog modal-lg">

              <div class="modal-content">

                <div class="modal-header">

                  <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>

                  <h4> Crear sección de estudiantes </h4> <br> <table border='1'> 

                  <div class="alert alert-info"> <h5> Instrucciones: Escriba el nombre de la sección y la cedula de los estudiantes pertenecientes 
                    a esta </h5> </div>

                </table>

                </div>

                <div class="modal-body col-md-12">

                  <!-- AGREGAR SECCION -->

                  <form id="formuler" name="formuler" method="POST" action="../controlador/seccion.php" autocomplete="off">

                    <div class="form-group" style="margin-left: 2%">

                  <label class="control-label col-md-1"> Sección: </label>
                  <div class="col-md-2"><input type="text" id="seccion" name="seccion" class="form-control" placeholder="Ejm: A" 
                  maxlength="4" style="width: 100%; margin-left: 15%">
                </div>

<?php date_default_timezone_set("America/Caracas"); $hoy = date ("Y"); ?>

                <label class="control-label col-md-1"> Periodo: </label>
                  <div class="col-md-2"><input type="text" id="periodo" name="periodo" class="form-control" placeholder="Ejm: 2017" 
                  maxlength="10" style="width: 100%; margin-left: -7%" value="<?php echo $hoy; ?>">
                </div>

                  <div class="col-md-1"><button class="btn btn-primary" style="margin-left: -10%">+</button></div>

                  </div>

                  <br> <br> <br>

                  <!-- ********************** -->

                  </form>

  <table id="form">
    <form autocomplete="off">

        <!-- *********************************************** SECCIONES QUE HA CREADO EL PROFESOR Y LA CEDULA DEL ESTUDIANTE ************************* -->

        <div class="form-group col-md-12">

        <div class="col-md-2">

          <select class="form-control" id="nombre"/ style="width: 70%">

            <!-- BUSCAR SECCIONES -->
<?php 

$sqlbusec = "SELECT nombre_sec FROM secciones WHERE login = '$usuario'"; 
$resbusec = mysql_query($sqlbusec);

while ($reqbusec = mysql_fetch_array($resbusec)){

?>

            <option value="<?php echo $reqbusec['nombre_sec']; ?>"><?php echo $reqbusec["nombre_sec"]; ?></option> <?php } ?>

          </select>

        </div>

        <div class="col-md-4"><input type="text" id="cedula"/ class="form-control" placeholder="Cédula del estudiante:" 
        required title="Solo numeros, Mínimo 7 digitos Máximo 8" maxlength="8" pattern="[0-8]{7,8}$" style="width: 100%; margin-left: -20%"></div>

        <div class="col-md-1"><input type="button" id="boton" value="+"/ style="margin-left: -160%" class="btn btn-success"></button>
      </div>

      </div>

        <!-- **************************************************************************************************************************************** -->
        
    </form>
  </table>
  <span id="res"></span>

</div>

          <div class="modal-footer"> 

            <!-- TAB DINAMICA DE SECCION DE PROFESOR -->
<?php 

$sql_sp = "SELECT DISTINCT nombre_sec FROM seccion_usuario WHERE login = '$usuario'";
$res_sp = mysql_query($sql_sp);
$row_sp = mysql_num_rows($res_sp);
$res_sp2 = mysql_query($sql_sp);

?>

            <div role="tabpanel">

                <ul class="nav nav-tabs" role="tablist">

                  <li role="presentation" class="active"> <a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Todas las Secciones</a></li>

                  <?php for($i = 1; $i <= $row_sp; $i++) { $req_sp = mysql_fetch_array($res_sp); ?>

<li role="presentation"> <a href="#sec<?php echo $i; ?>" aria-controls="sec<?php echo $i; ?>" data-toggle="tab" role="tab">
  Sección <?php echo $req_sp["nombre_sec"]; ?></a></li>

                  <?php } ?>

                </ul>

                  <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="seccion1">

<!-- ********************************************** PAGINACION DE RESULTADOS DE SECCION DE PROFESOR ********************************************************** -->

  <div class="container col-md-12">

    <br>

    <?php if($row_sp!=0){ ?>

    <a href="pdf/pdf_secciones.php" target="__blank"> <img src="imagenes/pdf.png" width="8%"></a> <?php } ?>

                <?php 

                $connect = mysqli_connect("localhost", "root", "", "flotabilidad");  
                mysqli_set_charset($connect,"utf8");
                $query ="SELECT usuario_personal.login, nombre_sec, cedula_u, nombre, sexo FROM seccion_usuario, usuario_personal 
                WHERE seccion_usuario.cedula_u = usuario_personal.cedula and seccion_usuario.login = '$usuario' ORDER BY usuario_personal.nombre ASC";  
                $result = mysqli_query($connect, $query); 

                ?>

                <br /> <br> 
                <center>
                <div class="table-responsive">  
                    <table id="employee_data" class="table table-striped table-bordered">
                          <thead>  
                            <th colspan="7" style="background-color: #5cb85c; color: #FFFFFF"><h4 align="center">Mis Secciones y Estudiantes</h4>  </th>
                               <tr>  
                                    <td><center><h5>Usuario</h5></center></td>  
                                    <td><center><h5>Nombre</h5></center></td>  
                                    <td><center><h5>Cedula</h5></center></td>  
                                    <td><center><h5>Sexo</h5></center></td>
                                    <td><center><h5>Sección</h5></center></td>
                                    <td><center><h5>Acción</h5></center></td>
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                             $cediu = $row["cedula_u"];
                               echo '  
                               <tr>  
                                    <td>'.$row["login"].'</td>  
                                    <td>'.$row["nombre"].'</td>  
                                    <td>'.$row["cedula_u"].'</td>  
                                    <td>'.$row["sexo"].'</td>
                                    <td>'.$row["nombre_sec"].'</td>  
                                    <td><a href="sweet/eliminarsec.php?user='."$cediu".'" class="btn btn-danger pull-center">
   <span class="glyphicon glyphicon-trash"></span> Eliminar</a></td>
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div> 
                </center> 

  </div> 

   <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>

</div>

  <!-- ************************************* SECCIONES EN ESPECIFICO DEL PROFESOR ************************************* --> 

  <?php for($i = 1; $i <= $row_sp; $i++) { 

    $req_sp2 = mysql_fetch_array($res_sp2); 
    $mi_seccion = $req_sp2["nombre_sec"];

    ?>

                      <div role="tabpanel" class="tab-pane" id="sec<?php echo $i; ?>">

<!-- ********************************************** PAGINACION DE RESULTADOS DE SECCION DE PROFESOR ********************************************************** -->

  <div class="container col-md-12">

    <br>

    <a href="pdf/pdf_seccion.php?seccion=<?php echo $mi_seccion; ?>" target="__blank"> <img src="imagenes/pdf.png" width="8%"></a>

                <?php 

                $connect = mysqli_connect("localhost", "root", "", "flotabilidad");  
                mysqli_set_charset($connect,"utf8");
                $query ="SELECT usuario_personal.login, nombre_sec, cedula_u, nombre, sexo FROM seccion_usuario, usuario_personal 
                WHERE seccion_usuario.cedula_u = usuario_personal.cedula and seccion_usuario.login = '$usuario' AND
                seccion_usuario.nombre_sec = '$mi_seccion' ORDER BY usuario_personal.nombre ASC";  
                $result = mysqli_query($connect, $query); 

                ?>

                <br /> <br> 
                <center>
                <div class="table-responsive">  
                    <table id="employee_data<?php echo $i; ?>" class="table table-striped table-bordered">
                          <thead>  
                            <th colspan="7" style="background-color: #5cb85c; color: #FFFFFF"><h4 align="center">Mis Secciones y Estudiantes</h4>  </th>
                               <tr>  
                                    <td><center><h5>Usuario</h5></center></td>  
                                    <td><center><h5>Nombre</h5></center></td>  
                                    <td><center><h5>Cedula</h5></center></td>  
                                    <td><center><h5>Sexo</h5></center></td>
                                    <td><center><h5>Sección</h5></center></td>
                                    <td><center><h5>Acción</h5></center></td>
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                             $cediu = $row["cedula_u"];
                               echo '  
                               <tr>  
                                    <td>'.$row["login"].'</td>  
                                    <td>'.$row["nombre"].'</td>  
                                    <td>'.$row["cedula_u"].'</td>  
                                    <td>'.$row["sexo"].'</td>
                                    <td>'.$row["nombre_sec"].'</td>  
                                    <td><a href="sweet/eliminarsec.php?user='."$cediu".'" class="btn btn-danger pull-center">
   <span class="glyphicon glyphicon-trash"></span> Eliminar</a></td>
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div> 
                </center> 

  </div> 

   <script>  
 $(document).ready(function(){  
      $('#employee_data<?php echo $i; ?>').DataTable();  
 });  
 </script>

</div>

  <?php } ?>

    </div> 

</div>

      <!-- *************************************************** CONTACTENOS ******************************************************** -->

          </form>

          <!--  cerrando main -->

          </div> </div> </div> </div> </div>

<!-- ********************************************************************************************************************************************** -->

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

        <a href="#collapse1" data-toggle="collapse" data-parent="#accordion" class="btn btn-primary">
          <span class="glyphicon glyphicon-edit"></span> Editar mis datos</a>

      </h4>

    </div>

    <div id="collapse1" class="panel-collapse collapse">   

      <div class="panel-body">

        <form action="../controlador/editar_u.php" method="POST" class="form-horizontal" autocomplete="off">

<div class="form-group">

<label class="control-label col-md-2">Contraseña</label> 

<div class="col-md-10"> <input class="form-control" type="password" name="pass" 
  placeholder="Escribe tu contraseña: " required
   title="La contraseña debe contener al menos 8 caracteres, una letra minúscula, una mayúscula y un número" 
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"> </div>

</div>

<div class="form-group">

<label class="control-label col-md-2">Repetir contraseña</label> 

<div class="col-md-10"> <input class="form-control" type="password" name="pass2" 
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

<!-- SCRIPT PARA AGREGAR OPCIONES, PREGUNTAS Y ELIMINARLAS -->

<script type="text/javascript" src="js/crearexamen.js"> </script>

      <!--  VENTANA MODAL CREAR EXAMEN -->

          <div class="modal fade" id="crearexamen">

            <div class="modal-dialog">

              <div class="modal-content">

                <div class="modal-header">

                  <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>

                  <h4> Cree su examen virtual </h4> <br> <table border='1'> 

                  <div class="alert alert-info"> <h4> Instrucciones: </h4> Rellene los campos de acuerdo a la información solicitada, los campos
                  del nombre del examen y pregunta son obligatorios y debe escribir por lo menos 2 opciones y seleccionar cuál de estas es la correcta,
                  el máximo de opciones es de 6. Una vez finalizado esto, presione en guardar.</div>

                  <div class="alert alert-danger"> <h5> El botón limpiar elimina todo el texto que ha sido escrito en las casillas</h5></div>

                </table>

                </div>

                <div class="modal-body col-md-12">

                <form action="../controlador/examen_c.php" class="form-horizontal" autocomplete="off">

<!-- ********************************************************************************************************************************************** -->

  <input type="text" maxlength="50" title="Minino 6 caracteres Maximo 50" name="examen" placeholder="Nombre del examen:" required 
  class="form-control" style="width: 30%;"> <br><br>

<!-- ******************************************************** PREGUNTA 1 ************************************************************************** -->

  <div class="form-group">

  <label class="control-label col-md-2" for="pregunta1"> <span class="badge"> 1</span></label>

  <div class="col-md-10">
  <input type="text" name="pregunta1" maxlength="200" id="pregunta1" 
  title="Minino 20 caracteres Maximo 200" placeholder="Escriba su pregunta: " required class="form-control" style="margin-left: -2%; width: 40%;"></div> <br><br>

  </div>

  <div class="col-md-12">

  <div class="col-md-2"> <select name="vf1[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select> </div>
  <div class="col-md-10">
  <input type="text" name="opcion1[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200" required 
  style="margin-left: -2%; width: 40%;" class="form-control">
  </div>

  </div>

  <div class="col-md-12">

  <div class="col-md-2"> <select name="vf1[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select> </div>
  <div class="col-md-10">
  <input type="text" name="opcion1[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200" required 
  style="margin-left: -2%; width: 40%;" class="form-control">
  </div>

  </div>

  <div class="col-md-12">

  <div class="col-md-2"> <select name="vf1[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select> </div>
  <div class="col-md-10">
  <input type="text" name="opcion1[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200"
  style="margin-left: -2%; width: 40%;" class="form-control">
  </div>

  </div>

  <div class="col-md-12">

  <div class="col-md-2"> <select name="vf1[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select> </div>
  <div class="col-md-10">
  <input type="text" name="opcion1[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200" 
  style="margin-left: -2%; width: 40%;" class="form-control"><br>
  </div>

  </div>

  <div class="col-md-12">

  <div id="nuevo1" class="form-group col-md-12"></div>
  <div class="col-md-3">
  <input type="button" value="+ Agregar" id="di1" onclick="nuevoelemento(1);" class="btn btn-success"></div>
  <div class="col-md-3">
  <input type="button" value="- Eliminar" id="ri1" onclick="eliminarelemento(1);" disabled class="btn btn-danger">
</div>
  </div>

<!-- ******************************************************** PREGUNTA 2 ************************************************************************** -->

  <div class="form-group">

  <label class="control-label col-md-2" for="pregunta2" style="margin-top: 5%;"> <span class="badge"> 2</span></label>

  <div class="col-md-10" style="margin-top: 5%;">
   <input type="text" name="pregunta2" maxlength="200" id="pregunta2" 
   title="Minino 20 caracteres Maximo 200" placeholder="Escriba su pregunta: " required class="form-control" 
   style="margin-left: -2%; width: 40%;">
 </div>

 </div>

  <div class="col-md-12">

  <div class="col-md-2"> 
  <select name="vf2[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select></div>
  <div class="col-md-10">
  <input type="text" name="opcion2[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200" required
  style="margin-left: -2%; width: 40%;" class="form-control">
  </div>

</div>

  <div class="col-md-12">

  <div class="col-md-2"> 
  <select name="vf2[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select></div>
  <div class="col-md-10">
  <input type="text" name="opcion2[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200" required
  style="margin-left: -2%; width: 40%;" class="form-control">
  </div>

</div>

  <div class="col-md-12">

  <div class="col-md-2"> 
  <select name="vf2[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select></div>
  <div class="col-md-10">
  <input type="text" name="opcion2[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200"
  style="margin-left: -2%; width: 40%;" class="form-control">
  </div>

</div>

  <div class="col-md-12">

  <div class="col-md-2"> 
  <select name="vf2[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select></div>
  <div class="col-md-10">
  <input type="text" name="opcion2[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200"
  style="margin-left: -2%; width: 40%;" class="form-control"><br>
  </div>

</div>

<div class="col-md-12">

  <div id="nuevo2" class="form-group col-md-12"></div>
  <div class="col-md-3">
 <input type="button" value="+ Agregar" id="di2" class="btn btn-success" onclick="nuevoelemento(2);">
  </div>
  <div class="col-md-3">
  <input type="button" value="- Eliminar" id="ri2" class="btn btn-danger" onclick="eliminarelemento(2);" disabled>
  </div>
  <br><br>

</div>

<!-- ******************************************************** PREGUNTA 3 ************************************************************************** -->

  <div class="form-group">

  <label class="control-label col-md-2" for="pregunta3" style="margin-top: 5%;"> <span class="badge"> 3</span></label>

  <div class="col-md-10" style="margin-top: 5%;">
   <input type="text" name="pregunta3" maxlength="200" id="pregunta3" 
   title="Minino 20 caracteres Maximo 200" placeholder="Escriba su pregunta: " required class="form-control" 
   style="margin-left: -2%; width: 40%;">
 </div>

 </div>

  <div class="col-md-12">

  <div class="col-md-2"> 
  <select name="vf3[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select></div>
  <div class="col-md-10">
  <input type="text" name="opcion3[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200" required
  style="margin-left: -2%; width: 40%;" class="form-control">
  </div>

</div>

  <div class="col-md-12">

  <div class="col-md-2"> 
  <select name="vf3[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select></div>
  <div class="col-md-10">
  <input type="text" name="opcion3[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200" required
  style="margin-left: -2%; width: 40%;" class="form-control">
  </div>

</div>

  <div class="col-md-12">

  <div class="col-md-2"> 
  <select name="vf3[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select></div>
  <div class="col-md-10">
  <input type="text" name="opcion3[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200"
  style="margin-left: -2%; width: 40%;" class="form-control">
  </div>

</div>

  <div class="col-md-12">

  <div class="col-md-2"> 
  <select name="vf3[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select></div>
  <div class="col-md-10">
  <input type="text" name="opcion3[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200"
  style="margin-left: -2%; width: 40%;" class="form-control"><br>
  </div>

</div>

<div class="col-md-12">

  <div id="nuevo3" class="form-group col-md-12"></div>
  <div class="col-md-3">
  <input type="button" value="+ Agregar" id="di3" class="btn btn-success" onclick="nuevoelemento(3);">
  </div>
  <div class="col-md-3">
  <input type="button" value="- Eliminar" id="ri3" class="btn btn-danger" onclick="eliminarelemento(3);" disabled>  <br><br>
  </div>

</div>

<!-- ******************************************************** PREGUNTA 4 ************************************************************************** -->

  <div class="form-group">

  <label class="control-label col-md-2" for="pregunta4" style="margin-top: 5%;"> <span class="badge"> 4</span></label>

  <div class="col-md-10" style="margin-top: 5%;">
   <input type="text" name="pregunta4" maxlength="200" id="pregunta4" 
   title="Minino 20 caracteres Maximo 200" placeholder="Escriba su pregunta: " required class="form-control" 
   style="margin-left: -2%; width: 40%;">
 </div>

 </div>

  <div class="col-md-12">

  <div class="col-md-2"> 
  <select name="vf4[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select></div>
  <div class="col-md-10">
  <input type="text" name="opcion4[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200" required
  style="margin-left: -2%; width: 40%;" class="form-control">
  </div>

</div>

  <div class="col-md-12">

  <div class="col-md-2"> 
  <select name="vf4[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select></div>
  <div class="col-md-10">
  <input type="text" name="opcion4[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200" required
  style="margin-left: -2%; width: 40%;" class="form-control">
  </div>

</div>

  <div class="col-md-12">

  <div class="col-md-2"> 
  <select name="vf4[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select></div>
  <div class="col-md-10">
  <input type="text" name="opcion4[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200"
  style="margin-left: -2%; width: 40%;" class="form-control">
  </div>

</div>

  <div class="col-md-12">

  <div class="col-md-2"> 
  <select name="vf4[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select></div>
  <div class="col-md-10">
  <input type="text" name="opcion4[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200"
  style="margin-left: -2%; width: 40%;" class="form-control"><br>
  </div>

</div>

<div class="col-md-12">

  <div id="nuevo4" class="form-group col-md-12"></div>
  <div class="col-md-3">
  <input type="button" value="+ Agregar" id="di4" class="btn btn-success" onclick="nuevoelemento(4);">
  </div>
  <div class="col-md-3">
  <input type="button" value="- Eliminar" id="ri4" class="btn btn-danger" onclick="eliminarelemento(4);" disabled>  <br><br>
  </div>

</div>

<!-- ******************************************************** PREGUNTA 5 ************************************************************************** -->

  <div class="form-group">

  <label class="control-label col-md-2" for="pregunta5" style="margin-top: 5%;"> <span class="badge"> 5</span></label>

  <div class="col-md-10" style="margin-top: 5%;">
   <input type="text" name="pregunta5" maxlength="200" id="pregunta5" 
   title="Minino 20 caracteres Maximo 200" placeholder="Escriba su pregunta: " required class="form-control" 
   style="margin-left: -2%; width: 40%;">
 </div>

 </div>

  <div class="col-md-12">

  <div class="col-md-2"> 
  <select name="vf5[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select></div>
  <div class="col-md-10">
  <input type="text" name="opcion5[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200" required
  style="margin-left: -2%; width: 40%;" class="form-control">
  </div>

</div>

  <div class="col-md-12">

  <div class="col-md-2"> 
  <select name="vf5[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select></div>
  <div class="col-md-10">
  <input type="text" name="opcion5[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200" required
  style="margin-left: -2%; width: 40%;" class="form-control">
  </div>

</div>

  <div class="col-md-12">

  <div class="col-md-2"> 
  <select name="vf5[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select></div>
  <div class="col-md-10">
  <input type="text" name="opcion5[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200"
  style="margin-left: -2%; width: 40%;" class="form-control">
  </div>

</div>

  <div class="col-md-12">

  <div class="col-md-2"> 
  <select name="vf5[]" class="form-control"> <option value="F">F</option> <option value="V">V</option> </select></div>
  <div class="col-md-10">
  <input type="text" name="opcion5[]" placeholder="Opción: " maxlength="200" title="Minino 20 caracteres Maximo 200"
  style="margin-left: -2%; width: 40%;" class="form-control"><br>
  </div>

</div>

<div class="col-md-12">

  <div id="nuevo5" class="form-group col-md-12"></div>
  <div class="col-md-3">
  <input type="button" value="+ Agregar" id="di5" class="btn btn-success" onclick="nuevoelemento(5);">
  </div>
  <div class="col-md-3">
  <input type="button" value="- Eliminar" id="ri5" class="btn btn-danger" onclick="eliminarelemento(5);" disabled>  <br><br>
  </div>

</div>

  <!-- <div id="preguntas"></div>

  <input type="button" value="Agregar Pregunta" onclick="preguntanueva()"> <br> <br> -->

<!-- *********************************************************************************************************************************************** -->

</div>

          <div class="modal-footer">

            <button name="guardar" value="Guardar" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar </button>
            <input type="reset" value="Limpiar" class="btn btn-danger">

          </div>


                  </form>

              </div>

            </div>

          </div>

        </div>

      <!-- *************************************************** CONTACTENOS ******************************************************** -->

     <div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top: 5%;" id="contacto">
            <div class="well well-sm">
                <form class="form-horizontal" action="#">
                    <fieldset>
                        <legend class="text-center header">Contáctenos</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="glyphicon glyphicon-user" style="color: #36A0FF; font-size: 35px;"></i></span>
                            <div class="col-md-8">
                               <h4> Elio Alejandro Marcano Brito <a href="https://www.facebook.com/alejandro.marcano.9" target="__blank">
                                <img src="imagenes/face.png" width="3%"></a> 
                              <a href="http://buoyancy.hol.es/curriculum/" target="__blank">
                                <img src="imagenes/web.png" width="4%" style="margin-left: 8px"></a> </h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="glyphicon glyphicon-user" style="color: #36A0FF; font-size: 35px;"></i></span>
                            <div class="col-md-8">
                                <h4> Aleuxis Rauseo <a href="https://www.facebook.com/aleuxis.rauseo" target="__blank">
                                <img src="imagenes/face.png" width="3%"></a> </h4>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="glyphicon glyphicon-user" style="color: #36A0FF; font-size: 35px;"></i></span>
                            <div class="col-md-8">
                                <h4> Tracy Alexandra Lugo <a href="https://www.facebook.com/tracy.alexandra.98" target="__blank">
                                <img src="imagenes/face.png" width="3%"></a> </h4>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="glyphicon glyphicon-phone" style="color: #36A0FF; font-size: 35px;"></i></span>
                            <div class="col-md-8">
                                <h4> 0294 - 3322656 </h4>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="glyphicon glyphicon-screenshot" style="color: #36A0FF; font-size: 35px;"></i></span>
                            <div class="col-md-8">
                                <img src="imagenes/ubicacion.png" width="80%"></img>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
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