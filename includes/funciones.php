<?php


define('TEMPLATES_URL', __DIR__ . '/template');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

function incluirTemplate( string $nombre, bool $inicio = false ) {
    include TEMPLATES_URL . "/${nombre}.php";
}

function estadoAutenticado() :bool {
    session_start();

    if($_SESSION['login']) {
        return true;
    }
    return false;
}

function debuguear( $var ) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    exit;
}