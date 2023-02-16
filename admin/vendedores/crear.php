<?php

require '../../includes/app.php';

use App\Vendedor;
estadoAutenticado();

$vendedor = new Vendedor;

//mensaje errores
$errores = Vendedor::getErrores();

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) { 
    // Crear una nueva estancia
    $vendedor = new Vendedor($_POST['vendedor']);
    // Validar campos vacios
    $errores = $vendedor->validar();
    // No hay errores
    if(empty($errores)) {
        $vendedor->guardar();
    }
}

incluirTemplate( 'header' );
?>
<main class="contenedor seccion contenido-centrado">
    <h1>Registrar Vendedor</h1>

    <a href="/bienes/admin" class="boton boton-verde">Volver</a>
    <br>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" action="/bienes/admin/vendedores/crear.php" class="formulario">
        <?php include '../../includes/template/formulario_vendedores.php'; ?>
        <input type="submit" value="Registrar Vendedor" class="boton boton-verde">
    </form>

</main>
<?php
    incluirTemplate( 'footer' );
?>