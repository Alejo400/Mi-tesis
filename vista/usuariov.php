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

<!--  LLAMADA A LIBRERIAS PARA LA CREACION DE LA PAGINACION -->

           <script src="js/jquery.min.js"></script>    
           <script src="js/table.js"></script>  
           <script src="js/tabledos.js"></script>            
           <link rel="stylesheet" href="css/tablecss.css" />  

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
<!--<?php //if($_SESSION['tipo'] == "administrador") { ?> <li><a href="construccion.html" target="__blank"><span class="glyphicon glyphicon-cog">
</span> Respaldo</a></li> <?php //} ?>-->
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

  <div class="container">

  <a href="#crearusuario" class="btn btn-success pull-right" data-toggle="modal"><span class="glyphicon glyphicon-new-window"></span> Registrar</a>

  </div>

   <!--            VENTANA MODAL                    -->

          <div class="modal fade" id="crearusuario">

            <div class="modal-dialog">

              <div class="modal-content">

                <div class="modal-header">

                  <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-hidden="true">&times;</button>

                  <h4> Rellene los campos </h4>

                </div>

                <div class="modal-body">

                <form action="../controlador/u_registro.php" method="POST" class="form-horizontal" autocomplete="off">

<div class="form-group">

<label class="control-label col-md-2"> Usuario </label> 

<div class="col-md-10"> <input class="form-control" type="text" name="login" maxlength="8" placeholder="Escribe tu nombre de Usuario: " required> </div> 

</div>

<div class="form-group">

<label class="control-label col-md-2">Contraseña</label> 

<div class="col-md-10"> <input class="form-control" type="password" name="pass" placeholder="Escribe tu contraseña: " required  
  title="La contraseña debe contener al menos 8 caracteres, una letra minúscula, una mayúscula y un número" 
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"> </div>

</div>

<div class="form-group">

<label class="control-label col-md-2">Repetir contraseña</label> 

<div class="col-md-10"> <input class="form-control" type="password" name="pass2" placeholder="Repita su contraseña: " required  
  title="La contraseña debe contener al menos 8 caracteres, una letra minúscula, una mayúscula y un número" 
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"> </div>

</div>

<div class="form-group">

<label class="control-label col-md-2" for="option"> Tipo </label> 

  <div class="col-md-10"> <select class="form-control" name="tipo" id="option"> 
    <option value="operador"> Operador </option>
    <option value="usuario"> Usuario </option>

  </select> </div>

</div>

<div class="form-group">

<label class="control-label col-md-2"> Nombre </label> 

<div class="col-md-10"> <input class="form-control" type="text" placeholder="Escribe tu nombre completo: " required maxlength="50" 
  title="Solo Letras, Minino 8 caracteres Máximo 50" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ ]{8,50}$" name="nombre"> </div> 

</div>

<div class="form-group">

  <label class="control-label col-md-2"> Cédula </label>

  <div class="col-md-10"> <input type="text" placeholder="Escribe tu cédula: " required title="Solo numeros, Mínimo 7 digitos Máximo 8" 
    maxlength="8" pattern="[0-9]{7,9}$" class="form-control" name="cedula"> </div>

</div>

<div class="form-group">

  <label class="control-label col-md-2"> Sexo </label>

  <div class="col-md-10"><select class="form-control" name="sexo">
    <option value="Masculino">Masculino</option>
    <option value="Femenino">Femenino</option>
  </select></div>

  <input type="hidden" name="comparar" value="2">

</div>

          <div class="modal-footer">

            <button name="sesion" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
            <input type="reset" value="Limpiar" class="btn btn-danger">

          </div>


                  </form>

                </div>

              </div>

            </div>

          </div>

          <!-- *********************************************************************************************************** -->

  <!-- ****************************************************** MOSTRAR LISTA DE USUARIOS ************************************************************ -->

  <div class="container">

                <?php 

                $connect = mysqli_connect("localhost", "root", "", "flotabilidad");  
                mysqli_set_charset($connect,"utf8");
                $query ="SELECT * FROM usuario, usuario_personal WHERE usuario.login = usuario_personal.login ORDER BY usuario.login DESC";  
                $result = mysqli_query($connect, $query);  

                ?>

                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                            <th colspan="7" style="background-color: #428bca; color: #FFFFFF"><h3 align="center">Historial de Usuario</h3>  </th>
                               <tr>  
                                    <td><center><h4>Usuario</h4></center></td>  
                                    <td><center><h4>Nombre</h4></center></td>  
                                    <td><center><h4>Cédula</h4></center></td>  
                                    <td><center><h4>Sexo</h4></center></td>
                                    <td><center><h4>Tipo</h4></center></td>
                                    <td><center><h4>Estado</h4></center></td>
                                    <td><center><h4>Acción</h4></center></td>
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  

                            $status = $row["estado"];
                            $usuario = $row["login"];

                            if($status == "Activado" && $row["tipo"]!="administrador") {

                               echo '  
                               <tr>  
                                    <td>'.$row["login"].'</td>  
                                    <td>'.$row["nombre"].'</td>  
                                    <td>'.$row["cedula"].'</td>  
                                    <td>'.$row["sexo"].'</td>
                                    <td>'.$row["tipo"].'</td>  
                                    <td>'.$row["estado"].'</td>
                                    <td><center><a href="../controlador/lock.php?lock='."Desactivado".'&user='."$usuario".'" class="btn btn-danger">
   <span class="glyphicon glyphicon-lock"></span> Desactivar</a></center></td>
                               </tr>  
                               '; } 

                               else if($status == "Desactivado" && $row["tipo"]!="administrador") {

                               echo '  
                               <tr>  
                                    <td>'.$row["login"].'</td>  
                                    <td>'.$row["nombre"].'</td>  
                                    <td>'.$row["cedula"].'</td>  
                                    <td>'.$row["sexo"].'</td>
                                    <td>'.$row["tipo"].'</td>  
                                    <td>'.$row["estado"].'</td>
                                    <td><center><a href="../controlador/lock.php?lock='."Activado".'&user='."$usuario".'" class="btn btn-danger">
   <span class="glyphicon glyphicon-lock"></span> Activar</a></center></td>
                               </tr>  
                               '; } 
                          }  
                          ?>  
                     </table>  
                </div>  

  </div>
   <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>

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