<?php

require_once("soporte.php");

if ($_POST){

  if (!$repositorio->getUserRepository()->existeElMail($_POST["mail"])){
    $errorForgot = 'El mail no existe';
  } else{
    $miUsuario = $repositorio->getUserRepository()->getUsuarioByMail($_POST["mail"]);

    recuperar_contraseña($miUsuario->getMail(), $miUsuario->getIdPass());
    header("location:index.php");exit;
  }
}

// Comienzo del Header archvos css y navbar
	genHead("Recuperar", "Qplay", "Recuperar Contraseña");

?>

<!-- COMIENZO DE JUMBOTRON -->

<div class="jumbotronlog">
  <div class="container-fluid login">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <h3 class="text-center font-comfortaa logtit">Recuperar Contraseña</h3>
          <form class="form" method="post" action="forgotpass.php">

            <div class="form-group">
              <!-- <label for="inputEmail3" class="col-sm-2 control-label">Email</label> -->
              <input type="email" class="form-control" id="inputEmail3" name="mail" placeholder="Email">
            </div>

              <button type="submit" class="btn btn-login center-block">Enviar</button>
          </form>
        </div>
    </div>
  </div>
</div>


<!-- COMIENZO DEL FOOTER -->
<?php genFooter("Recuperar"); ?> 
