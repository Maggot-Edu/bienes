<?php
    require 'includes/app.php';
    incluirTemplate( 'header' );
?>

    <main class="contenedor">
        <h1>Casas y Depas en Venta</h1>
        <?php 
            $limite = 10;
            include 'includes/template/anuncio.php';
        ?>
    </main>


<?php
    incluirTemplate( 'footer' );
?>