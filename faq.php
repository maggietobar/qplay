<!DOCTYPE html>
<html>
  <head>
    <meta name="name" content="content">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Abel|Cabin|Comfortaa|Exo|Farsan|Kaushan+Script|Poiret+One|Righteous|Russo+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Antic|Maven+Pro|Poppins|Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/homex.css" type="text/css" />
    <link rel="stylesheet" href="css/login.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.css" type="text/css" />
    <title>Preguntas Frecuentes</title>
  </head>

<body>

<!-- COMIENZO DEL NAVBAR Y SU CONTENIDO -->
<!-- Para hacerlo fluido quitar "navbar-fixed-top" y sacar padding del body en la hoja del estilo -->

<nav class="navbar navbar-inverse">
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

 <div class="jumbotronfaq text-center">
    <h1>Preguntas frecuentes</h1>
 </div>

<!-- FIN DEL JUMBOTRON -->
<!-- COMIENZO DE LA SECCION DE PREGUNTAS Y RESPUESTAS -->

<div class="container-fluid gray">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <dl>
        <dt data-target="0">Qué tengo que hacer para registrarme en Qplay?</dt>
        <dd> Hacé click en el botón registrarse, o <a href="register.php">acá</a>, completá el formulario y listo!</dd>
      </dl>

      <dl>
        <dt data-target="1">Cómo hago ingresar en mi cuenta?</dt>
        <dd>Buscá el botón que dice "Conectate", tanto en la parte superior como en la inferior de la página o en <a href="login.php"> este link</a>, poné tus datos y ya está.</dd>
      </dl>

      <dl>
        <dt data-target="2">Qué hago si me olvidé la clave?</dt>
        <dd>Accedé a <a href="forgotpass.php"> este link </a>, poné tu dirección de correo y te va a llegar un mail con lo necesario para resetear la contraseña de tu cuenta.</dd>
      </dl>

      <dl>
        <dt data-target="3">Cómo puedo ser parte de un grupo?</dt>
        <dd>Esta función será agregada más adelante, tenenos paciencia!</dd>
      </dl>

      <dl>
        <dt data-target="4">Cómo puedo participar de un evento?</dt>
        <dd>Buscá la página del evento y arriba a la izquierda va a haber un botón que dice "Confirmar asistencia". Una vez que hacés click ahí, ya estás participando y te van a llegar las notificaciones del evento. </dd>
      </dl>


    </div>
  </div>
</div>

<!-- FIN DE LA SECCION DE PREGUNTAS Y RESPUESTAS -->
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
<script type="text/javascript" src="js/faq.js"></script>

</body>
</html>