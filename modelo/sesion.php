
<?php 

  session_start();

  class sesion{

    var $login;
    var $pass;

    public function entrar($login,$pass){ //RECIBIMOS LOS PARAMETROS ENVIADO MEDIANTE DE POST DEL NOMBRE USUARIO Y PASSWORD

      $sql = "SELECT usuario.login,CAST(AES_DECRYPT(password, 'cifrado$pass') AS CHAR(500)) AS pass,tipo,nombre,cedula,estado FROM usuario,usuario_personal 
      WHERE usuario.login=usuario_personal.login and usuario.login='$login'";
      $res = mysql_query($sql);
      $row = mysql_num_rows($res);

      $req = mysql_fetch_assoc($res);

          //SI EL USUARIO ESTA DESACTIVADO, LO DEVOLVEMOS AL MENU DE INICIO

     if($req["estado"] == "Desactivado"){

        echo "<script type='text/javascript'> alert('Este usuario se encuentra Desactivado'); window.location='../vista/index.php'; </script>";

     }

     else if ($req["pass"] == NULL){

      echo "<script type='text/javascript'> alert('Usuario o Contraseña incorrectas'); window.location='../vista/index.php'; </script>";

     }

     else if($row == 1) //SI TODO ESTA CORRECTO, INGRESAMOS EL USUARIO

      {

        echo "<script type='text/javascript'> alert('Bienvenido $login'); window.location='../vista/index2.php'; </script>";

        $_SESSION['iniciar'] = 1;
        $_SESSION['tipo'] = $req["tipo"];
        $_SESSION['nombre'] = $req["nombre"];
        $_SESSION['user'] = $req["login"];

        // HISTORIAL DE SESSION

          date_default_timezone_set("America/Caracas");
          $actual=date ("Y-m-d"); //El año actual en el calendario espanol
          $hora_actual=date("h:i:sa");

          $nombre = $req["nombre"];
          $tipo = $req["tipo"];
          $cedula = $req["cedula"];

          $sql_ih = "INSERT INTO historialsesion VALUES ('','$login','$nombre','$cedula','$tipo','$hora_actual','$actual')";
          $res_ih = mysql_query($sql_ih);

      }

      else{ //SI NINGUNA DE LAS CONDICIONES SE CUMPLE, SIGNIFICA QUE EL USUARIO O LA CONTRASEÑA HAN SIDO MAL ESCRITAS

        echo "<script type='text/javascript'> alert('Usuario o Contraseña incorrectas'); window.location='../vista/index.php'; </script>";        

      }

    }

  }

?>