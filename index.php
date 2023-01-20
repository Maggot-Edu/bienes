<?php

    require 'includes/funciones.php';

    incluirTemplate( 'header' , $inicio = true);
?>

    <main class="contenedor">
        <h1>Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguro" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus doloremque quos cum porro architecto repudiandae ea esse nisi quasi suscipit? Voluptatum a reprehenderit laborum, quos error omnis eaque ad vitae?</p>
            </div> <!--.icono-->
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus doloremque quos cum porro architecto repudiandae ea esse nisi quasi suscipit? Voluptatum a reprehenderit laborum, quos error omnis eaque ad vitae?</p>
            </div> <!--.icono-->
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempoo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus doloremque quos cum porro architecto repudiandae ea esse nisi quasi suscipit? Voluptatum a reprehenderit laborum, quos error omnis eaque ad vitae?</p>
            </div> <!--.icono-->
        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y chalets en Venta</h2>

        <?php 
            $limite = 3;
            include 'includes/template/anuncio.php';
        ?>
        
        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todo</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, iusto veritatis delectus dolor minus minima perferendis error omnis dicta impedit nihil blanditiis tempora unde sapiente aliquam rerum esse corporis velit!</p>
        <a href="contacto.html" class="boton-amarillo">Contactános</a>    
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="Imaghen del blo1" loading="lazy">
                    </picture>
                </div>
                
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techjo de tu casa</h4>
                        <p class="info-meta">Escrito el <span>20/10/2022</span> por: <span>Admin</span></p>
                        <p>Consejos para contruir una terraza en el techo de tu casa sin escatimar en gastos! Todo lujo.</p>
                    </a>
                </div>
            </article> <!--.entrada-blog-->
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" alt="Imaghen del blo1" loading="lazy">
                    </picture>
                </div>
                
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guia decoración de tu hogar</h4>
                        <p class="info-meta">Escrito el <span>20/10/2022</span> por: <span>Admin</span></p>
                        <p>Minimiza el espacio en tu hogar con nuestra guia, y tips de como decorar y ganar.</p>
                    </a>
                </div>
            </article><!--.entrada-blog-->
        </section>

        <section class="testimonios">
            <h3>Testimonios</h3>

            <div class="testimonio">
                <blockquote>
                    Increibles profecionales, se han portado de maravilla y nos han ayudado en todo momento.
                </blockquote>
                <p>- Eduard Badoyan</p>
            </div>
        </section>
    </div>

<?php
    incluirTemplate( 'footer' );
?>