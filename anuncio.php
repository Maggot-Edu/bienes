<?php
    require 'includes/app.php';
    use App\Propiedad;
    // Validacion id valido no sql injeccion
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: anuncios.php');
    }
    $resultad = Propiedad::find($id);

    incluirTemplate( 'header' );
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $resultad->titulo; ?></h1>

        <img loading="lazy"  src="/bienes/imagenes/<?php echo $resultad->imagen; ?>" alt="Imagen destacada de la entrada">

        <div class="resumen-propiedad">
            <p class="precio"><?php echo $resultad->precio; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img  class="icono"  src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                    <p><?php echo $resultad->wc; ?></p>
                </li>
                <li>
                    <img  class="icono"  src="build/img/icono_estacionamiento.svg" alt="icono parking" loading="lazy">
                    <p><?php echo $resultad->parking; ?></p>
                </li>
                <li>
                    <img  class="icono"  src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy">
                    <p><?php echo $resultad->habitaciones; ?></p>
                </li>
            </ul>
            <p><?php echo $resultad->descripcion; ?></p>
            <p><?php echo $resultad->descripcion; ?></p>
        </div>
    </main>


<?php incluirTemplate( 'footer' ); ?>