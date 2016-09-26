window.onload = function () {

var form = document.getElementById("form");
var mail = document.getElementById("mail");
var pass = document.getElementById("pass");
var errinputs = document.getElementsByClassName("form-group");
var error = document.getElementsByClassName("errcript");


var validarForm = {

    vacio: "",
    minlargo: 8,
    mailreg: /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i,
    passreg: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/,

    validarMail: function () {
        if (mail.value != this.vacio) {
            if (this.mailreg.test(mail.value)) {
                errinputs[0].setAttribute("class","form-group");
                error[0].innerHTML = "";
                return true;
            } else {
                errinputs[0].setAttribute("class","form-group onerror");
                form.mail.focus();
                error[0].innerHTML = "<b>ERROR!</b> El Email ingresado no es valido.";
            }  // fin 5 if else
        } else {
            errinputs[0].setAttribute("class","form-group onerror");
            form.mail.focus();
            error[0].innerHTML = "<b>ERROR!</b> El campo email no puede estar vacio.";
        } // fin 6 if else
    }, // fin validarMail()

    validarPass: function () {
        if (pass.value != this.vacio) {
            if (pass.value.length >= this.minlargo) {
                if (this.passreg.test(pass.value)) {
                    if (pass.value != mail.value) {
                        errinputs[1].setAttribute("class","form-group");
                        error[1].innerHTML = "";
                        return true;
                    } else {
                        errinputs[1].setAttribute("class","form-group onerror");
                        form.pass.focus();
                        error[1].innerHTML = "<b>ERROR!</b> La contraseña no puede ser igual al mail.";
                    } // fin 1 if else
                } else {
                    errinputs[1].setAttribute("class","form-group onerror");
                    form.pass.focus();
                    error[1].innerHTML = "<b>ERROR!</b> La contraseña tiene que tener al menos una letra minúscula, una mayúscula y un numero.";
                }  // fin 2 if else
            } else {
                errinputs[1].setAttribute("class","form-group onerror");
                form.pass.focus();
                error[1].innerHTML = "<b>ERROR!</b> La Contraseña tiene que tener minimo 8 caracteres.";
            }  // fin 3 if else
        } else {
            errinputs[1].setAttribute("class","form-group onerror");
            form.pass.focus();
            error[1].innerHTML = "<b>ERROR!</b> El campo contraseña no puede estar vacio.";
        }  // fin 4 if else
    } // fin validarPass()

}; // fin validarFormulario

    form.onsubmit = function(evt) {
        evt.preventDefault();
        if (validarForm.validarMail() && validarForm.validarPass()) {
             form.submit();
        } else {
            validarForm.validarMail();
            validarForm.validarPass();
        }
    };

};  // fin window onload
