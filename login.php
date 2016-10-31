<?php
require_once("soporte.php");
session_start();

	if ($auth->estaLogueado()) {
		header("location:usuariolog.php");
		exit;
	}

	if ($_POST) {
		$errores = $validar->validarLogin($_POST);

		if (empty($errores)) {
      $usuario = $repositorio->getUserRepository()->getUsuarioByMail($_POST["mail"]);
      $auth->loguear($usuario);

  			if (isset($_POST["recordame"])) {
  			//recordarlo
  				setcookie("usuarioLogueado", $usuario->getId(), time() + 60 * 60 * 24 * 365);
  			}

			header("location:usuariolog.php");
			exit;
		}
	}
// Comienzo del Header archvos css y navbar	
genHead("Ingreso", "Qplay", "Conectate con tus amigos.");
	
?>

<!-- COMIENZO DEL LOGIN -->
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
          <div class="form-group <?php echo (isset($errores["mail"]))? "onerrorph" : "" ?> ">
            <!-- span class="input-group-addon"><i class="fa fa-envelope-o fa-lg"></i></span -->
            <input type="text" class="form-control" id="mail" name="mail" placeholder="Email" maxlength="55" value="<?php echo isset($_POST['mail']) ? $_POST['mail'] : "" ?>">
          </div>
          <div class="error"><p class="errcript"></p></div>
          <div class="form-group <?php echo (isset($errores["pass"]))? "onerrorph" : "" ?>  ">
            <!-- span class="input-group-addon"><i class="fa fa-asterisk fa-lg"></i></span -->
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" maxlength="40">
          </div>
          <div class="checkbox">
            <label><input type="checkbox" name="recordarme" value="1"> Recordarme</label>
            <a href="forgotpass.php" class="olvidcont">Olvidaste tu contraseña?</a>
          </div>

            <button type="submit" class="btn btn-login center-block">Ingresar</button>
        </form>
      </div>
  </div>
</div>
<!-- FIN DEL LOGIN -->

<!-- COMIENZO DEL FOOTER -->
<?php genFooter("Ingreso"); ?> 
