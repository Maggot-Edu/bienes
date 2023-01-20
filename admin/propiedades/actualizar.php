<?php
    require '../../includes/funciones.php';
    $auth = estadoAutenticado();
    if(!$auth) {
        header('Location: /');
    }
    // Validacion id valido no sql injeccion
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: /admin');
    }
    
    require '../../includes/config/ddbb.php';
    $db = conexionDB();

    // Comsulta obtener datios propiedad
    $consulta = "SELECT * FROM propiedades WHERE id=$id";
    $resultado = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultado);

    // Consultar para obtener vendedores de bbdd
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //array mensaje errores
    $errores = [];

    $titulo         = $propiedad['titulo'];
    $precio         = $propiedad['precio'];
    $descripcion    = $propiedad['descripcion'];
    $habitaciones   = $propiedad['habitaciones'];
    $wc             = $propiedad['wc'];
    $parking        = $propiedad['parking'];
    $vendedores_id  = $propiedad['vendedores_id'];
    $imagen        = $propiedad['imagen'];

    // inserta datos bbdd
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

        // $num = "95hola2";
        // $num2 = "sdfsdf";
        // // Sanitizar
        // $resultado = filter_var($num, FILTER_SANITIZE_NUMBER_INT);
        // $resultado = filter_var($num2, FILTER_VALIDATE_INT);
        //var_dump($resultado);

        // echo "<pre>";
        // var_dump($_POST);
        // echo "<pre>";

        // echo "<pre>";
        // var_dump($_FILES);
        // echo "<pre>";


        $titulo         = mysqli_real_escape_string( $db,  $_POST['titulo'] );
        $precio         = mysqli_real_escape_string( $db,  $_POST['precio'] );
        $imagen         = mysqli_real_escape_string( $db,  $_POST['imagen'] );
        $descripcion    = mysqli_real_escape_string( $db,  $_POST['descripcion'] );
        $habitaciones   = mysqli_real_escape_string( $db,  $_POST['habitaciones'] );
        $wc             = mysqli_real_escape_string( $db,  $_POST['wc'] );
        $parking        = mysqli_real_escape_string( $db,  $_POST['parking'] );
        $vendedores_id  = mysqli_real_escape_string( $db,  $_POST['vendedores_id'] );
        $creado         = date('Y/m/d');
        // Asignart fuiles hacia variable
        $imagen = $_FILES['imagen'];

        // Validador de datos
        if (!$titulo) {
            $errores[] = "Debes añadir un titulo";
        }
        if (!$precio) {
            $errores[] = "Debes añadir un precio";
        }
        if ( strlen( $descripcion ) < 50) {
            $errores[] = "Debes añadir una descripción con mas de 50 caracteres";
        }
        if (!$habitaciones) {
            $errores[] = "Debes añadir numero de habitaciones";
        }
        if (!$wc) {
            $errores[] = "Debes añadir numero de wc";
        }
        if (!$parking) {
            $errores[] = "Debes añadir numero de parking";
        }
        if (!$vendedores_id) {
            $errores[] = "Debes elegir un vendedores";
        }

        // Validar tamaño imagen a subir
        $medida = 1000 * 1000;
        if ($imagen['size'] > $medida) {
            $errores[] = "La imagen es demasiado grande";
        }

        // revisar si no hay errores

        if ( empty($errores) ) {

            /* Subida de archivos*/
            //Crear Carpeta
            $carpetaImagenes = '../../imagenes/';
            if ( !is_dir($carpetaImagenes) ) {
                mkdir($carpetaImagenes);
            }
            $nombreImagen = '';
            // eliminar imagen previa
            if ($imagen['name']) {
                unlink($carpetaImagenes . $propiedad['imagen']);
                //generar nombre unico
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
                // Subir imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
            } else {
                $nombreImagen = $propiedad['imagen'];
            }
 


            // Insertar en bbdd
            $query = "UPDATE propiedades 
                      SET titulo = '${titulo}', precio = ${precio}, imagen = '${nombreImagen}', descripcion = '${descripcion}', habitaciones = ${habitaciones}, wc = ${wc}, parking = ${parking}, vendedores_id = ${vendedores_id} 
                      WHERE id=${id}";

            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                // Redireccion de usuario
                header('Location: /admin?resultado=2');
            } 
        }


    }
    incluirTemplate( 'header' );
?> 

    <main class="contenedor seccion contenido-centrado">
        <h1>Actualizar propiedad</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>
        <br>

        <?php foreach ($errores as $error) : ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">
                <?php if (!$imagen) { ?>
                    <p class="alerta error-imagen">No hay Imagen</p>
                <?php } else { ?>
                    <img src="/imagenes/<?php echo $imagen; ?>" class="imagen-pequeña">
                <?php } ?>
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
            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>

    </main>


<?php
    incluirTemplate( 'footer' );
?>