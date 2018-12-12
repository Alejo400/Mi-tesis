<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistema de Flotabilidad</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">           

      <body>

        <script type="text/javascript">

swal({
            title: '¿ESTÁS SEGURO DE ELIMINAR TODOS LOS REGISTROS DE LAS ACCIONES REALIZADAS POR EL USUARIO?',
            text: 'LEA ANTES DE EJECUTAR: Si lo hace, estos datos se perderán, incluyendo los RESULTADOS arrojados EN LAS ESTADÍSTICAS',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'SI!, Estoy Seguro! Deseo Eliminarlo',
            cancelButtonText: 'NO!, Cancela esto',
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                window.location = '../../controlador/eliminar_ha.php'; 
            } else {
              swal(
                'Cancelado',
              );
              window.location = '../historial.php';
            }
        });
        </script>

  </body>
  </html>