<?php
require_once("soporte.php");
session_start();

if ($auth->estaLogueado()) {
    $auth->logout();
    header("location:index.php");
}

?>