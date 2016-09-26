
var cont, contenido, botplus, hayErrores, form, mes, dia, anio, registrar, xmlhttp1, xmlhttp2, usuarios;

window.onload = function() {
  cont = 1;
  contenido = document.getElementById("bandas");
  botplus = document.getElementById("sumband");
  hayErrores = true;
  form = document.forms[0];
  botplus.addEventListener("click", agregar);
  form.addEventListener('submit', validarForm);

  dia = document.getElementById('dianac');
  mes = document.getElementById('mesnac');
  anio = document.getElementById('anionac');

  mes.addEventListener('change', validarDias);
  anio.addEventListener('change', validarDias);


 // ARRANCA AJAX

 //Guardo el botón enviar en una variable
 registrar = document.getElementById('registrar');
// e de evento
 registrar.addEventListener('click', ajax);

};

function validarForm (evt) {
    evt.preventDefault();
    console.log('apretó submit');
    if (!validaciones()) {
        console.log('No hubo errores');
        // form.submit();
    }
}

function calcularEdad(diaNac, mesNac, anioNac) {
    var hoy = new Date();
    var anioHoy = hoy.getFullYear();
    var mesHoy = hoy.getMonth();
    var diaHoy = hoy.getDate();
    var edad = anioHoy - anioNac;

    if (mesHoy < mesNac - 1) {
        edad--;
    }

    if (mesNac - 1 == mesHoy && diaHoy < diaNac) {
        edad--;
    }
    return edad;
}

function cargarError(id, error) {
    var parrafoError = document.getElementById(id);
    parrafoError.innerText = error;
}

function validaciones() {
    var form = document.forms[0];
    var hayErrores = false;
    var mailreg = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    var passreg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
    // Valido que el nombre no esté vacío.

    if (!form.elements.nombre.value) {
        cargarError('error-nombre', 'El nombre no puede estar vacío');
        hayErrores = true;
    } else {
        cargarError('error-nombre', '');
    }

    if (!form.elements.apellido.value) {
        cargarError('error-apellido', 'El apellido no puede estar vacío');
        hayErrores = true;
    } else {
        cargarError('error-apellido', '');
    }

    if (!form.elements.email.value) {
        cargarError('error-mail', 'El email no puede estar vacío');
        hayErrores = true;
    } else if (!mailreg.test(form.elements.email.value)) {
        cargarError('error-mail', 'El email no es válido');
        hayErrores = true;
    } else {
        cargarError('error-mail', '');
    }


    if (!form.elements.password.value) {
        cargarError('error-pass', 'La contraseña no puede estar vacía');
        hayErrores = true;
    } else if (!passreg.test(form.elements.password.value)) {
        cargarError('error-pass', 'La contraseña debe tener al menos una mayúscula, una minúscula y un número');
        hayErrores = true;
    } else {
        cargarError('error-pass', '');
    }

    if (!form.elements.password2.value) {
        cargarError('error-pass2', 'La confirmación de contraseña no puede estar vacía');
        hayErrores = true;
    } else if (form.elements.password.value != form.elements.password2.value) {
        cargarError('error-pass2', 'La contraseña y su confirmación son distintas');
        hayErrores = true;
    } else {
        cargarError('error-pass2', '');
    }

    if (calcularEdad(form.elements.dianac.value, form.elements.mesnac.value, form.elements.anionac.value) < 13) {
        cargarError('error-fecha', 'Hay que ser mayor de 13 años para poder crear una cuenta');
        hayErrores = true;
    } else {
        cargarError('error-fecha', '');
    }
    return hayErrores;
}

function agregar(evt) {
    evt.preventDefault();
    cont++;
    console.log('Apretó el más');

    var divcont = document.createElement("div");
    divcont.setAttribute("class", "col-xs-12 col-md-4");

    var input = document.createElement("input");
    input.setAttribute("class", "form-control");
    input.setAttribute("placeholder", "Banda " + cont);
    input.setAttribute("name", "banda" + cont);
    input.setAttribute("maxlength", "30");

    contenido.appendChild(divcont).appendChild(input);

    if (cont > 8) {
        botplus.style.display = "none";
    } else {
        botplus.style.display = "block";
    }
}

/*Bueno. Por default va a estar cargado con 31, entonces tengo varios escenarios posibles.
1) Que sea Febrero normal = 28 días.
2) Que sea Febrero bisiesto = 29 días.
3) Que sea Abril, Junio, Septiembre o Noviembre = 30 días.
4) Que tenga 31.

Todo piola, ameo, PEEEERO nada nos garantiza cuántos días va a tener cargados, porque si alguien puso febrero al toque y le carga 28, después para poner Diciembre, va a tener que agregar 3. SI SEÑOR, Y ENTONCES HAY VARIOS QUILOMBOS NUEVOS.

Sabemos dos cosas:

- Nunca va a tener más de 31
- Nunca va a tener menos de 28.

Maldita sea Homero, eres un genio. Años de estudiar informática para esto, bueno, no tan rápido, cerebrito. Esto sirve.
*/

function validarDias() {
    var esBisiesto = false;
    var count = 0;
    var opcionNueva = document.createElement("option");
// Aunque usted no lo crea, el 2000  fue bisiesto, porque uno cada 400 años toca, aunque los múltiplos de 100 no lo son. Entonces primero chequeo que sea múltiplo de 4 pero no a la vez de 100. Después me fijo, si es múltiplo de 400, le mando cumbia igual.

    if ((anio.value % 4 === 0 && anio.value % 100 !== 0) || anio.value % 400 === 0) {
        esBisiesto = true;
    }

// Si es febrero y no bisiesto, va a tener 28. O sea que solo puede tener más valores, porque si aprendimos algo es que no hay meses de menos de 28 días

    if (mes.value == '2' && !esBisiesto) {
        while (dia.length > 28) {
            dia.remove(dia.length - 1);
        }
    }

//Ahora, febrero bisiesto tiene un tema. En el select pueden haber 28, 29 (Complicado, pero sí), 30 o 31.

    if (mes.value == '2' && esBisiesto) {
      // Si tiene más de 29, voy borrando el último hasta que tenga 29.
        if (dia.length > 29) {
            while (dia.length > 29) {
                dia.remove(dia.length - 1);
            }
            // Si tiene menos de 29, solo puede tener 28, asique le agrego el 29 y yassstá.
        } else {
            opcionNueva.text = "29";
            dia.add(opcionNueva);
        }
    }

    //Acá se pone más interesante que la final del mundial. Los meses de 30 días. Podemos venir con 28, 29 o 31.

    if (mes.value == '4' || mes.value == '6' || mes.value == '9' || mes.value == '11'){
      //Si tiene más de 30, tiene 31 sí o sí, asique con borrar el último, está.
      if (dia.length > 30){
        dia.remove(dia.length-1);
      } else {
        /*Acá puede tener 28 o 29. Y eso es una cagada.
        Bueno. Si hacemos dia.length nos va a devolver la cantidad, que casualmente quiere decir que el último VALOR cargado, es ese número, pero está cargado en un índice que es dia.length-1*/
        count = dia.length;
        while (count <= 29){
          opcionNueva.text = dia.length + 1;
          dia.add(opcionNueva);
          count++;
        }
    }
  }

  //Este es facil, porque es cuestión de agregar hasta que haya 31.
  if (mes.value == '1' || mes.value == '3' || mes.value == '5' || mes.value == '7' || mes.value == '8' || mes.value == '10' || mes.value == '12'){
    count = dia.length;
    while (count < 31){
      opcionNueva.text = dia.length + 1;
      dia.add(opcionNueva);
      count++;
    }
  }
}

// FUNCIONES AJAX

function ajax (e){
  e.preventDefault();
  document.getElementById('errores').innerHTML = "";
  enviarDato();


}

 //Tengo que hacer dos llamados distintos a Ajax, uno para enviar el usuario nuevo y otro para llamar al número de usuarios.
 function enviarDato() {
   if(errores[0] === undefined){
     //LLamada Ajax
     var xmlhttp1 = new XMLHttpRequest();
     xmlhttp1.onreadystatechange = function(){
       if(xmlhttp1.readyState == 4 && xmlhttp1.status == 200){
         console.log("cargo bien");
         recibirNumero();
       }
     };

     xmlhttp1.open("GET", "https://sprint.digitalhouse.com/nuevoUsuario", true);
     xmlhttp1.send();

   }else{
     errores.forEach(function(error){
       document.getElementById('errores').innerHTML += error+",<br>";
     });
   }
 }

 function recibirNumero() {
   if(errores[0] === undefined){
     //LLamada Ajax
     var xmlhttp2 = new XMLHttpRequest();
     xmlhttp2.onreadystatechange = function(){
       if(xmlhttp2.readyState == 4 && xmlhttp2.status == 200){
         var usuarios = JSON.parse(xmlhttp2.responseText);
         console.log(usuarios);
         //Devuelve 2 Objetos {Errores y Contenido}
         console.log("Cargo 2 bien");
         usuarios = usuarios.cantidad;
         console.log(usuarios);

         mostrarUsuarios(usuarios);
       }
     };
   xmlhttp2.open("GET", "https://sprint.digitalhouse.com/getUsuarios", true);
   xmlhttp2.send();
   }else{
     errores.forEach(function(error){
       document.getElementById('errores').innerHTML += error+",<br>";
     });
   }
 }

 function mostrarUsuarios(usuarios) {
   document.forms[0].style.display = 'none';
   document.getElementById('numUsuarios').style.display = 'block';
   document.getElementById('h4numUsuarios').innerText += ' ' + usuarios + '.';
   window.scrollTo(0, 0);
 }
