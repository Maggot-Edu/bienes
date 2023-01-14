<?php
    include './includes/template/header.php';
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta Frente al Bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" width="200" height="300" src="build/img/destacada.jpg" alt="Imagen destacada de la entrada">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">3.000.000€</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img  class="icono"  src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                    <p>4</p>
                </li>
                <li>
                    <img  class="icono"  src="build/img/icono_estacionamiento.svg" alt="icono parking" loading="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img  class="icono"  src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy">
                    <p>6</p>
                </li>
            </ul>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At enim, repudiandae, voluptate ducimus adipisci ex maxime dolorum iure accusamus nulla ipsa unde quas odit ratione numquam facilis totam. Labore, dolore. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam possimus saepe nemo repellendus, quis quaerat animi velit hic voluptas praesentium eos obcaecati deleniti consequatur tenetur incidunt numquam voluptatem ipsum quos!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum odio saepe rerum ullam eum illum voluptatem eligendi, quia impedit, sint, optio magnam et voluptas veritatis tempora. Exercitationem quas assumenda dolorem!</p>
        </div>
    </main>


<?php
    include './includes/template/footer.php';
?>