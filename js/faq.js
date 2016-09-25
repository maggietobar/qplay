
var dt = document.querySelectorAll("dt");
var dd = document.querySelectorAll("dd");

for (var i = 0; i < dt.length; i++) {
    dd[i].style.display = "none";
    dt[i].addEventListener("click", function(e) { mostrar(e.target.getAttribute("data-target")) });
}

function mostrar (bot) {
 
    if (dd[bot].style.display == "none") {
        dd[bot].style.display = "block";
    } else {
      dd[bot].style.display = "none";
    }  
}
 
 