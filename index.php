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

        <div class="contenedor-anuncios">
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio1.webp" type="image/webp">
                    <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio1.jpg" alt="Anuncio 1">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Casa en el Lago</h3>
                    <p>Casa en el lago con excelentes vistas, acabado de lujo excelente preció</p>
                    <p class="precio">3.000.000€</p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono parking" loading="lazy">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy">
                            <p>4</p>
                        </li>
                    </ul>

                    <a href="anuncios.html" class="boton-amarillo-block">Ver Propiedad</a>
                </div> <!--.contenido-anuncio-->
            </div> <!--.anuncio-->
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio2.webp" type="image/webp">
                    <source srcset="build/img/anuncio2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio2.jpg" alt="Anuncio 1">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Chalet YouTuber</h3>
                    <p>Increible casa para los mejores grupos de youtubers con muchas habitaciones</p>
                    <p class="precio">1.500.000€</p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono"  src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                            <p>4</p>
                        </li>
                        <li>
                            <img class="icono"  src="build/img/icono_estacionamiento.svg" alt="icono parking" loading="lazy">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono"  src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy">
                            <p>6</p>
                        </li>
                    </ul>

                    <a href="anuncios.html" class="boton-amarillo-block">Ver Propiedad</a>
                </div> <!--.contenido-anuncio-->
            </div> <!--.anuncio-->
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio3.webp" type="image/webp">
                    <source srcset="build/img/anuncio3.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio3.jpg" alt="Anuncio 1">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Casa con Piscina</h3>
                    <p>Casa con alberca y acabados de lujo en madera, cuenta con piscina</p>
                    <p class="precio">3.000.000€</p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono"  src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono"  src="build/img/icono_estacionamiento.svg" alt="icono parking" loading="lazy">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono"  src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy">
                            <p>4</p>
                        </li>
                    </ul>

                    <a href="anuncios.html" class="boton-amarillo-block">Ver Propiedad</a>
                </div> <!--.contenido-anuncio-->
            </div> <!--.anuncio-->
        </div> <!--.contenedor-anuncios-->
        <div class="alinear-derecha">
            <a href="anuncios.html" class="boton-verde">Ver Todo</a>
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