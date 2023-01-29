<?php 

    // Consultar la propiedad
    require 'includes/app.php';
    $db = conexionDB();


    // Inserta un admin
    $email = "correo@correo.com";
    $password = "correo";

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    // echo strlen($passwordHash);


    // echo $passwordHash;


    $query = "INSERT INTO usuarios (email, password) VALUES('${email}', '${passwordHash}') ";

    echo $query;

    mysqli_query($db, $query);


?>