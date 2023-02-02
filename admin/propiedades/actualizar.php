<?php

use App\Propiedad;

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

    // Consultar para obtener vendedores de bbdd
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //array mensaje errores
    $errores = [];

    // inserta datos bbdd
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

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
                header('Location: /bienes/admin?resultado=2');
            } 
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