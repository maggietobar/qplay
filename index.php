<?php
require_once("soporte.php");

// Comienzo del Header archvos css y navbar
genHead("Qplay", "Qplay", "Tu Musica!");
?>

<!-- COMIENZO DE JUMBOTRON -->

<div class="jumbotron text-center">
  <h1 class="font-russo">Un lugar para ir juntos a la par</h1>
  <p class="font-exo">Compartí tus intereses y pasiones con tus almas gemelas en todo tiempo y lugar!</p>
</div>

<!-- FIN DEL JUMBOTRON -->
<!-- COMIENZO DEL SPOT -->

<div class="container-fluid">
  <div class="row gray">
    <div class="col-md-1 col-md-offset-2">
      <div id="object" class="tossing">
        <p class="text-center"><i class="fa fa-music fa-5" aria-hidden="true"></i></p>
      </div>
    </div>
    <div class="col-md-5 col-md-offset-2">
      <h1 class="font-comfortaa">Disfruta de una buena compania</h1>
      <p class="font-maven">Conectate, juntate, comparti, desarolla y disfruta con tus almas gemelas en todo momento y lugar sin limites. Ahora con <span class="font-poiret logspot">QPlay</span> podes encontrarte con todos aquellos que tienen los mismos gustos musicales que vos! No te lo pierdas!</p>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>

<!-- FIN DEL SPOT -->
<!-- COMIENZO DEL CONTENEDOR GRUPOS Y EVENTOS -->

<div class="container-fluid event">
  <div class="row image">
    <div class="col-sm-6">
      <h3 class="text-center font-comfortaa">Grupos</h3>

          <img src="img/img1.jpg" alt="..." class="img-square" width="160" height="160">
          <img src="img/img2.jpg" alt="..." class="img-square" width="160" height="160">
          <img src="img/img3.jpg" alt="..." class="img-square" width="160" height="160">

          <img src="img/img4.jpg" alt="..." class="img-square" width="160" height="160">
          <img src="img/img5.jpg" alt="..." class="img-square" width="160" height="160">
          <img src="img/img6.jpg" alt="..." class="img-square" width="160" height="160">

    </div>
    <div class="col-sm-6">
      <h3 class="text-center font-comfortaa">Eventos</h3>
       <div class="event-info">
          <h3 class="font-comfortaa">Guitarreada en Parque Nacional</h3>
          <i class="fa fa-share fa-lg"></i>
          <p class="font-maven">Si estas embolado en tu casa venite a conocernos</p>
       </div>
       <div class="event-info">
          <h3 class="font-comfortaa">Rock & Roll en Luna Park</h3>
          <i class="fa fa-share fa-lg"></i>
          <p class="font-maven">A puro rock en el Luna! no te lo pierdas</p>
       </div>
       <div class="event-info">
          <h3 class="font-comfortaa">Festival de Folklore</h3>
          <i class="fa fa-share fa-lg"></i>
          <p class="font-maven">Para todos los amantes que les gusta disfrutar</p>
       </div>
       <div class="event-info">
          <h3 class="font-comfortaa">Tu vida como un Electo</h3>
          <i class="fa fa-share fa-lg"></i>
          <p class="font-maven">Venite a disfrutar de los mejores DJs</p>
       </div>
    </div>
  </div>
</div>

<!-- FIN DEL CONTENEDOR GRUPOS Y EVENTOS -->
<!-- COMIENZO DEL CONTENEDOR CELULAR RESPONSIVE -->

<div class="container-fluid">
  <div class="row gray2">
     <div class="col-md-6 col-md-offset-1 col-sm-12">
        <h1 class="font-comfortaa">Conectate sin limites estes donde estes.</h1>
        <p class="font-maven">Ahora podes estar conectado con tu tablet o celular desde cualquier navegador mobile!
          <i class="fa fa-mobile fa-tel"></i>
        </p>
        <p class="text-center">
         <i class="fa fa-safari logpage"><span class="inlogo">Safari</span></i>
         <i class="fa fa-firefox logpage"><span class="inlogo">Firefox</span></i>
         <i class="fa fa-chrome logpage"><span class="inlogo">Chrome</span></i>
         <i class="fa fa-edge logpage"><span class="inlogo">Edge</span></i>
        </p>
     </div>
     <div class="col-md-5  col-sm-12">
       <img src="img/celView3.fw.png" class="img-responsive center-block cellview" width="375" height="300">
     </div>
  </div>
</div>

<!-- FIN DEL CONTENEDOR CELULAR RESPONSIVE -->

<!-- COMIENZO DEL FOOTER -->
<?php genFooter("Qplay"); ?> 
