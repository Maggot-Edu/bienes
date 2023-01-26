<?php

function conexionDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', '', 'bienes_crud');

    if (!$db) {
        echo "No se ha podido conectar a BBDD";
        exit;
    }

    return $db;
}