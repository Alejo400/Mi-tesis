 <?php

class seccion {

public function registrar($seccion,$usuario,$periodo){

$sql = "INSERT INTO secciones VALUES ('$seccion','$usuario','$periodo')";
$res = mysql_query($sql);

if($res == 1){

echo "<script type='text/javascript'> alert('Sección creada con éxito'); window.location='../vista/index2.php'; </script>";

}

else{

echo "<script type='text/javascript'> alert('Error, esta sección ya existe'); window.location='../vista/index2.php'; </script>";

}

}

}

?>