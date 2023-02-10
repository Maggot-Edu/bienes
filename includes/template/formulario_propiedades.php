<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo Propiedad" value="<?php echo escapaHTML($propiedad->titulo); ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio Propiedad" value="<?php echo escapaHTML($propiedad->precio); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="propiedad[imagen]" accept="image/jpeg, image/png">
    <?php if ($propiedad->imagen) {?>
            <img src="/bienes/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-small">
    <?php } ?>
    

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="propiedad[descripcion]"><?php echo escapaHTML($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset> 
    <legend>Información Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej: 3" min="1" max="9" value="<?php echo escapaHTML($propiedad->habitaciones); ?>">

    <label for="wc">Baños:</label>
    <input type="number" id="wc" name="propiedad[wc]" placeholder="Ej: 3" min="1" max="9" value="<?php echo escapaHTML($propiedad->wc); ?>">

    <label for="parking">Parking:</label>
    <input type="number" id="parking" name="propiedad[parking]" placeholder="Ej: 3" min="1" max="9" value="<?php echo escapaHTML($propiedad->parking); ?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>
    
    <label for="vendedor">Vendedor</label>
    <select name="propiedad[vendedores_id]" id="vendedor">
        <option value="" disabled selected>-- Selecciona --</option>
        <?php foreach( $vendedores as $vendedor ): ?>
            <option 
                <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : ''; ?>
                value="<?php echo escapaHTML($vendedor->id); ?>"><?php echo escapaHTML($vendedor->nombre). " ". escapaHTML($vendedor->apellido); ?>
            </option>
        <?php endforeach; ?>
    </select>
</fieldset>