<?php
require_once("soporte.php");

    if(!$_SESSION) {
        session_start();
    }

	if ($auth->estaLogueado()) {
        $usuario = $auth->getUsuarioLogueado();

      $nombre = $usuario->getNombre();
      $apellido = $usuario->getApellido();
      $bandas = $usuario->getBandas();
      $instrum = $usuario->getInst();

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
    <link rel="stylesheet" href="css/file-input.css" type="text/css" />
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="img-circle subuser" src="img/user.jpg" alt="user" width="40" height="40">
            <?php echo "  ".$nombre." ".$apellido; ?>
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
      <div class="col-md-3 col-xs-12">
        
        <div class="botsub">  
          <input type="file" name="file-1" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
          <label for="file-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
          <span class="iborrainputfile">Subir Avatar</span>
          </label>   
        </div>    
           
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
              <?php foreach ($bandas as $banda) { ?>
                <ul>
                  <?php echo "<li><a class=banda>".$banda."</a></li>";  ?>
                </ul>
              <?php  } ?>  
            </div>
        </div>
        
        <div class="panel panel-bandas">
            <div class="panel-heading">
                <h3 class="panel-title">Instrumentos que tocas</h3>
            </div>
            <div class="panel-body">
              <?php foreach ($instrum as $inst => $nivel) { ?>
                <ul>
                  <?php echo "<li><a class=banda>".$inst." (".$nivel.")"."</a></li>";  ?>
                </ul>
              <?php  } ?>  
            </div>
        </div>

    </div>
    
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="container">
        <div class="row tupost">
          <div class="col-md-6 col-sm-12">
            <form class="form" id="form" action="" method="post">
              <div class="input-group">
                <input type="text" class="form-control" id="post" name="post" placeholder="Que cuentas hoy?" maxlength="55">
                <span class="input-group-btn">
                  <button class="btn btn-post" type="button"><i class="fa fa-play-circle-o fa-2x"></i></button>
                </span>
              </div>
                <!-- button type="submit" class="btn btn-login center-block">Ingresar</button -->
            </form>
          </div>
        </div>
        <div class="row postcont">
          <div class="col-md-6 col-sm-12">
            
            <div class="media posteo">
              <div class="media-left">
                <a href="#">
                  <img class="media-object img-circle subuser" src="img/user.jpg" alt="Javier" width="64" height="64">
                </a>
              </div>
              <div class="media-body">
                <h3 class="media-heading">Javier Da Silva</h3>
                 <p class="postcoment">Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                 sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                 magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                 vel illum dolore eu feugiat nulla facilisis at vero eros et
                 </p> 
              </div>
              <div class="">
                <form class="form" id="posteo" action="" method="post">
                  <div class="input-group postcom">
                    <input type="text" class="form-control" id="post" name="postcom" placeholder="Comentario...">
                      <span class="input-group-btn">
                        <button class="btn btn-post" type="button"><i class="fa fa-play-circle-o fa-2x"></i></button>
                      </span>
                  </div>
                </form> 
              </div>
            </div>
            
          </div>
        </div>
        <div class="row postcont">
          <div class="col-md-6 col-sm-12">
            
            <div class="media posteo">
              <div class="media-left">
                <a href="#">
                  <img class="media-object img-circle subuser" src="img/user.jpg" alt="Javier" width="64" height="64">
                </a>
              </div>
              <div class="media-body">
                <h3 class="media-heading">Alberto Fernandez</h3>
                 <p class="postcoment">Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                 sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                 magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                 quis nostrud exerci
                 </p>
                 <img src="img/img5.jpg" alt="Evento" width="250" height="250">
              </div>
              <div class="">
                <form class="form" id="posteo" action="" method="post">
                  <div class="input-group postcom">
                    <input type="text" class="form-control" id="post" name="postcom" placeholder="Comentario...">
                      <span class="input-group-btn">
                        <button class="btn btn-post" type="button"><i class="fa fa-play-circle-o fa-2x"></i></button>
                      </span>
                  </div>
                </form> 
              </div>
            </div>
            
          </div>
        </div>
        <div class="row postcont">
          <div class="col-md-6 col-sm-12">
            
            <div class="media posteo">
              <div class="media-left">
                <a href="#">
                  <img class="media-object img-circle subuser" src="img/usero.jpg" alt="Javier" width="64" height="64">
                </a>
              </div>
              <div class="media-body">
                <h3 class="media-heading">Laura Acosta</h3>
                 <p class="postcoment">Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                 sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                 magna aliquam erat volutpat. Ut wisi enim ad minim veniam</p> 
              </div>
              <div class="">
                <form class="form" id="posteo" action="" method="post">
                  <div class="input-group postcom">
                    <input type="text" class="form-control" id="post" name="postcom" placeholder="Comentario">
                      <span class="input-group-btn">
                        <button class="btn btn-post" type="button"><i class="fa fa-play-circle-o fa-2x"></i></button>
                      </span>
                  </div>
                </form> 
              </div>
            </div>
            
          </div>
        </div>
        
      </div> <!-- fin del container de la columna del medio -->
    </div><!-- fin de la columna del medio -->
    
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="thumbnail">
            <img src="img/img4.jpg" alt="Evento" width="242" height="200">
                <div class="caption">
                    <h3>Recital de Los Beatles</h3>
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
<!--nav class="navbar navbar-fixed-bottom" -->
<div class="container-fluid footeru">
  <div class="row">
    <div class="col-md-3">
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
    <div class="col-md-6"></div>
    <div class="col-md-3">
      <p class="font-maven text-center footp">Copyright <i class="fa fa-copyright"></i> 2016 QPlay <i class="fa fa-registered"></i> All Rights Reserved.</p>
    </div>
  </div>
</div>
<!--/nav -->
<!-- FIN DEL FOOTER -->

<!-- COMIENZO DE JAVASCRIPT PLUGINS -->
<script type="text/javascript" src="js/jquery-2.2.3.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/botcolaps.js"></script>
<script type="text/javascript" src="js/navanim.js"></script>
<script type="text/javascript" src="js/logval.js"></script>
<script type="text/javascript" src="js/jquery.custom-file-input.js"></script>

</body>
</html>