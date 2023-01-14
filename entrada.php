<?php
    include './includes/template/header.php';
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guia decoracion de tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" width="200" height="300" src="build/img/destacada2.jpg" alt="Imagen destacada de la entrada">
        </picture>

        <p class="info-meta">Escrito el : <span>20/01/2022</span> por: <span>Admin</span></p>

        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At enim, repudiandae, voluptate ducimus adipisci ex maxime dolorum iure accusamus nulla ipsa unde quas odit ratione numquam facilis totam. Labore, dolore. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam possimus saepe nemo repellendus, quis quaerat animi velit hic voluptas praesentium eos obcaecati deleniti consequatur tenetur incidunt numquam voluptatem ipsum quos!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum odio saepe rerum ullam eum illum voluptatem eligendi, quia impedit, sint, optio magnam et voluptas veritatis tempora. Exercitationem quas assumenda dolorem!</p>
        </div>
    </main>

<?php
    include './includes/template/footer.php';
?>