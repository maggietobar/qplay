<?php

require_once("clases/jsonRepository.php");
require_once("clases/mySQLRepository.php");

$jsonRepo = new JSONRepository();
$mySQLRepo = new mySQLRepository();

$userJsonRepo = $jsonRepo->getUserRepository();
$userSQLRepo = $mySQLRepo->getUserRepository();

$usuariosJSON = $userJsonRepo->getAllUsers();



try {
	$mySQLRepo->startTransaction();
	foreach ($usuariosJSON as $usuarioJSON) {
		$userSQLRepo->guardarUsuario($usuarioJSON);
	}

    $mySQLRepo->commitTransaction();

	echo "La migración fue completada exitosamente";
} catch(PDOException $ex) {
    //Something went wrong rollback!
    $mySQLRepo->rollBack();
    echo $ex->getMessage();
}

?>
