<?php


define('TEMPLATES_URL', __DIR__ . '/template');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES',__DIR__.'/../imagenes/');

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
// Escapa html
function escapaHTML($html) : string {
    $escapaHTML = htmlspecialchars($html);
    return $escapaHTML;
}
// Validar tipo de contenido

function validarTipoContenido($tipo) {
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);
}

// Muestra los mensajes
function mostrarNotificacion($codigo) {
    $mensaje = '';
    switch($codigo) {
        case 1:
            $mensaje = 'Creado correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado correctamente';
            break;
        case 2:
            $mensaje = 'Eliminado correctamente';
            break;
        default: 
            $mensaje = false;
            break;
    }
    return $mensaje;
}