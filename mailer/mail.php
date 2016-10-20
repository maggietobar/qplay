<?php

require_once 'class.phpmailer.php';

//function recuperar_contraseña($mail, $idPass){

    $idPass = 'jdkfsjDFJSDFASKM9';
    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com"; // SMTP a utilizar.
    $mail->Username = "qplay.contacto@gmail.com"; // Correo completo a utilizar
    $mail->Password = "contactoqplay"; // Contraseña
    $mail->Port = 25; // Puerto a utilizar
    $mail->CharSet = 'UTF-8'; // Para que ande la Ñ

    //Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: “From: Nombre <correo@dominio.com>”) de //correo.
    $mail->From = "qplay.contacto@gmail.com";
    $mail->FromName = "Qplay";

    $mail->AddAddress('sebas.crosta@gmail.com'); // Esta es la dirección a donde enviamos
    $mail->IsHTML(true); // El correo se envía como HTML
    $mail->Subject = "Restablecimiento de contraseña"; // Este es el titulo del email.
    $body = 'Hola!<br /><br /> Para restablecer tu contraseña entrá al siguiente  <a href="localhost/qplay/reiniciarPassword.php?id='.$idPass.'">link</a> <br />  .<br /><br /> Saludos! <br /> <b>Qplay</b>';
    $mail->Body = $body; // Mensaje a enviar
    $exito = $mail->Send(); // Envía el correo.
//}

 ?>
