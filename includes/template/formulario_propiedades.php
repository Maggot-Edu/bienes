<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo escapaHTML($propiedad->titulo); ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo escapaHTML($propiedad->precio); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">
    <?php if ($propiedad->imagen) {?>
            <img src="/bienes/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-small">
    <?php } ?>
    

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion"><?php echo escapaHTML($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset> 
    <legend>Información Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo escapaHTML($propiedad->habitaciones); ?>">

    <label for="wc">Baños:</label>
    <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo escapaHTML($propiedad->wc); ?>">

    <label for="parking">Parking:</label>
    <input type="number" id="parking" name="parking" placeholder="Ej: 3" min="1" max="9" value="<?php echo escapaHTML($propiedad->parking); ?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <select name="vendedores_id">
        <option value="" disabled selected>-- Selecciona --</option>
        <?php while( $row = mysqli_fetch_assoc($resultado) ): ?>
            <option <?php echo $vendedores_id === $row['id'] ? 'selected' : ''; ?> value="<?php echo escapaHTML($propiedad->id) ?>"><?php echo escapaHTML($propiedad->nombre) . " " .escapaHTML($propiedad->apellido); ?></option>
        <?php endwhile; ?>
    </select>
</fieldset>