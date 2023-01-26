<?php
    require 'includes/app.php';
    incluirTemplate( 'header' );
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" width="200" height="300" src="build/img/destacada3.jpg" alt="imagen contacto">
        </picture>

        <h2>Rellena el formulario</h2>

        <form action="" class="formulario">
            <fieldset>
                <legend>Informacion Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre">

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu Email" id="email">

                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="Tu Telefono" id="telefono">

                <label for="mensaje">Mensaje:</label>
                <textarea name="" id="mensaje" cols="30" rows="10"></textarea>

            </fieldset>
            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="opciones">Vende o Compra</label>
                <select name="" id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="Presupuesto">Presupuesto o Preció</label>
                <input type="number" placeholder="Tu Presupuesto" id="Presupuesto">

            </fieldset>
            <fieldset>
                <legend>Contacto</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" name="contacto" id="contactar-telefono" value="telefono">

                    <label for="contactar-email">E-mail</label>
                    <input type="radio" name="contacto" id="contactar-email" value="email">
                </div>

                <p>Si eligió telefono eliga hora para ser contactado</p>

                <label for="fecha">Fecha</label>
                <input type="date" id="fecha">

                <label for="hora">Hora</label>
                <input type="time" id="hora" min="09:00" max="18:00">

            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>


<?php
    incluirTemplate( 'footer' );
?>