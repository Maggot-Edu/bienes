<?php
    require 'includes/funciones.php';
    incluirTemplate( 'header' );
?>

    <main class="contenedor seccion">
        <h1>Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    15 Años de experiencia
                </blockquote>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus sint, in molestias, eveniet quae repellat non soluta aut fuga totam rerum laborum beatae deleniti! Cumque labore veniam quia quam sit. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor ipsam laborum voluptatum possimus sit quisquam voluptatem deleniti eius cupiditate perspiciatis repellendus, voluptatibus aspernatur explicabo ad adipisci dolorum, eos error eum.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, excepturi, culpa dolore corrupti delectus tempora cum eius nam, fugiat labore voluptatibus itaque dolores voluptates adipisci amet modi autem esse? Perferendis?</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Mas sobre nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img  src="build/img/icono1.svg" alt="Icono seguro" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus doloremque quos cum porro architecto repudiandae ea esse nisi quasi suscipit? Voluptatum a reprehenderit laborum, quos error omnis eaque ad vitae?</p>
            </div> <!--.icono-->
            <div class="icono">
                <img  src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus doloremque quos cum porro architecto repudiandae ea esse nisi quasi suscipit? Voluptatum a reprehenderit laborum, quos error omnis eaque ad vitae?</p>
            </div> <!--.icono-->
            <div class="icono">
                <img  src="build/img/icono3.svg" alt="Icono tiempoo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus doloremque quos cum porro architecto repudiandae ea esse nisi quasi suscipit? Voluptatum a reprehenderit laborum, quos error omnis eaque ad vitae?</p>
            </div> <!--.icono-->
        </div>
    </section>

<?php
    incluirTemplate( 'footer' );
?>