<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistema de Flotabilidad</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<script src="p5/p5.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/npm.js"></script>

 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="estilos2.css">

 <script type="text/javascript" src="p5js/ambiente.js"> </script>

 <script src="p5/p5.dom.js"></script>
 <script src="p5/p5.sound.js"></script>

<body>

  <form action="" name="formulario" class="form-inline">

  <div class="container-fluid col-md-12 col-lg-12 col-sm-12 col-xs-12">

<div class="form-group col-md-4 col-lg-2 col-sm-4 col-xs-4">

      <label for="nombre"> Nombre: </label>

      <select name="fluidos" class="form-control" id="fluidos" style="width: 110px;">

      <option value="acetona"> Acetona </option>
      <option value="agua"> Agua de Mar </option>
      <option value="alcoholetilico"> Alcohol Etílico </option>
      <option value="alcoholmetilico"> Alcohol Metílico </option>
      <option value="alcoholpropilico"> Alcohol Propílico </option>
      <option value="amoniaco"> Amoniaco </option>
      <option value="benceno"> Benceno </option>
      <option value="tetacloruro"> Tetacloruro de Carbono </option>
      <option value="aceitericino"> Aceite de Ricino </option>
      <option value="etilenglicol"> Etilenglicol </option>
      <option value="gasolina"> Gasolina </option>
      <option value="glicerina"> Glicerina </option>
      <option value="queroseno"> Queroseno </option>
      <option value="aceitelinaza"> Aceite de Linaza </option>
      <option value="propano"> Propano </option>
      <option value="trementina"> Trementina </option>
      <option value="aceitepesado"> Aceite de petroleo pesado </option>
      <option value="aceite"> Aceite de petroleo medio </option>
      <option value="mercurio"> Mercurio </option>

      </select>

    </div>

<div class="form-group col-md-4 col-lg-2 col-sm-4 col-xs-4">

   <label for="material"> Material: </label>
      <select name="material" class="form-control" id="material" style="width: 110px;">

      <option value="maderita.jpg"> Madera </option>
      <option value="acero.jpg"> Acero </option>
      <option value="aluminio.jpg"> Aluminio </option>
      <option value="corcho.jpg"> Corcho </option>
      <option value="hierro.jpg"> Hierro </option>
      <option value="plomo.jpg"> Plomo </option>
      <option value="bronce.jpg"> Bronce </option>
      <option value="cobre.jpg"> Cobre </option>
      <option value="plata.jpg"> Plata </option>
      <option value="oro.jpg"> Oro </option>
      <option value="platino.jpg"> Platino </option>

      </select>

    </div>

  <div class="form-group col-md-4 col-lg-3 col-sm-4 col-xs-4">

    <label for="Objeto"> Objeto: </label>

      <select name="figuras" class="form-control" id="figuras" style="width:110px;">

    <option value="cilindro"> Cilindro </option>
    <option value="esfera"> Esfera </option>
    <option value="cubo"> Cubo </option>

  </select>

  <input type="button" class="btn btn-primary" id="botons" value=">>">

  </div>

  <div class="col-md-3 col-lg-1 col-sm-3 col-xs-3" id="dimension1">

    </div>

    <div class="col-md-3 col-lg-1 col-sm-3 col-xs-3" id="dimension2">

    </div>

    <div class="col-md-3 col-lg-1 col-sm-3 col-xs-3" id="dimension3">

    </div>

    <div class="col-md-3 col-lg-1 col-sm-3 col-xs-3" id="dimension4">

    </div>

    </div>

  </form>

  <script type="text/javascript" src="p5js/crear_ambiente.js"> </script>

</body>
</html>