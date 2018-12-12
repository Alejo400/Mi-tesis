var cont = 0;
var contvf = 0;
var contador = 3;
var contadorid = 30;
var formulario = document.getElementById("formulario");

function nuevoelemento(nuevo){

	document.getElementById("ri" + nuevo).disabled = false;

	if(nuevo2!=nuevo){ cont = 0;} // Si el valor enviado para reconocer a cual pregunta se le esta agregando una nueva opcion, contador valdra 0

	nuevo2 = nuevo; // Es quien guarda el valor de nuevo para saber en q preguntas estamos

	cont = cont + 1; // contador para saber si las opciones han pasado un maximo de 6 agregadas
	contvf = contvf + 1; // contador de input radio para verdadero y falso

	var vf = document.createElement("select");
	vf.setAttribute("id","vf" + nuevo + contvf);
	vf.setAttribute("name","vf" + nuevo + "[]");
	vf.setAttribute("class","form-control col-md-2");
	vf.setAttribute("style","width: 11%; margin-left: 3%; margin-right: 4%;");
	document.getElementById("nuevo" + nuevo).appendChild(vf);
	var agregarvf = document.getElementById("vf" + nuevo + contvf);
	var optionf = document.createElement("option"); var optionv = document.createElement("option");
	optionf.text = "F"; optionv.text = "V"; optionf.value = "F"; optionv.value = "V";
	agregarvf.add(optionf, agregarvf[0]); agregarvf.add(optionv, agregarvf[1]);

	// Agregar opcionnes

	opcion = document.createElement("input");
	opcion.setAttribute("type","text");
	opcion.setAttribute("name","opcion" + nuevo + "[]");
	opcion.setAttribute("class","form-control");
	opcion.setAttribute("style","width: 34%;");
	opcion.setAttribute("placeholder","Opcion:");
	document.getElementById("nuevo" + nuevo).appendChild(opcion);

	if(cont>=2 && nuevo2==nuevo){ // Si se han agregado mas de 6 opciones en la pregunta la cual se reconoce mediante el valor enviado por el parametro nuevo

		document.getElementById("di" + nuevo).disabled = true;

	}

}

function eliminarelemento(nuevo){

	cont = 0;
	document.getElementById("di" + nuevo).disabled = false;

	document.getElementById('nuevo' + nuevo).innerHTML='';
	document.getElementById("ri" + nuevo).disabled = true;

}

/*function preguntanueva(nuevo){

	cont = 0;
	document.getElementById("di" + nuevo).disabled = false;

	document.getElementById('nuevo' + nuevo).innerHTML='';
	document.getElementById("ri" + nuevo).disabled = true;

}*/

function preguntanueva(){

contadorid = contadorid + 1;
contador = contador + 1;

//Preguntas agregadas valor enviado de manera oculta

oculto = document.createElement("input");
oculto.setAttribute("type","hidden");
oculto.setAttribute("value","" + contador);
oculto.setAttribute("name","contador");
document.getElementById("preguntas").appendChild(oculto);

//Pregunta

pregunta = document.createElement("input");
pregunta.setAttribute("type","text");
pregunta.setAttribute("id","pregunta" + contador);
pregunta.setAttribute("name","pregunta" + contador);
pregunta.setAttribute("placeholder","Escriba su pregunta:");
document.getElementById("preguntas").appendChild(pregunta);

var salto = document.createElement("br");
document.getElementById("preguntas").appendChild(salto); //Saltos de linea
var salto = document.createElement("br");
document.getElementById("preguntas").appendChild(salto); //Saltos de linea

//Selector

for(i = 1; i<=4; i++){

	var vf = document.createElement("select");
	vf.setAttribute("id","vf" + contadorid + i);
	vf.setAttribute("name","vf" + contador + "[]");
	document.getElementById("preguntas").appendChild(vf);
	var agregarvf = document.getElementById("vf" + contadorid + i);
	var optionf = document.createElement("option"); var optionv = document.createElement("option");
	optionf.text = "F"; optionv.text = "V"; optionf.value = "F"; optionv.value = "V";
	agregarvf.add(optionf, agregarvf[0]); agregarvf.add(optionv, agregarvf[1]);

//Opciones

	opcion = document.createElement("input");
	opcion.setAttribute("type","text");
	opcion.setAttribute("id","opcion" + contadorid + i);
	opcion.setAttribute("name","opcion" + contador + "[]");
	opcion.setAttribute("placeholder","Opcion:");
	//document.getElementById("opcion" + contadorid + i).required;
	document.getElementById("preguntas").appendChild(opcion);

	var salto = document.createElement("br");
	document.getElementById("preguntas").appendChild(salto); //Saltos de linea

}

//Div

contenedor = document.createElement("div");
contenedor.setAttribute("id","nuevo" + contador);
document.getElementById("preguntas").appendChild(contenedor);

//Agregar

agregar = document.createElement("input");
agregar.setAttribute("type","button");
agregar.setAttribute("value","+");
agregar.setAttribute("id","di" + contador);
agregar.setAttribute("style","background-color: green; color: white;");
agregar.setAttribute("onclick","nuevoelemento(" + contador + ")");
document.getElementById("preguntas").appendChild(agregar);

//Eliminar

eliminar = document.createElement("input");
eliminar.setAttribute("type","button");
eliminar.setAttribute("value","-");
eliminar.setAttribute("id","ri" + contador);
eliminar.setAttribute("style","background-color: red; color: white;");
eliminar.setAttribute("onclick","eliminarelemento(" + contador + ")");
document.getElementById("preguntas").appendChild(eliminar);

var salto = document.createElement("br");
document.getElementById("preguntas").appendChild(salto); //Saltos de linea
var salto = document.createElement("br");
document.getElementById("preguntas").appendChild(salto); //Saltos de linea

}