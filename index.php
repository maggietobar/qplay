<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Abel|Cabin|Comfortaa|Exo|Farsan|Kaushan+Script|Poiret+One|Righteous|Russo+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Antic|Maven+Pro|Poppins|Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/homex.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.css" type="text/css" />
    <title>QPlay</title>
</head>
<body>

<!-- COMIENZO DEL NAVBAR Y SU CONTENIDO -->
<!-- Para hacerlo fluido quitar "navbar-fixed-top" y sacar padding del body en la hoja del estilo -->

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand font-kaushan logo" href="index.php">QPlay</a>
      <p class="navbar-text font-farsan">Tu musica!</p>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a class="btn btn-nav" href="login.php">Conectate <i class="fa fa-link"></i></a></li>
        <li><a class="btn btn-nav" href="register.php">Registrate <i class="fa fa-book"></i></a></li>
      </ul>
      <!--form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="nav-search" placeholder="Buscar...">
        </div>
        <!--button type="submit" class="btn btn-default">Submit</button>
      </form-->
    </div>
  </div>
</nav>

<!-- FIN DEL NAVBAR -->
<!-- COMIENZO DE JUMBOTRON -->

<div class="jumbotron text-center">
  <h1>Un lugar para ir juntos a la par</h1>
  <p>Compartí tus intereses y pasiones con tus almas gemelas en todo tiempo y lugar!</p>
</div>

<!-- FIN DEL JUMBOTRON -->
<!-- COMIENZO DEL SPOT -->

<div class="container-fluid">
  <div class="row gray">
    <div class="col-md-1 col-md-offset-2">
      <p class="text-center"><i class="fa fa-music fa-5" aria-hidden="true"></i></p>
    </div>
    <div class="col-md-5 col-md-offset-2">
      <h1 class="font-comfortaa">Disfruta de una buena compania</h1>
      <p class="font-maven">Conectate, juntate, comparti, desarolla y disfruta con tus almas gemelas en todo momento y lugar sin limites. Ahora con <span class="font-kaushan logspot">QPlay</span> podes encontrarte con todos aquellos que tienen los mismos gustos musicales que vos! No te lo pierdas!</p>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>

<!-- FIN DEL SPOT -->
<!-- COMIENZO DEL CONTENEDOR GRUPOS Y EVENTOS -->

<div class="container-fluid event">
  <div class="row image">
    <div class="col-sm-6">
      <h3 class="text-center">Grupos</h3>

      <!--div class="container-fluid">
        <div class="row">
          <div class="col-md-12 center-block"-->
            <img src="img/img1.jpg" alt="..." class="img-square" width="160" height="160">
            <img src="img/img2.jpg" alt="..." class="img-square" width="160" height="160">
            <img src="img/img3.jpg" alt="..." class="img-square" width="160" height="160">
          <!--/div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 center-block"-->
            <img src="img/img4.jpg" alt="..." class="img-square" width="160" height="160">
            <img src="img/img5.jpg" alt="..." class="img-square" width="160" height="160">
            <img src="img/img6.jpg" alt="..." class="img-square" width="160" height="160">
          <!--/div>
        </div>
      </div-->

    </div>
    <div class="col-sm-6">
      <h3 class="text-center">Eventos</h3>
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
     <div class="col-md-5 col-md-offset-1 col-sm-12">
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
     <div class="col-md-5 col-md-offset-1 col-sm-12">
       <img src="img/celView3.fw.png" class="img-responsive center-block" width="375" height="300">
     </div>
  </div>
</div>

<!-- FIN DEL CONTENEDOR CELULAR RESPONSIVE -->
<!-- COMIENZO DEL FOOTER -->

<div class="container-fluid footer">
  <div class="row">
    <div class="col-md-12">
      <ul class="list-inline text-center">
        <li><a href="login.php" class="footlink">Conectate</a></li>
        <li><p></p></li>
        <li><a href="register.php" class="footlink">Registrate</a></li>
        <li><p></p></li>
        <li><a href="faq.php" class="footlink">Preguntas (FAQs)</a></li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <p class="font-maven footp text-center">Diseñado y desarollado por Eugenio Vorontsov - Maggie Tobar - Sebastian Crosta</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <p class="text-center footlog">
        <i class="fa fa-html5"></i>
        <i class="fa fa-css3"></i>
        <i class="fa fa-github"></i>
        <i class="fa fa-git-square"></i>
        <i class="fa fa-font-awesome"></i>
        <i class="fa fa-stack-overflow"></i>
        <i class="fa fa-apple"></i>
        <i class="fa fa-android"></i>
      </p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="line center-block"></div>
    </div>
  </div>
    <div class="row">
    <div class="col-md-12">
      <p class="font-maven text-center footp">Copyright <i class="fa fa-copyright"></i> 2016 QPlay <i class="fa fa-registered"></i> All Rights Reserved.</p>
    </div>
  </div>
</div>

<!-- FIN DEL FOOTER -->
<!-- COMIENZO DE JAVASCRIPT PLUGINS -->

<script type="text/javascript" src="js/jquery-2.2.3.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/botcolaps.js"></script>
<script type="text/javascript" src="js/navanim.js"></script>

</body>
</html>
