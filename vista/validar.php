<?php 

$nuevo = $_GET["examen"];

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistema de Flotabilidad</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<script src="sweet/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweet/dist/sweetalert.css">           

      <body>

        <script type="text/javascript">

        swal({
  title: "Estas seguro?",
  text: "Te recomendamos revisar antes de ejecutar esta accion",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "SI, deseo ELIMINAR esto!",
  closeOnConfirm: false
},
function(){
  window.location='../controlador/examenv_e.php?examen=<?php echo $nuevo; ?>';
});

        </script>

  </body>
  </html>