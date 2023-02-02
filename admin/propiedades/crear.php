<?php
    require '../../includes/app.php';

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;

    $auth = estadoAutenticado();
    if(!$auth) {
        header('Location: /');
    }
    $db = conexionDB();

    // Consultar para obtener vendedores de bbdd
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    $errores = Propiedad::getErrores();

    //array mensaje errores
    $errores = [];

    $titulo         = '';
    $precio         = '';
    $imagen         = '';
    $descripcion    = '';
    $habitaciones   = '';
    $wc             = '';
    $parking        = '';
    $vendedores_id  = '';

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
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">

                <label for="parking">Parking:</label>
                <input type="number" id="parking" name="parking" placeholder="Ej: 3" min="1" max="9" value="<?php echo $parking; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedores_id">
                    <option value="" disabled selected>-- Selecciona --</option>
                    <?php while( $row = mysqli_fetch_assoc($resultado) ): ?>
                        <option <?php echo $vendedores_id === $row['id'] ? 'selected' : ''; ?> value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] . " " .$row['apellido']; ?></option>
                    <?php endwhile; ?>
                </select>
            </fieldset>
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>

    </main>


<?php
    incluirTemplate( 'footer' );
?>