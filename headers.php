<?php

function genHead ($tituloweb, $logo, $slogan) {
    
    $styleset = "";
    $fixed = "";
    
    switch ($tituloweb) {
        case "Qplay": $styleset = "animations";
                      $fixed = "navbar-fixed-top";
        break;
        case "Ingreso": $styleset = "login";
        break;
        case "Registro": $styleset = "register";
        break;
        case "Faqs": $styleset = "faq";
        break;
        case "Recuperar": $styleset = "login";
        break;
        case "Usuario": $styleset = "usuario";
        break;
        default: $styleset = "";
    }
    
    echo '
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Abel|Cabin|Comfortaa|Exo|Farsan|Kaushan+Script|Poiret+One|Righteous|Russo+One|Antic|Maven+Pro|Poppins|Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/homex.css" type="text/css" />
    <link rel="stylesheet" href="css/'.$styleset.'.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.css" type="text/css" />
    <title>'.$tituloweb.'</title>
</head>
<body>

<!-- COMIENZO DEL NAVBAR Y SU CONTENIDO -->
<!-- Para hacerlo fluido quitar "navbar-fixed-top" y sacar padding del body en la hoja del estilo -->

<nav class="navbar navbar-inverse '.$fixed.'">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand font-poiret logo" href="index.php">'.$logo.'</a>
      <p class="navbar-text font-farsan">'.$slogan.'</p>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a class="btn btn-nav font-ubuntu" href="login.php"><i class="fa fa-user-circle-o fa-lg"></i> Conectate </a></li>
        <li><a class="btn btn-nav font-ubuntu" href="register.php"><i class="fa fa-pencil-square-o fa-lg"></i> Registrate </a></li>
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
    
    ';
} // fin del index head





//---------------------------- FOOTERS ----------------------------------------

function genFooter ($tituloweb) { 
  
    $script = "";
    
    switch ($tituloweb) {
        case "Ingreso": $script = "logval";
        break;
        case "Registro": $script = "validacion_register";
        break;
        default: $styleset = "";
        break;
    }
  
    echo '
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
<script type="text/javascript" src="js/animation.js"></script>
<script type="text/javascript" src="js/'.$script.'.js"></script>
<script type="text/javascript" src="js/faq.js"></script>

</body>
</html>    
    ';
} // fin del user head

?>