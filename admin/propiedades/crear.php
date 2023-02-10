<?php
    require '../../includes/app.php';

    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    estadoAutenticado();
    $propiedad = new Propiedad();

    // Cpmnsulta vendedores
    $vendedores = Vendedor::all();

    //mensaje errores
    $errores = Propiedad::getErrores();

    // inserta datos bbdd
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

        $propiedad = new Propiedad($_POST['propiedad']);
        /* Subida de archivos*/
        //generar nombre unico
        $nombreImagen = md5(uniqid( rand(), true ) ).".jpg";
        // Realizar  un rizize de la imagen con Intervention
        if ($_FILES['propiedad']['tmp_name']['imagen']){
            $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        }

        // revisar si no hay errores
        $errores = $propiedad->validar();

        if ( empty($errores) ) {

            // Crear carpeta subir imagenes
            if(!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES);
            }
            //Guardar imagen en el servidor
            $imagen->save(CARPETA_IMAGENES . $nombreImagen);
            // Guerdar BBDD
            $propiedad->guardar();
            // Mensaje exito
 
        }
    }
    incluirTemplate( 'header' );
?> 

    <main class="contenedor seccion contenido-centrado">
        <h1>Crear</h1>

        <a href="/bienes/admin" class="boton boton-verde">Volver</a>
        <br>

        <?php foreach ($errores as $error) : ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" action="/bienes/admin/propiedades/crear.php" class="formulario" enctype="multipart/form-data">
            <?php include '../../includes/template/formulario_propiedades.php'; ?>
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>

    </main>


<?php
    incluirTemplate( 'footer' );
?>