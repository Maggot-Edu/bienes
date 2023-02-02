<?php
    require 'includes/app.php';
    incluirTemplate( 'header' );
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro blog</h1>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img src="build/img/blog1.jpg" alt="Imaghen del blo1" loading="lazy">
                </picture>
            </div>
            
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techjo de tu casa</h4>
                    <p>Escrito el <span>20/10/2022</span> por: <span>Admin</span></p>
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
                <a href="entrada.php">
                    <h4>Guia decoración de tu hogar</h4>
                    <p>Escrito el <span>20/10/2022</span> por: <span>Admin</span></p>
                    <p>Minimiza el espacio en tu hogar con nuestra guia, y tips de como decorar y ganar.</p>
                </a>
            </div>
        </article><!--.entrada-blog-->
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpg" type="image/jpeg">
                    <img src="build/img/blog3.jpg" alt="Imaghen del blo1" loading="lazy">
                </picture>
            </div>
            
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia decoración de tu hogar</h4>
                    <p>Escrito el <span>20/10/2022</span> por: <span>Admin</span></p>
                    <p>Minimiza el espacio en tu hogar con nuestra guia, y tips de como decorar y ganar.</p>
                </a>
            </div>
        </article><!--.entrada-blog-->
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.jpg" type="image/jpeg">
                    <img src="build/img/blog4.jpg" alt="Imaghen del blo1" loading="lazy">
                </picture>
            </div>
            
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia decoración de tu hogar</h4>
                    <p>Escrito el <span>20/10/2022</span> por: <span>Admin</span></p>
                    <p>Minimiza el espacio en tu hogar con nuestra guia, y tips de como decorar y ganar.</p>
                </a>
            </div>
        </article><!--.entrada-blog-->
    </main>


<?php
    incluirTemplate( 'footer' );
?>