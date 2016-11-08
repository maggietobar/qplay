<?php

$db = new PDO(
    'mysql:host=127.0.0.1:3306;charset=utf8mb4',
    'root',
    ''
);
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$db->exec("CREATE DATABASE if not exists qplay");
$db->exec("USE qplay");

$table = "usuarios";
try {
    $sql ="CREATE table if not exists $table(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(20) NOT NULL,
    apellido VARCHAR(30) NOT NULL,
    email VARCHAR(60) NOT NULL,
	password VARCHAR(200) NOT NULL,
    fechanac  VARCHAR(10) NOT NULL,
    idpass VARCHAR(15) NOT NULL);" ;
    $db->exec($sql);
    print("Se ha creado la tabla $table exitosamente. <br>");

} catch(PDOException $e) {
    echo $e->getMessage();
}

$table = "bandas";
try {
    $sql = "CREATE table if not exists $table(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    banda VARCHAR(100) NOT NULL);" ;
    $db->exec($sql);
    print("Se ha creado la tabla $table exitosamente. <br>");

} catch(PDOException $e) {
    echo $e->getMessage();
}

$table = "instrumentos";
try {
    $sql ="CREATE table $table(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_usuario INT NOT NULL,
  instrumento VARCHAR(100) NOT NULL,
  nivel VARCHAR(15));" ;
    $db->exec($sql);
    print("Se ha creado la tabla $table exitosamente. <br>");

} catch(PDOException $e) {
    echo $e->getMessage();
}

$table = "posts";
try {
    $sql ="CREATE table $table(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    id_post_de_usuario INT NOT NULL,
    contenido VARCHAR(10000) NOT NULL);" ;
    $db->exec($sql);
    print("Se ha creado la tabla $table exitosamente. <br>");

} catch(PDOException $e) {
    echo $e->getMessage();
}
