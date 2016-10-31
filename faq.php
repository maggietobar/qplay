<?php 
  require_once("soporte.php");
  // Comienzo del Header archvos css y navbar
	genHead("Faqs", "Qplay", "Preguntas Frecuentes");

?>

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
<?php genFooter("Faqs"); ?> 
