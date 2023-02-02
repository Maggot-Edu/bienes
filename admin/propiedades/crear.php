<?php
    require '../../includes/app.php';

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;

    estadoAutenticado();
    $db = conexionDB();
    $propiedad = new Propiedad();

    // Consultar para obtener vendedores de bbdd
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);
    //mensaje errores
    $errores = Propiedad::getErrores();

    // inserta datos bbdd
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

        $propiedad = new Propiedad($_POST);
        /* Subida de archivos*/
        //generar nombre unico
        $nombreImagen = md5(uniqid( rand(), true ) ).".jpg";
        // Realizar  un rizize de la imagen con Intervention
        if ($_FILES['imagen']['tmp_name']){
            $imagen = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
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
            $imagen->save(CARPETA_IMAGENES.$nombreImagen);
            // Guerdar BBDD
            $resultado = $propiedad->guardar();
            // Mensaje exito
            if ($resultado) {
                // Redireccion de usuario
                header('Location: /bienes/admin?resultado=1');
            } 
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