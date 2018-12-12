// DOM

var mostrar = 0, imagen = "madera.jpg", dimension_mostrar = 0;

// FLUIDOS
 var fluido = "acetona";

// Variables del cubo
var cubox = 40, cuboy = 40, cuboz = 40;

var espesor = 0.01;

//CALCULOS, OPERACIONES ARISMETICAS, valores, imagenes

var iniciar, img, andar = 0, objeto = "cilindro", efecto = 0, contador = 0, aparecer = 0;

var pg /* valor restante */, pg2 /* calado */, pg3, pg4, pg5, pg6;

var gravedad = parseFloat("9.81"), v, calado, resto, masa, densidad = 600, kn = 0.001, volumen_cubo, area_cubo, alt, area_cilindro, volumen_cilindro, 
mostrar_v_m = 0, boton, reinicio = 1, distancia, pxcalado, calculo_cubo, agua_peso = 9.81;

var pesoes_material, pesoes_fluido, vx, vy, radio_interno, volumen_dostapas, peso_objeto;

//***************************************************************************************************************************

// Cubo
var p_cuboy = -120 * window.innerHeight / 638,
    p_cuboz = 20 * window.innerWidth / 1366,
//Cilindro    
    p_cilindroy = -120 * window.innerHeight / 638,
    p_cilindroz = 20 * window.innerWidth / 1366,
//Contenedor
    y_tanque = 110 * window.innerHeight / 638,
    tanquex = 350 *  window.innerWidth / 1366,
    tanquey = 120 *  window.innerHeight / 638,
    tanquez = tanquey / 4 + tanquex,
    y_ftanque = 117 * window.innerHeight / 638,
    ftanquex = 360 *  window.innerWidth / 1366,
    ftanquey = 117 *  window.innerHeight / 638,
    ftanquez = 350 * window.innerWidth / 1366;

function preload(){

  img = loadImage(imagen);

}

function setup(){

var ancho_pantalla = windowWidth / 100,
    largo_pantalla = windowHeight / 100,
    restar_alto = windowHeight * 5.5 / 100;

createCanvas(windowWidth - ancho_pantalla, windowHeight - largo_pantalla - restar_alto, WEBGL);
pg = createGraphics(256,100), pg2 = createGraphics(256,100), pg3 = createGraphics(500,300), pg4 = createGraphics(400,300), 
pg5 = createGraphics(400,300), pg6 = createGraphics(256,100);

  var resto_boton = windowHeight * 12/ 100; 

if(reinicio == 1){ //FUNCTION PARA RECARGAR SIMULADOR

boton = createButton("Reiniciar"); boton.position(windowWidth * 12 / 100,windowHeight - largo_pantalla - resto_boton); 
boton.style("padding","15px");
boton.style("padding-left","30px");
boton.style("background","url('imagenes/interact.png')"); boton.style("background-position","4px 14px"); boton.style("background-size","25px");
boton.style("background-repeat","no-repeat");
boton.style("background-color","#428bca"); boton.style("margin-bottom","0"); 
boton.style("display","inline-block"); boton.style("font-size","18px"); boton.style("font-weight","normal");
boton.style("line-height","1.42857143"); boton.style("text-align","center"); boton.style("white-space","nowrap");
boton.style("vertical-align","middle"); boton.style("border","1px solid transparent"); boton.style("border-radius","4px");
boton.style("color","#FFFFFF");

boton.mousePressed(reiniciar); 
} function reiniciar(){ javascript:location.reload(); }

if(reinicio == 1){ //FUNCTION PARA CERRAR SIMULADOR

botonc = createButton("Cerrar"); botonc.position(windowWidth * 3 / 100,windowHeight - largo_pantalla - resto_boton); 
botonc.mousePressed(cerrar); 
botonc.style("padding","15px");
botonc.style("padding-left","30px");
botonc.style("background","url('imagenes/close.png')"); botonc.style("background-position","4px 14px"); botonc.style("background-size","25px");
botonc.style("background-repeat","no-repeat");
botonc.style("background-color","#d9534f"); botonc.style("margin-bottom","0"); 
botonc.style("display","inline-block"); botonc.style("font-size","18px"); botonc.style("font-weight","normal");
botonc.style("line-height","1.42857143"); botonc.style("text-align","center"); botonc.style("white-space","nowrap");
botonc.style("vertical-align","middle"); botonc.style("border","1px solid transparent"); botonc.style("border-radius","4px");
botonc.style("color","#FFFFFF");


} function cerrar(){ window.close(); } 

//DOM
//fluidos
select_fluidos = createSelect();
select_fluidos.position(20,10);
select_fluidos.id("idfluidos");
select_fluidos.option("Fluido:");
select_fluidos.option("acetona"); select_fluidos.option("agua"); select_fluidos.option("alcoholetilico"); select_fluidos.option("alcoholmetilico"); 
select_fluidos.option("alcoholpropilico"); select_fluidos.option("amoniaco"); select_fluidos.option("benceno"); select_fluidos.option("tetacloruro"); 
select_fluidos.option("aceitericino"); select_fluidos.option("etilenglicol"); select_fluidos.option("gasolina"); select_fluidos.option("glicerina"); 
select_fluidos.option("queroseno"); select_fluidos.option("aceitelinaza"); select_fluidos.option("propano"); select_fluidos.option("trementina"); 
select_fluidos.option("aceitepesado"); select_fluidos.option("aceite"); select_fluidos.option("mercurio");
select_fluidos.changed(mifluido);

//Material
select_material = createSelect();
select_material.position(150,10);
select_material.id("idmaterial");
select_material.option("Material:"); select_material.option("madera.jpg"); select_material.option("oro2.jpg"); select_material.option("acero2.jpg");
select_material.changed(mimaterial);

//figura
select_objeto = createSelect();
select_objeto.position(260,10);
select_objeto.id("idfigura");
select_objeto.option("Figuras:"); select_objeto.option("cilindro");
select_objeto.changed(mifigura);

//Espesor
select_espesor = createSelect();
select_espesor.position(340,10);
select_espesor.id("idespesor");
select_espesor.option("Espesor:");
select_espesor.option(0.01); select_espesor.option(0.02); select_espesor.option(0.03); select_espesor.option(0.04);
select_espesor.changed(miespesor);

//Dimensiones
select_cilx = createSelect();
select_cilx.position(440,10);
select_cilx.id("idradio");
select_cilx.option("Radio:"); select_cilx.option(10); select_cilx.option(20); select_cilx.option(30);
select_cilx.changed(dimension);

select_cily = createSelect();
select_cily.option("Alto:");
select_cily.id("idalto");
select_cily.position(520,10);
select_cily.option(30); select_cily.option(50); select_cily.option(80); select_cily.option(100);
select_cily.changed(dimension);

//iniciar

botones = createButton('Iniciar'); 
botones.position(620,10);
botones.style("background-color","#d9534f"); botones.style("padding","2px 12px"); botones.style("margin-bottom","0"); 
botones.style("display","inline-block"); botones.style("font-size","14px"); botones.style("font-weight","normal");
botones.style("line-height","1.42857143"); botones.style("text-align","center"); botones.style("white-space","nowrap");
botones.style("vertical-align","middle"); botones.style("border","1px solid transparent"); botones.style("border-radius","4px");
botones.style("color","#FFFFFF");
botones.mousePressed(caer);

}

function mifluido()   { fluido = select_fluidos.value(); } // TOMAR VALOR DEL SELECTOR DE FLUIDOS

function mimaterial()   { imagen = select_material.value(); img = loadImage(imagen)} //TOMAR VALOR DEL SELECTOR DE MATERIAL

function mifigura()   { objeto = select_objeto.value(); } //TOMAR VALOR DEL SELECTOR DE OBJETO

function dimension()   { cilindrox = select_cilx.value(); cilindroy = select_cily.value(); } // TOMAR VALOR DE LAS DIMENSIONES DEL CILINDRO

function miespesor() { espesor = select_espesor.value(); } //TOMAR VALOR DEL ESPESOR

var cilindrox = 20 * window.innerWidth / 1366, cilindroy = 80 * window.innerHeight / 638;

function caer() { iniciar = 1; mostrar = 1; //SI SE EJECUTA EL INICIAR PARA Q EL OBJETO CAIGA ENTONCES DAMOS LOS VALORES PARA Q ARRANQUE Y DESABILITAMOS LOS BOTONES
flute = document.getElementById("idfluidos").disabled = true; flute2 = document.getElementById("idmaterial").disabled = true;
flute3 = document.getElementById("idfigura").disabled = true; flute4 = document.getElementById("idespesor").disabled = true; 
flute5 = document.getElementById("idalto").disabled = true; flute6 = document.getElementById("idradio").disabled = true; }

function draw(){

  //RESPONSIVIDAD EN CADA UNO DE LOS ELEMENTOS DEL SIMULADOR

var  alto_pasto = 100 * windowHeight / 638, y_pasto = 34 * windowHeight / 638,
     alto_tierra = 250 * windowHeight / 638, y_tierra = 180 * windowHeight / 638,
     pg6_y = 280 * windowHeight / 638, pg6x = 160 * windowWidth / 1366, pg6y = 40 * windowHeight / 638,
     pg3_ftx = -530 * windowWidth / 1366, pg3_fty = -213 * windowHeight / 638, pg3_fpx = 230 * windowWidth / 1366, pg3_fpy = 205 * windowHeight / 638,
     pg4_mtx = -530 * windowWidth / 1366, pg4_mty = -130 * windowHeight / 638, pg4_mpx = 210 * windowWidth / 1366, pg4_mpy = 150 * windowHeight / 638,
     pg6_ttx = 350 * windowWidth / 1366, pg6_tty = 75 * windowHeight / 638, pg6_tpx = 160 * windowWidth / 1366, pg6_tpy = 40 * windowHeight / 638,
     pg6_t2tx = 330 * windowWidth / 1366, pg6_t2ty = 260 * windowHeight / 638, pg6_t2px = 160 * windowWidth / 1366, pg6_t2py = 40 * windowHeight / 638,
     p5_dtx = 550 * windowWidth / 1366, p5_dty = -240 * windowHeight / 638, p5_dpx = 200 * windowWidth / 1366, p5_dpy = 130 * windowHeight / 638,
     p5_otx = -544 * windowWidth / 1366, p5_oty = -72 * windowHeight / 638, p5_opx = 180 * windowWidth / 1366, p5_opy = 110 * windowHeight / 638,
     pg2_ctx = -370 * windowWidth / 1366, pg2_cty = 170 * windowHeight / 638, pg6_c2tx = -480 * windowWidth / 1366, pg2_cpx = 100 * windowWidth / 1366,
     pg2_cpy = 25 * windowHeight / 638, pg2_rty = 130 * windowHeight / 638, p5_internox = 550 * windowWidth / 1366, p5_internoy = -130 * windowHeight / 638;

var tx_barra = 40 * windowWidth / 1366;

if (imagen == "madera.jpg"){ densidad = 600; } if (imagen == "oro2.jpg"){ densidad = 19300; } if (imagen == "acero2.jpg"){ densidad = 7800; }

//********************************************************************* FLUIDOS COLOR CAMBIO *********************************************************

  if (fluido == "agua")

{ liquido = { uno: 51, dos: 155, tres: 223, cuatro: 130, gravedad_es: parseFloat("1.030"), peso_es: parseFloat("10.10") }; }

  if (fluido == "aceite")

{ liquido = { uno: 130, dos: 148, tres: 53, cuatro: 80, gravedad_es: parseFloat("0.852"), peso_es: parseFloat("8.36") }; }

  if (fluido == "aceitepesado") 

{ liquido = { uno: 130, dos: 148, tres: 53, cuatro: 130, gravedad_es: parseFloat("0.906"), peso_es: parseFloat("8.89") }; }

  if (fluido == "mercurio")

{ liquido = { uno: 033, dos: 033, tres: 033, cuatro: 50, gravedad_es: parseFloat("13.54"), peso_es: parseFloat("132.8") }; }

  if (fluido == "acetona")

{ liquido = { uno: 250, dos: 244, tres: 227, cuatro: 80, gravedad_es: parseFloat("0.787"), peso_es: parseFloat("7.72") }; }

  if (fluido == "alcoholetilico")

{ liquido = { uno: 256, dos: 256, tres: 256, cuatro: 60, gravedad_es: parseFloat("0.787"), peso_es: parseFloat("7.72") }; }

  if (fluido == "alcoholmetilico")

{ liquido = { uno: 256, dos: 256, tres: 256, cuatro: 60, gravedad_es: parseFloat("0.789"), peso_es: parseFloat("7.74") }; }

  if (fluido == "alcoholpropilico")

{ liquido = { uno: 256, dos: 256, tres: 256, cuatro: 60, gravedad_es: parseFloat("0.802"), peso_es: parseFloat("7.87") }; }

   if (fluido == "amoniaco")

{ liquido = { uno: 250, dos: 244, tres: 227, cuatro: 60, gravedad_es: parseFloat("0.826"), peso_es: parseFloat("8.10")}; }

   if (fluido == "benceno")

{ liquido = { uno: 214, dos: 174, tres: 001, cuatro: 60, gravedad_es: parseFloat("0.876"), peso_es: parseFloat("8.59") }; }

  if (fluido == "tetacloruro") 

{ liquido = { uno: 250, dos: 244, tres: 227, cuatro: 80, gravedad_es: parseFloat("1.590"), peso_es: parseFloat("15.60") }; }

   if (fluido == "aceitericino")

{ liquido = { uno: 137, dos: 172, tres: 118, cuatro: 100, gravedad_es: parseFloat("0.960"), peso_es: parseFloat("9.42") }; }

  if (fluido == "etilenglicol")

{ liquido = { uno: 137, dos: 172, tres: 118, cuatro: 120, gravedad_es: parseFloat("1.100"), peso_es: parseFloat("10.79") }; }

  if (fluido == "gasolina")

{ liquido = { uno: 243, dos: 218, tres: 011, cuatro: 80, gravedad_es: parseFloat("0.68"), peso_es: parseFloat("6.67") }; }

   if (fluido == "glicerina")

{ liquido = { uno: 250, dos: 244, tres: 227, cuatro: 60, gravedad_es: parseFloat("1.258"), peso_es: parseFloat("12.34") }; }

   if (fluido == "queroseno")

{ liquido = { uno: 243, dos: 218, tres: 011, cuatro: 60, gravedad_es: parseFloat("0.823"), peso_es: parseFloat("8.07") }; }

  if (fluido == "aceitelinaza")

{ liquido = { uno: 243, dos: 218, tres: 011, cuatro: 80, gravedad_es: parseFloat("0.930"), peso_es: parseFloat("9.12") }; }

  if (fluido == "propano")

{ liquido = { uno: 250, dos: 244, tres: 227, cuatro: 60, gravedad_es: parseFloat("0.495"), peso_es: parseFloat("4.86") }; }

   if (fluido == "trementina")

{ liquido = { uno: 189, dos: 236, tres: 182, cuatro: 60, gravedad_es: parseFloat("0.870"), peso_es: parseFloat("8.53") }; }


    //********************************************************************************************************************

background("#BEFFF7");

//Fluidos
push();
translate(pg3_ftx,pg3_fty,0);
pg3.textSize(26);
pg3.background("#BEFFF7");
pg3.text("Fluidos: ", 21, 80);
pg3.text("Gravedad Específica: " + liquido.gravedad_es, 21, 120);
pg3.text("Peso Esp. del Agua: " + agua_peso + " Kn/m^3", 21, 160);
    texture(pg3);
    plane(pg3_fpx,pg3_fpy);

pop();

//Material del objeto
push();

translate(pg4_mtx,pg4_mty,0);
pg4.textSize(27);
pg4.background("#BEFFF7");
pg4.text("Material del Objeto: ", 5, 80);
pg4.text("Densidad: " + densidad + " kg/m^3", 5, 120);
    texture(pg4);
    plane(pg4_mpx,pg4_mpy);

pop();

//pasto
push();
translate(0,y_pasto,0);
stroke("#060606");
fill("#029C0F");
plane(windowWidth,alto_pasto);
pop();

//tierra
push();
translate(0,y_tierra,0);
stroke("#060606");
fill("#754518");
plane(windowWidth,alto_tierra);
pop();

//Metros del tanque

push();
translate(pg6_ttx,pg6_tty,0);
pg6.textSize(30);
pg6.background("#754518");
pg6.text("- 0 metros", 15, 80);
    texture(pg6);
    plane(pg6_tpx,pg6_tpy);
pop();

push();
translate(pg6_t2tx,pg6_t2ty,0);
pg6.textSize(30);
pg6.background("#754518");
pg6.text("- 110 metros", 65, 80);
    texture(pg6);
    plane(pg6_t2px,pg6_t2py);
pop();

push();
translate(0,pg6_y,0);
pg6.textSize(30);
pg6.background("#754518");
pg6.text("Ancho: 310 metros", 0, 80);
    texture(pg6);
    plane(pg6x,pg6y);
pop();

//contenedor del tanque

push();
fill(41,41,41,250);
translate(0,y_tanque,0);
rotateX(frameCount * 0);
rotateY(frameCount * 0);
rotateZ(frameCount * 0);
box(tanquex,tanquey,tanquez);

pop();

//****************************************************** FIGURAS ***************************************************************

//****************************************************** CILINDRO ***************************************************************

var cilindror = cilindrox * window.innerWidth / 1366, cilindroh = cilindroy * window.innerHeight / 638;

if (objeto == "cilindro")

{

push();
translate(0,p_cilindroy,p_cilindroz);
stroke("#060606");
texture(img);
rotateX(frameCount * 0);
rotateY(frameCount * 0.005);
rotateZ(frameCount * 0);
cylinder(cilindror,cilindroh);

vx = cilindrox / 10;
v = cilindroy / 10;

// Peso especifico del material y del fluido

pesoes_material = densidad * agua_peso / 1000;

pesoes_fluido = liquido.gravedad_es * agua_peso;

//Radio interno 
radio_interno = vx - espesor;
//Volumen cilindro hueco, el del macizo es: volumen_cilindro = 3.14 * vx * vx * v;
volumen_cilindro = 3.14 * v * (vx * vx - radio_interno * radio_interno);
//Volumen de las dos tapas
volumen_dostapas = 2 * 3.14 * vx * vx * espesor;
//Area externa del cilindro
area_cilindro =  3.14 * vx * vx;
//Peso del objeto
peso_objeto = pesoes_material * (volumen_cilindro + volumen_dostapas);

calado = peso_objeto / (area_cilindro * pesoes_fluido); //CALCULO DE CALADO

resto = v - calado; //CALCULO DE RESTO

if(iniciar == 1){

  andar = 1;
  /*var cyradio = document.getElementById("cx").disabled = true;
  var cyh = document.getElementById("cy").disabled = true;*/
  mostrar_v_m = 1;

}

var pantalla_resto = 10 * windowHeight / 638, tcubo_pxr = resto * pantalla_resto; //POSICION BARRA DE VALOR RESTANTE
    pantalla_calado = 10 * windowHeight / 638, tcubo_pxc = calado * pantalla_calado; //POSICION DE BARRA DE CALADO

if(calado < v) //SI EL CALADO O DISTANCIA SUMERGIDA ES MENOR AL VOLUMEN DEL OBJETO

{

  //CALCULAR POSICION DONDE SE UBICARA EL OBJETO Y LAS BARRAS DE INDICADOR DE CALADO Y RESTO

distancia1 = y_tanque - tanquey / 2;

distancia = cilindroy / 2;

pxcalado = calado * pantalla_calado;

pxrestante = resto * pantalla_resto;

pxcalado2 = calado * pantalla_calado;

distancia_calculos = y_ftanque - ftanquey / 2;

if(p_cilindroy = distancia1 - distancia + tcubo_pxc + 5){

calculo_resto = distancia_calculos - pxrestante / 2;

calculo_barra = distancia_calculos + pxcalado2 / 2;

//DETENER CAIDA

  andar = 0;
  aparecer = 1;
  iniciar = 0;

}

}

else if (calado > v) //SI EL CALADO O VOLUMEN SUMERGIDO ES MAYOR AL VOLUMEN DEL OBJETO

{

  p_cilindroy = p_cilindroy + andar; //HACER QUE EL OBJETO CAIGA

  //CALCULAR POSICION DONDE SE UBICARA EL OBJETO Y LAS BARRAS DE INDICADOR DE CALADO Y RESTO

  distancia = cilindroy / 2;

  valor_barra = cilindroy / 2;

  distancia2 = y_ftanque + ftanquey - distancia;

  if(p_cilindroy > distancia2)

  {

    //DETENER CAIDA

    iniciar = 0;
    andar = 0;
    aparecer = 2;

  }  

}

pop();

}

//****************************************************** CUBO ***************************************************************

var tcubo = cubox * window.innerWidth / 1366;

if (objeto == "cubo")

{

push();
translate(0,p_cuboy,p_cuboz);
stroke("#060606");
texture(img);
rotateX(frameCount * 0);
rotateY(frameCount * 0);
rotateZ(frameCount * 0);
box(tcubo);

if(cubox == 20) { v = 2; area_cubo = v*v; volumen_cubo = v*v*v; }

if(cubox == 30) { v = 3; area_cubo = v*v; volumen_cubo = v*v*v; }

if(cubox == 40) { v = 4; area_cubo = v*v; volumen_cubo = v*v*v; }

if(cubox == 50) { v = 5; area_cubo = v*v; volumen_cubo = v*v*v; }

if(cubox == 60) { v = 6; area_cubo = v*v; volumen_cubo = v*v*v; }

masa = densidad * volumen_cubo;

calado = (masa * gravedad * kn) / (liquido.gravedad_es * agua_peso * area_cubo);

resto = v - calado;

//******************************************************************************

if(iniciar == 1){

  andar = 1;
  /*var cuboxd = document.getElementById("largo").disabled = true;
  var cuboyd = document.getElementById("alto").disabled = true;
  var cubozd = document.getElementById("ancho").disabled = true;*/
  mostrar_v_m = 1;

}

p_cuboy = p_cuboy + andar;

var pantalla_calado = 10 * windowHeight / 638, tcubo_pxc = calado * pantalla_calado,
    pantalla_resto = 10 * windowHeight / 638, tcubo_pxr = resto * pantalla_resto;

pxcalado = calado * pantalla_calado;

pxrestante = resto * pantalla_resto;

if(calado < v)

{

distancia1 = y_tanque - tanquey / 2;
distancia = tcubo / 2;

distancia_calculos = y_ftanque - ftanquey / 2;

calculo_resto = distancia_calculos - pxrestante / 2;

calculo_barra = distancia_calculos + pxcalado / 2;

calculo_cubo = distancia1 - distancia + tcubo_pxc;

if(p_cuboy > calculo_cubo){

  andar = 0;
  iniciar = 0;
  aparecer = 1;

}

}

else if (calado > v)

{

  valor_barra = tcubo / 2;

  distancia = tcubo / 2;

  distancia2 = y_ftanque + ftanquey - distancia;

    if(p_cuboy > distancia2)

  {

    iniciar = 0;
    andar = 0;
    aparecer = 2;

  }

}

//*************************************************************************************

pop();

}

if(mostrar == 1){
//Objeto
push();

translate(p5_otx,p5_oty,0);
pg5.textSize(33);
pg5.background("#BEFFF7");
pg5.text("Objeto: ", 5, 80);

if(objeto == "cubo"){

pg5.text("Volumen: " + volumen_cubo.toFixed(4) + " m^3", 5, 130);

}

else if(objeto == "cilindro"){

pg5.text("Volumen: " + volumen_cilindro.toFixed(4) + " m^3", 5, 130);

}

pg5.text("Peso del Objeto: " + peso_objeto.toFixed(2) + " kg", 5, 180);
    texture(pg5);
    plane(p5_opx,p5_opy);

pop();

}

//Dimensiones
push();

translate(p5_dtx,p5_dty,0);
pg5.textSize(28);
pg5.background("#BEFFF7");
pg5.text("Dimensiones: ", 5, 80);

if(objeto == "cubo"){

pg5.text("Alto: " + v + " m", 5, 130);
pg5.text("Ancho: " + v + " m", 5, 180);
pg5.text("Largo: " + v + " m", 5, 230);

}

else if(objeto == "cilindro"){

pg5.text("Radio: " + cilindrox / 10 + " m", 5, 130);
pg5.text("Altura: " + v + " m", 5, 180);
pg5.text("Espesor: " + espesor + " m", 5, 230);

}

    texture(pg5);
    plane(p5_dpx,p5_dpy);

pop();

//Peso especifico del material, liquido y radio interno  

push();

translate(p5_internox,p5_internoy,0);
pg5.textSize(28);
pg5.background("#BEFFF7");
pg5.text("Nuevos valores: ", 5, 80);

if(objeto == "cilindro"){

pg5.text("Radio Interno: " + radio_interno + " m", 5, 130);
pg5.text("PesoEsp.Fluido: " + pesoes_fluido.toFixed(2) + "kn/m^3", 5, 180);
pg5.text("PesoEsp.Material: " + pesoes_material.toFixed(2) + "kn/m^3", 5, 230);
pg5.text("Volumen de 2Tapas: " + volumen_dostapas.toFixed(2) + "m^3", 5, 280);

}

/*if(objeto == "cubo"){ pg5.text("Alto: " + v + " m", 5, 130); pg5.text("Ancho: " + v + " m", 5, 180); pg5.text("Largo: " + v + " m", 5, 230); }*/

    texture(pg5);
    plane(p5_dpx,p5_dpy);

pop();

//**********************************************************************************************************************************

//tanque
push();
stroke("#060606");
fill(liquido.uno, liquido.dos, liquido.tres, liquido.cuatro);
translate(0,y_ftanque,0);
rotateX(frameCount * 0);
rotateY(frameCount * 0);
rotateZ(frameCount * 0);
box(ftanquex,ftanquey,ftanquez);

pop();

if(aparecer == 1){

var barra_x = 10 * windowWidth / 1366;

//Indicador de calado barra

push();
translate(tx_barra,calculo_barra,0);
fill("#D90000");
plane(barra_x,tcubo_pxc);
pop();

//Indicador de valor restante barra

push();
translate(tx_barra,calculo_resto,0);
fill("#0019D9");
plane(barra_x,tcubo_pxr);
pop();

//INDICADOR DE CALADO

push();
translate(pg2_ctx,pg2_cty,0);
pg2.textSize(57);
pg2.background("#FFFFFF");
pg2.fill("#FF0000");
pg2.text(calado.toFixed(3) + "m", 15, 80);
    texture(pg2);
    plane(pg2_cpx,pg2_cpy);
pop();

//Calado

push();
translate(pg6_c2tx,pg2_cty,0);
pg6.textSize(60);
pg6.background("#FF0000");
pg6.text("Calado", 15, 80);
    texture(pg6);
    plane(pg2_cpx,pg2_cpy);
pop();

// INDICADOR DE VALOR RESTANTE

push();
translate(pg2_ctx, pg2_rty,0);
pg.textSize(57);
pg.background("#FFFFFF");
pg.fill("#1A00FF");
pg.text(resto.toFixed(3) + "m", 15, 80);
    texture(pg);
    plane(pg2_cpx,pg2_cpy);
pop();

//Resto

push();
translate(pg6_c2tx,pg2_rty,0);
pg6.textSize(60);
pg6.background("#0019D9");
pg6.text("Resto", 15, 80);
    texture(pg6);
    plane(pg2_cpx,pg2_cpy);
pop();

}

else if(aparecer == 2){

//INDICADOR DE CALADO

push();
translate(pg2_ctx,pg2_cty,0);
pg2.textSize(55);
pg2.background("#FFFFFF");
pg2.fill("#FF0000");
pg2.text(calado.toFixed(2) + "m", 15, 80);
    texture(pg2);
    plane(pg2_cpx,pg2_cpy);
pop();

//Calado

push();
translate(pg6_c2tx,pg2_cty,0);
pg6.textSize(60);
pg6.background("#FF0000");
pg6.text("Calado", 15, 80);
    texture(pg6);
    plane(pg2_cpx,pg2_cpy);
pop();

// INDICADOR DE VALOR RESTANTE

push();
translate(pg2_ctx, pg2_rty,0);
pg.textSize(55);
pg.background("#FFFFFF");
pg.fill("#1A00FF");
pg.text(resto.toFixed(2) + "m", 20, 80);
    texture(pg);
    plane(pg2_cpx,pg2_cpy);
pop();

//Resto

push();
translate(pg6_c2tx,pg2_rty,0);
pg6.textSize(60);
pg6.background("#0019D9");
pg6.text("Resto", 15, 80);
    texture(pg6);
    plane(pg2_cpx,pg2_cpy);
pop();

}

}