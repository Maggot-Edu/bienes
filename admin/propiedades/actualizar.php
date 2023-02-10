<?php

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

    require '../../includes/app.php';
    estadoAutenticado();
    // Validacion id valido no sql injeccion
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: /bienes/admin');
    }

    // Comsulta obtener datios propiedad
    $propiedad = Propiedad::find($id);

    $vendedores = Vendedor::all();
    //array mensaje errores
    $errores = Propiedad::getErrores();

    // inserta datos bbdd
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        $args = $_POST['propiedad'];

        $propiedad->sincronizar($args);
        // Validacion
        $errores = $propiedad->validar();
        //Subida archivos
        //generar nombre unico
        $nombreImagen = md5(uniqid( rand(), true ) ).".jpg";
        // Realizar  un rizize de la imagen con Intervention
        if ($_FILES['propiedad']['tmp_name']['imagen']){
            $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        }
        if ( empty($errores) ) {
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $imagen->save(CARPETA_IMAGENES . $nombreImagen);
            }
            // Insertar en bbdd
            $propiedad->guardar();
        }
    }
    incluirTemplate( 'header' );
?> 

    <main class="contenedor seccion contenido-centrado">
        <h1>Actualizar propiedad</h1>

        <a href="/bienes/admin" class="boton boton-verde">Volver</a>
        <br>

        <?php foreach ($errores as $error) : ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario" enctype="multipart/form-data">
            <?php include '../../includes/template/formulario_propiedades.php'; ?>
            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>

    </main>


<?php
    incluirTemplate( 'footer' );
?>