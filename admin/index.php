<?php
    $resultado = $_GET['resultado'] ?? null;
    require '../includes/funciones.php';
    incluirTemplate( 'header' );
?>

    <main class="contenedor">
        <h1>Admin Console</h1>
        <?php if ( intval($resultado) === 1): ?>
            <p class="alerta exito">Anuncio creado correctamente</p>
        <?php endif; ?>
        <br>
        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva 
            Propiedad
        </a>
    </main>


<?php
    incluirTemplate( 'footer' );
?>