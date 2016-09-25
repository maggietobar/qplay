window.onload = function () {

    var cont = 1;
    var botplus = document.getElementById("sumband");
    var contenido = document.getElementById("bandas");
    botplus.addEventListener("click", agregar);
    
    function agregar (evt) {
       evt.preventDefault();
       cont++;

        var divcont = document.createElement("div");
            divcont.setAttribute("class", "col-xs-12 col-md-4");
                    
        var input = document.createElement("input");
            input.setAttribute("class", "form-control");
            input.setAttribute("id", "band");
            input.setAttribute("placeholder", "Banda "+cont);
            input.setAttribute("name", "banda"+cont);
            input.setAttribute("maxlength", "30");
            
        contenido.appendChild(divcont).appendChild(input);    
      
        if (cont > 8) {
            botplus.style.display = "none";
        } else {
            botplus.style.display = "block";
        }
    }    
}; // fin window onload