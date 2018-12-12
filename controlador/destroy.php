<?php

//Eliminar las secciones regresadas durante la entrada del usuario al sistema

session_start();

unset($_SESSION['iniciar']); 

session_destroy();

//Redireccionar a la pantalla de inicio

echo "<script type='text/javascript'> alert('Usted ha cerrado sesión'); window.location='../vista/index.php'; </script>";

?>