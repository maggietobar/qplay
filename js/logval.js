window.onload = function () {

var form = document.getElementById("form");    
var mail = document.getElementById("mail");
var pass = document.getElementById("pass");
var errinputs = document.getElementsByClassName("form-group");
var error = document.getElementsByClassName("errcript");


var validarFormulario = {
    
    vacio: "",
    minlargo: 8,
    mailreg: /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i,
    passreg: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/,
    
    validar: function () {
        
    if (mail.value != this.vacio) { 
        if (this.mailreg.test(mail.value)) {
            errinputs[0].setAttribute("class","form-group");
            error[0].innerHTML = "";
            if (pass.value != this.vacio) {
                if (pass.value.length >= this.minlargo) {
                    if (this.passreg.test(pass.value)) {
                        if (pass.value != mail.value) {
                            errinputs[1].setAttribute("class","form-group");
                            error[1].innerHTML = "";
                            form.submit();
                        } else {
                            errinputs[1].setAttribute("class","form-group onerror");
                            form.pass.focus();
                            error[1].innerHTML = "<b>ERROR!</b> La contraseña no puede ser igual al mail.";
                        } // fin 1 if else
                    } else { 
                        errinputs[1].setAttribute("class","form-group onerror");
                        form.pass.focus();
                        error[1].innerHTML = "<b>ERROR!</b> La contraseña tiene que tener al menos una letra chica, una grande y un numero.";
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
        
    } // fin validar()
    
} // fin validarFormulario
    
    form.onsubmit = function(evt) {
        evt.preventDefault();
        return validarFormulario.validar();
    }
    
}  // fin window onload   