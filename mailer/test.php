<?php

require_once '_lib/class.phpmailer.php';

function recuperar_contraseña($mail, $idPass){

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
    $mail->Username = "qplay.contacto@gmail.com"; // Correo completo a utilizar
    $mail->Password = "contactoqplay"; // Contraseña
    $mail->Port = 25; // Puerto a utilizar

    $mail->From = "qplay.contacto@gmail.com"; // Desde donde enviamos (Para mostrar)
    $mail->FromName = "Qplay";
    //Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: “From: Nombre <correo@dominio.com>”) de //correo.

    $mail->AddAddress($mail); // Esta es la dirección a donde enviamos
    $mail->IsHTML(true); // El correo se envía como HTML
    $mail->Subject = "Restablecimiento de contraseña"; // Este es el titulo del email.
    $body = "Hola!<br /><br /> Para restablecer tu contraseña entrá al siguiente link <br />";
    $body .= "Acá va el link. <br /><br /> Saludos! <br /> <b>Qplay</b>";
    $mail->Body = $body; // Mensaje a enviar
    $exito = $mail->Send(); // Envía el correo.
}

//También podríamos agregar simples verificaciones para saber si se envió:
if($exito){
echo "El correo fue enviado correctamente.";
}else{
echo "Hubo un inconveniente. Contacta a un administrador.";
}

 ?>
