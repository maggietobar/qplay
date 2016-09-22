// - El usuario desea que tras registrarse le figure un cartel que diga cuantos ya hay anotados.
//
// -Para aumentar la cantidad de usuarios en uno se debe hacer una llamada a https://sprint.digitalhouse.com/nuevoUsuario
//
// -Para consultar cuantos usuarios hay consultar en https://sprint.digitalhouse.com/getUsuarios

// Ambos métodos se llaman por GET. El primero no devuelve nada, el segundo devuelve un JSON. Por ahora este número se compartirá entre todos los trabajos de FSWD.
//Declaro las variables a usar.
var registrar, xmlhttp1, xmlhttp2, usuarios;


//Ejectuto código una vez que se cargó el HTML
window.onload = function(){
  //Guardo el botón enviar en una variable
  var registrar = document.getElementById('registrar');
// e de evento
  registrar.addEventListener('click',function(e){
    e.preventDefault();
    document.getElementById('errores').innerHTML = "";
    enviarDato();
  });

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
  }
};
