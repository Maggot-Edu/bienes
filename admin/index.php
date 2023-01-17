<?php
    // Importar conexion
    require '../includes/config/ddbb.php';
    $db = conexionDB();
    // Escribir Consulta
    $query = "SELECT * FROM propiedades";
    // Consultar BD
    $resultadoConsulta = mysqli_query($db, $query);
    // mensaje condicional
    $resultado = $_GET['resultado'] ?? null;
    // Incluye template
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
                <?php while ( $propiedad = mysqli_fetch_assoc($resultadoConsulta) ): ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td> 
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="<?php $propiedad['titulo']; ?>" class="imagen_tabla"></td>
                    <td><?php echo $propiedad['precio'] . "€"; ?></td>
                    <td>
                        <a class="boton-rojo-block" href="#">Eliminar</a>
                        <a href="#" class="boton-amarillo-block" >Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>


<?php
    //cerrar conexion
    mysqli_close($db);
    incluirTemplate( 'footer' );
?>