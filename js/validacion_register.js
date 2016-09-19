errores = [];

window.onLoad = function() {
    boton = document.querySelector('.btn-registrar');
    evento = boton.addEventListener('click', 'validaciones');
    evento.preventDefault();
};

function validaciones() {
    form = document.forms[0];

    // Valido que el nombre no esté vacío.

    if (!form.elements.nombre.value) {
        errores.push('El nombre no puede estar vacío');
    }

    if (!form.elements.apellido.value) {
        errores.push('El apellido no puede estar vacío');
    }
    if (!form.elements.email.value) {
        errores.push('El email no puede estar vacío');
    }
    if (!form.elements.email2.value) {
        errores.push('El campo para confirmar mail no puede estar vacío');
    }

    if ((form.elements.email.value && form.elements.email2.value) && form.elements.email.value != form.elements.email2.value) {
        errores.push("La confirmación y el campo email son distintos");
    }

    if (calcularEdad(form.elements.dianac.value, form.elements.mesnac.value, form.elements.anionac.value) < 13){
      errores.push('Hay que ser mayor de 13 años para poder crear una cuenta');
    }

    console.log(errores);

}

function calcularEdad(diaNac, mesNac, anioNac)
{
  hoy     = new Date();
  anioHoy = todayDate.getFullYear();
  mesHoy  = todayDate.getMonth();
  diaHoy  = todayDate.getDate();
  edad    = anioHoy - anioNac;

  if (mesHoy < mesNac - 1)
  {
    edad--;
  }

  if (mesNac - 1 == mesHoy && diaHoy < diaNac)
  {
    edad--;
  }
  return edad;
}
