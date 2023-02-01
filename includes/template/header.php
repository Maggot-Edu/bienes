<?php
    if (!isset($_SESSION)) {
       session_start(); 
    }

    $auth = $_SESSION['login'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes</title>
    <link rel="stylesheet" href="/bienes/build/css/app.css">
</head>
<body>
    
    <header class="header <?php echo $inicio ? 'inicio' : '' ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/bienes/index.php">
                    <img src="/bienes/build/img/logo.svg" alt="logo de la empresa">
                </a>

                <div class="mobile-menu">
                    <img src="/bienes/build/img/barras.svg" alt="Menu responsive">
                </div>
                <div class="derecha">
                    <img class="dark-mode-boton" src="/bienes/build/img/dark-mode.svg" alt="dark mode boton">
                    <nav class="navegacion">
                        <a href="/bienes/nosotros.php">Nosotros</a>
                        <a href="/bienes/anuncios.php">Anuncios</a>
                        <a href="/bienes/blog.php">Blog</a>
                        <a href="/bienes/contacto.php">¿Hablamos?</a>
                        <?php if($auth): ?>
                            <a href="/bienes/cerrar-session.php">Cerrar Sessión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div> <!--.barra-->
            <?php if($inicio) { ?>
                <h1>Venta inmuebles de lujo</h1>
            <?php } ?>
        </div>
    </header>