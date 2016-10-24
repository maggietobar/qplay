<?php
require_once("soporte.php");
session_start();

	if ($auth->estaLogueado()) {
		  $usuario = $auth->getUsuarioLogueado();
      $nombre = $usuario->getNombre();
      $apellido = $usuario->getApellido();
	} else {
	    header("location:index.php");
	}
  
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="name" content="content">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Abel|Cabin|Comfortaa|Exo|Farsan|Kaushan+Script|Poiret+One|Righteous|Russo+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Antic|Maven+Pro|Poppins|Ubuntu|Poiret+One" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/homex.css" type="text/css" />
    <link rel="stylesheet" href="css/usuario.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.css" type="text/css" />
    <title>QPlay Musica</title>
  </head>
  <body>

<!-- COMIENZO DEL NAVBAR Y SU CONTENIDO -->
<!-- Para hacerlo fluido quitar "navbar-fixed-top" y sacar padding del body en la hoja del estilo -->
<nav class="navbar navbar-inverse navbar-fixed-top userin">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand font-poiret logo" href="index.php">QPlay</a>
      <p class="navbar-text font-farsan">Bienvenido!</p>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $nombre." ".$apellido; ?>
              <img class="img-circle subuser" src="img/user.jpg" alt="user" width="40" height="40">
           <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="fa fa-users"></i> Amigos</a></li>
            <li><a href="#"><i class="fa fa-unlock-alt"></i> Privacidad</a></li>
            <li><a href="#"><i class="fa fa-gear"></i> Configuracion</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php"><i class="fa fa-sign-out"></i> Salir</a></li>
          </ul>
        </li>
        <!-- li><a class="btn btn-nav" href="logout.php">Salir <i class="fa fa-sign-out"></i></a></li -->
      </ul>
      <!-- form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="nav-search" placeholder="Buscar...">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form -->
    </div>
  </div>
</nav>
<!-- FIN DEL NAVBAR -->

<!-- COMIENZO DE LA FOTO -->
<div class="container-fluid usercover">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
       <img src="img/user.jpg" class="img-circle user center-block" alt="Usuario" width="230" height="230">
    </div>
  </div>
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
          <p class="username text-center"><?php echo $nombre." ".$apellido; ?></p>
      </div>
  </div>
</div>
<!-- FIN DE LA FOTO -->

<div class="container-fluid post">
  <div class="row">
      
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="panel panel-bandas">
            <div class="panel-heading">
                <h3 class="panel-title">Bandas que te gustan</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="" class="banda">Metalica</a></li>
                    <li><a href="" class="banda">Los Redondos</a></li>
                    <li><a href="" class="banda">Merlin</a></li>
                    <li><a href="" class="banda">Nirvana</a></li>
                    <li><a href="" class="banda">Patrik Swaiser</a></li>
                </ul>
            </div>
        </div>
        <div class="panel panel-bandas">
            <div class="panel-heading">
                <h3 class="panel-title">Instrumentos que tocas</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="" class="banda">Violin</a></li>
                    <li><a href="" class="banda">Bombo</a></li>
                    <li><a href="" class="banda">Trompetita</a></li>
                    <li><a href="" class="banda">Flautita</a></li>
                    <li><a href="" class="banda">Ding Dilin</a></li>
                </ul>
            </div>
        </div>        

    </div>
    
    <div class="col-md-6 col-sm-6 col-xs-12">
       <form class="form" id="form" action="" method="post">
          <div class="form-group">
            <input type="text" class="form-control" id="post" name="post" placeholder="Que cuentas hoy?" maxlength="55">
          </div>
            <!-- button type="submit" class="btn btn-login center-block">Ingresar</button -->
        </form>
        
        <div class="media posteo">
            <div class="media-left">
                <a href="#">
                <img class="media-object img-circle subuser" src="img/user.jpg" alt="Javier" width="64" height="64">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Javier Da Silva</h4>
                  El recital de a noche estuvo genial! Tenemos que repetir la salida!
            </div>
        </div>
        <div class="media posteo">
            <div class="media-left">
                <a href="#">
                <img class="media-object img-circle subuser" src="img/usero.jpg" alt="Jesy" width="64" height="64">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Jessica Piroshka</h4>
                  Tenemos que juntarnos para enborracharnos mas que el otro dia!
                  Conozco un lugar que tiene canilla libre
            </div>
        </div>
        <div class="media posteo">
            <div class="media-left">
                <a href="#">
                <img class="media-object img-circle subuser" src="img/user.jpg" alt="Carlos" width="64" height="64">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Carlos Rokero</h4>
                  Quien va al evento de mañana? Dicen que va a estar genial!
            </div>
        </div>

    </div>
    
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="thumbnail">
            <img src="img/img4.jpg" alt="Evento" width="242" height="200">
                <div class="caption">
                    <h3>Recital de Beatles</h3>
                    <p class="thumcoment">No te pierdas en esta oportunidad el gran recital que te partira
                    la cabeza en dos y no sabras mas de donde venis! Cerveza gratis
                    toda la noche y luego le daremos un ticket para el pancho bajon.
                    Participa con tu entrada por una bicicleta de payaso. Veni, te estamos
                    esperando</p>
                    <p>
                      <a href="#" class="btn btn-login" role="button">Participar</a> 
                      <a href="#" class="btn btn-login" role="button">Rechazar</a>
                    </p>
                </div>
        </div>
    </div>
    
    
  </div>
</div>

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
<script type="text/javascript" src="js/logval.js"></script>

</body>
</html>