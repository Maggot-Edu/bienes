<?php
    require '../includes/app.php';
    estadoAutenticado();
    use App\Propiedad;
    // Implementar un metodo para obtener todas las propiedades
    $propiedades = Propiedad::all();

    // mensaje condicional
    $resultado = $_GET['resultado'] ?? null;

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id) {
            // Eliminar archivo/imagen
            $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);
            unlink('../imagenes/'. $propiedad['imagen']);

            //Elimina propiedad
            $query = "DELETE FROM propiedades WHERE id = ${id}";

            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                header('Location: /bienes/admin?resultado=3');
            }
        }
    }

    // Incluye template
    incluirTemplate( 'header' );
?>

    <main class="contenedor">
        <h1>Admin Console</h1>
        <?php if ( intval($resultado) === 1): ?>
            <p class="alerta exito">Anuncio Creado correctamente</p>
        <?php elseif ( intval($resultado) === 2): ?>
            <p class="alerta exito">Anuncio Actualizado correctamente</p>
            <?php elseif ( intval($resultado) === 3): ?>
            <p class="alerta exito">Anuncio Eliminado correctamente</p>
        <?php endif; ?>
        <br>
        <a href="/bienes/admin/propiedades/crear.php" class="boton boton-verde">Nueva 
            Propiedad
        </a>
        <br>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody><!-- Mostrar datos -->
                <?php foreach( $propiedades as $propiedad ): ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td> 
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="/bienes/imagenes/<?php echo $propiedad->imagen; ?>" alt="<?php $propiedad->titulo; ?>" class="imagen_tabla"></td>
                    <td><?php echo $propiedad->precio . "€"; ?></td>
                    <td>
                        <form method="POST" class="w-100">

                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">

                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a href="/bienes/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id ?>" class="boton-amarillo-block" >Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>


<?php
    //cerrar conexion
    mysqli_close($db);
    incluirTemplate( 'footer' );
?>