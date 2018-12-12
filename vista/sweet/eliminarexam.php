<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistema de Flotabilidad</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">           

      <body>

        <?php $examen = $_GET["examen"]; ?>

        <script type="text/javascript">

swal({
            title: '¿ESTAS SEGURO DE ELIMINAR ESTE EXAMEN?',
            text: 'LEA ANTES DE EJECUTAR: Usted está a punto de eliminar este elemento, si lo hace, estos datos se perderán, tenga esto en cuenta',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'SI!, Deseo Eliminarlo',
            cancelButtonText: 'NO!, Cancela esto',
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                window.location = '../../controlador/examenv_e.php?examen=<?php echo $examen; ?>'; 
            } else {
              swal(
                'Cancelado',
                'La operación ha sido cancelada, su archivo no ha sufrido ninguna modificación',
                'error'
              );
              window.location = '../index2.php';
            }
        });
        </script>

  </body>
  </html>