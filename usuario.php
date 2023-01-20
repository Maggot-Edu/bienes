<?php

// importar conexion
require 'includes/config/ddbb.php';
$db = conexionDB();

// crear un email y password
$email = "correo@correo.com";
$password = "321321";

// hashear password
$passwordHash = password_hash($password, PASSWORD_BCRYPT);
// consulta para crear el usuario
$query = "INSERT INTO usuarios (email, password)
          VALUES ('${email}', '${passwordHash}')";

// agregar a la base de datos

mysqli_query($db, $query);