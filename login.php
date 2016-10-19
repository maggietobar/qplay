<?php
	require_once("soporte.php");

	if ($auth->estaLogueado())
	{
		header("location:index.php");exit;
	}

	if ($_POST)
	{
		//Validar
		$errores = $validar->validarLogin($_POST);

		// Si no hay errores....
		if (empty($errores))
		{
		/*	$miUsuarioArr = $_POST;
			$usuario = new Usuario($_POST);
			$usuario->setPassword($_POST["password"]);
			// Guardar al usuario en un JSON
			$repositorio->getUserRepository()->guardarUsuario($usuario);
			$usuario->guardarImagen($usuario);*/
			// Reenviarlo a la felicidad
			header("location:index.php");exit;
		}
	}
?>

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
    <title>QPlay Login</title>
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

<div class="jumbotronlog">
  <div class="container-fluid login">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <h3 class="text-center font-comfortaa logtit">Iniciar Sesión</h3>
          
           <?php if (!empty($errores)) { ?>
			       <div class="errorph">
        			  <?php foreach ($errores as $error) { ?>
        					<p class="errcript"><?php echo $error ?></p>
        				<?php } ?>
        	   </div>
		    	 <?php } ?> 
		    	   
          <form class="form" id="form" action="login.php" method="post">

            <div class="error"><p class="errcript"></p></div>
            <div class="form-group">
              <!-- <label for="inputEmail3" class="col-sm-2 control-label">Email</label> -->
              <input type="text" class="form-control" id="mail" name="mail" placeholder="Email" maxlength="55" value="<?php echo isset($_POST['mail']) ? $_POST['mail'] : "" ?>">
            </div>
            <div class="error"><p class="errcript"></p></div>
            <div class="form-group">
              <!-- <label for="inputPassword3" class="col-sm-2 control-label">Contraseña</label> -->
              <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" maxlength="40">
            </div>

            <div class="checkbox">
              <label><input type="checkbox"> Recordarme</label>
              <a href="forgotpass.php" class="olvidcont">Olvidaste tu contraseña?</a>
            </div>

              <button type="submit" class="btn btn-login center-block">Ingresar</button>
          </form>
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
<!-- script type="text/javascript" src="js/logval.js"></script -->

</body>
</html>
