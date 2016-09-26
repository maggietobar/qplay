
var cont, contenido, botplus, hayErrores, form;

window.onload = function() {
  cont = 1;
  contenido = document.getElementById("bandas");
  botplus = document.getElementById("sumband");
  hayErrores = true;
  form = document.forms[0];
  botplus.addEventListener("click", agregar);
  form.addEventListener('submit', validarForm);
};

function validarForm (evt) {
    evt.preventDefault();
    console.log('apretó submit');
    if (!validaciones()) {
        console.log('No hubo errores');
        form.submit();
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
