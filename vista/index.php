<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistema de Flotabilidad</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<script src="sweet/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweet/dist/sweetalert.css">

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/npm.js"></script>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<body style="background-color: #CCCCCC">

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

          <a href="#" class="navbar-brand"> SSFDTN <span><img src="imagenes/uptp.png" width="8%"></span> </a>

        </div>

          <div class="collapse navbar-collapse" id="navbar1">

            <ul class="nav navbar-nav">

              <!-- <li><a href="#"><img src="imagenes/objetosm.png"> Objetos Macizos</a></li>
              <li><a href="#"><img src="imagenes/objetoh.png"> Objetos Huecos</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-blackboard"></span> Estadisticas de examen</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Contacto</a></li> -->

            </ul>

          </div>

      </div>
    </nav>

  </header>

<center>

<table class="table-bordered" style="margin-top: 8%; background-color: #FFFFFF">

  <tr> <td> <center> <h4> <span class="glyphicon glyphicon-user" style="margin: 10px;"></span> Inicio de sesión de Usuario </h4> </center> </td> </tr>

  <tr>

    <td>

      <br>

  <form action="../controlador/iniciarsesion.php" method="POST" class="form-horizontal" style="margin: 20px" autocomplete="off"> <!-- autocomplete="off" -->

    <div class="form-group">

      <label class="control-label col-md-3">Usuario: </label>
      <div class="col-md-9"> <input type="text" name="usuario" maxlength="8" class="form-control" required> </div>

    </div>

    <div class="form-group">

      <label class="control-label col-md-3"> Contraseña: </label>
      <div class="col-md-9"> <input type="password" name="contrasena" class="form-control" required
        title="La contraseña debe contener al menos 8 caracteres, una letra minúscula, una mayúscula y un número" 
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"> </div>

    </div>

    <br>

    <center>

      <a href="#crearusuario" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-new-window"></span> Registrarme</a>

      <button name="sesion" value="Iniciar Sesion" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</button>

    </center>

  </form>

  </td>

  </tr>

<!-- 

  <tr> 

    </center>

    <td> <a href="" style="color: black;"> <span style="margin:10px;" class="glyphicon glyphicon-lock">
  </span> <strong> ¿Olvidó su contraseña? </a> </strong> </td> 

</tr> -->

  </table>

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

  <div class="col-md-10"> <input type="text" placeholder="Escribe tu cédula: " required title="Solo números, Mínimo 7 digitos Máximo 8" 
    maxlength="8" pattern="[0-9]{7,9}$" class="form-control" name="cedula"> </div>

</div>

<div class="form-group">

  <label class="control-label col-md-2"> Sexo </label>

  <div class="col-md-10"><select class="form-control" name="sexo">
    <option value="Masculino">Masculino</option>
    <option value="Femenino">Femenino</option>
  </select></div>

</div>

<input type="hidden" name="comparar" value="1">

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

</body>
</html>