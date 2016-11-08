<?php

require_once("clases/auth.php");
require_once("clases/validar.php");
require_once("clases/jsonRepository.php");
require_once("clases/usuario.php");
require_once("clases/mySQLRepository.php");
require_once("mailer/mail.php");
require_once("headers.php");

$tipoRepositorio = "MySQL";
$repositorio = null;

if ($tipoRepositorio == "json")
{
	$repositorio = new JSONRepository();
}else if ($tipoRepositorio == 'MySQL'){
    $repositorio = new MySQLRepository();
}

$auth = Auth::getInstance($repositorio->getUserRepository());
$validar = Validar::getInstance($repositorio->getUserRepository());
