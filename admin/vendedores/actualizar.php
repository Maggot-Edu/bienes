<?php

require '../../includes/app.php';
use App\Vendedor;
estadoAutenticado();
// Validar Id valido

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if(!$id) {
    header('Location: /bienes/admin');
}
//Obtener array vendedor
$vendedor = Vendedor::find($id);
//mensaje errores
    // debuguear($vendedor);
$errores = Vendedor::getErrores();
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) { 
    // Asignar los valores
    $args = $_POST['vendedor'];
    //Sincronizar objeto en memoria con elo que ha escrito el usuario
    $vendedor->sincronizar($args);
    // validacion

    $errores = $vendedor->validar();
    if(!$errores) {
        $vendedor->guardar();
    }
}

incluirTemplate( 'header' );
?>
<main class="contenedor seccion contenido-centrado">
    <h1>Actualizar Vendedor</h1>

    <a href="/bienes/admin" class="boton boton-verde">Volver</a>
    <br>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" action="/bienes/admin/vendedores/actualizar.php" class="formulario">
        <?php include '../../includes/template/formulario_vendedores.php'; ?>
        <input type="submit" value="Guardar Cambios" class="boton boton-verde">
    </form>

</main>
<?php
    incluirTemplate( 'footer' );
?>