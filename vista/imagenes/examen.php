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

<body>

<div class="col-md-12"></div>

<select name="cantidad" id="cant" class="form-control col-md-1" style="width: 5%">

  <option value="5">5</option>

</select>

<input type="button" name="boton" class="btn btn-success" value="+" onclick="generar();">

</div>

<br> <br>

<form action="examen.php" method="POST" name="formulario">

<div id="texto" class="col-md-2"></div> <div id="texto2" class="col-md-2"></div> <div id="texto3" class="col-md-1"></div>

<br> <br>

<div id="preguntas" class="col-md-12"></div>

</div>

</form>

<script type="text/javascript">

  function generar(){

    var elemento = document.createElement("input");
    elemento.setAttribute("placeholder","Preguntas V o F")
    elemento.setAttribute("type","text");
    elemento.setAttribute("class","form-control");
    elemento.setAttribute("name","vf");
    elemento.setAttribute("id","verfa");
    var id = document.getElementById("texto").appendChild(elemento);

    var elemento2 = document.createElement("input");
    elemento2.setAttribute("placeholder","Preguntas Multiples")
    elemento2.setAttribute("type","text");
    elemento2.setAttribute("class","form-control");
    elemento2.setAttribute("name","mult");
    elemento2.setAttribute("id","multiple");
    var id2 = document.getElementById("texto2").appendChild(elemento2);

    var elemento3 = document.createElement("input");
    elemento3.setAttribute("type","button");
    elemento3.setAttribute("name","boton");
    elemento3.setAttribute("class","btn btn-success");
    elemento3.setAttribute("value","+");
    elemento3.setAttribute("onclick","agregar();");
    elemento3.setAttribute("id","botons");
    var id3 = document.getElementById("texto3").appendChild(elemento3);

  }

  function agregar(){

    var verfa = document.getElementById("verfa").value;
    var multiple = document.getElementById("multiple").value;

    for(var i = 1; i<=verfa; i++){

     var elemento = document.createElement("input");
      elemento.setAttribute("type","text");
      elemento.setAttribute("placeholder","Escriba la pregunta:");
      elemento.setAttribute("name","preguntavf" + i);
      elemento.setAttribute("style","width: 30%");
      elemento.setAttribute("class","form-control");
      var id1 = document.getElementById("preguntas").appendChild(elemento);

      var escribir = document.createElement("label");
      var contenido = document.createTextNode("V");
      escribir.appendChild(contenido);
      var escribir = document.getElementById("preguntas").appendChild(escribir);

      var elemento2 = document.createElement("input");
      elemento2.setAttribute("type","radio");
      elemento2.setAttribute("name","sradio" + i);
      elemento2.setAttribute("value","V");
      var id2 = document.getElementById("preguntas").appendChild(elemento2);

      var escribir2 = document.createElement("label");
      var contenido2 = document.createTextNode("F");
      escribir2.appendChild(contenido2);
      var escribir2 = document.getElementById("preguntas").appendChild(escribir2);

      var elemento3 = document.createElement("input");
      elemento3.setAttribute("type","radio");
      elemento3.setAttribute("name","sradio" + i);
      elemento3.setAttribute("value","F");
      var id3 = document.getElementById("preguntas").appendChild(elemento3);

      var saltodelinea = document.createElement("br");
      var idsalto = document.getElementById("preguntas").appendChild(saltodelinea);

    }

    //**********************************************************************************

    var saltodelinea = document.createElement("br");
    var idsalto = document.getElementById("preguntas").appendChild(saltodelinea);
    var saltodelinea = document.createElement("br");
    var idsalto = document.getElementById("preguntas").appendChild(saltodelinea);

    //***********************************************************************************

    for(var j = 1; j<=multiple; j++){

      var elementos = document.createElement("input");
      elementos.setAttribute("type","text");
      elementos.setAttribute("placeholder","Escriba la pregunta:");
      elementos.setAttribute("name","preguntamult" + j);
      elementos.setAttribute("style","width: 30%");
      elementos.setAttribute("class","form-control");
      var id4 = document.getElementById("preguntas").appendChild(elementos);

      var saltodelinea = document.createElement("br");
      var idsalto = document.getElementById("preguntas").appendChild(saltodelinea);

      //********

      var elementos2 = document.createElement("input");
      elementos2.setAttribute("type","text");
      elementos2.setAttribute("placeholder","Escriba la opción:");
      elementos2.setAttribute("name","opcionmultone" + j);
      elementos2.setAttribute("style","width: 30%");
      elementos2.setAttribute("class","form-control");
      var id5 = document.getElementById("preguntas").appendChild(elementos2);

      var caja = document.createElement("input");
      caja.setAttribute("type","checkbox");
      caja.setAttribute("name","casilla" + j);
      caja.setAttribute("value", "opone" + j);
      var id6 = document.getElementById("preguntas").appendChild(caja);
      

      //*********

      var elementos3 = document.createElement("input");
      elementos3.setAttribute("type","text");
      elementos3.setAttribute("placeholder","Escriba la opción:");
      elementos3.setAttribute("name","opcionmultsecond" + j);
      elementos3.setAttribute("style","width: 30%");
      elementos3.setAttribute("class","form-control");
      var id66 = document.getElementById("preguntas").appendChild(elementos3);

      var caja2 = document.createElement("input");
      caja2.setAttribute("type","checkbox");
      caja2.setAttribute("name","casilla" + j);
      caja2.setAttribute("value", "opsecond" + j);
      var id7 = document.getElementById("preguntas").appendChild(caja2);
      var saltodelinea = document.createElement("br");
      var idsalto = document.getElementById("preguntas").appendChild(saltodelinea);

      //********

      var elementos4 = document.createElement("input");
      elementos4.setAttribute("type","text");
      elementos4.setAttribute("placeholder","Escriba la opción:");
      elementos4.setAttribute("name","opcionmultthree" + j);
      elementos4.setAttribute("style","width: 30%");
      elementos4.setAttribute("class","form-control");
      var id55 = document.getElementById("preguntas").appendChild(elementos4);

      var caja3 = document.createElement("input");
      caja3.setAttribute("type","checkbox");
      caja3.setAttribute("name","casilla" + j);
      caja3.setAttribute("value", "opthree" + j);
      var id8 = document.getElementById("preguntas").appendChild(caja3);

      var saltodelinea = document.createElement("br");
      var idsalto = document.getElementById("preguntas").appendChild(saltodelinea);
      var saltodelinea = document.createElement("br");
      var idsalto = document.getElementById("preguntas").appendChild(saltodelinea);

    }

    var guardar = document.createElement("input");
    guardar.setAttribute("type","submit");
    guardar.setAttribute("value","Guardar");
    guardar.setAttribute("name","guardar");
    guardar.setAttribute("class","btn btn-primary");
    var guardarid = document.getElementById("preguntas").appendChild(guardar);

  }

</script>

<?php 

$hola = "preguntavf1";
$holas = $_POST[$hola];

echo $holas;

?>

</body>
</html>