<?php

function conexionDB() : mysqli {
    $db = new mysqli('localhost', 'root', 'root', 'bienes_crud');

    if (!$db) {
        echo "No se ha podido conectar a BBDD";
        exit;
    }

    return $db;
}