<?php

    // Validacion id valido no sql injeccion
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: anuncios.php');
    }
    
    require 'includes/app.php';
    $db = conexionDB();
    
    //consulta
    $query = "SELECT * FROM propiedades WHERE id=${id}";
    // resultados
    $resultados = mysqli_query($db, $query);
    // control si hay resultyado o no
    if (!$resultados->num_rows) {
        header('Location: anuncios.php');
    }
    $resultado = mysqli_fetch_assoc($resultados);


    incluirTemplate( 'header' );
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $resultado["titulo"]; ?></h1>

        <img loading="lazy"  src="/bienes/imagenes/<?php echo $resultado["imagen"]; ?>" alt="Imagen destacada de la entrada">

        <div class="resumen-propiedad">
            <p class="precio"><?php echo $resultado["precio"]; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img  class="icono"  src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                    <p><?php echo $resultado["wc"]; ?></p>
                </li>
                <li>
                    <img  class="icono"  src="build/img/icono_estacionamiento.svg" alt="icono parking" loading="lazy">
                    <p><?php echo $resultado["parking"]; ?></p>
                </li>
                <li>
                    <img  class="icono"  src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy">
                    <p><?php echo $resultado["habitaciones"]; ?></p>
                </li>
            </ul>
            <p><?php echo $resultado["descripcion"]; ?></p>
            <p><?php echo $resultado["descripcion"]; ?></p>
        </div>
    </main>


<?php
    mysqli_close($db);
    incluirTemplate( 'footer' );
?>