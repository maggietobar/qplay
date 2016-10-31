<?php

require_once("clases/auth.php");
require_once("clases/validar.php");
require_once("clases/jsonRepository.php");
require_once("clases/usuario.php");
require_once("mailer/mail.php");
require_once("headers.php");

$tipoRepositorio = "json";
$repositorio = null;

if ($tipoRepositorio == "json")
{
	$repositorio = new JSONRepository();
}

$auth = Auth::getInstance($repositorio->getUserRepository());
$validar = Validar::getInstance($repositorio->getUserRepository());
