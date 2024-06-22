<div class="container mt-5 productos-destacados">
    <h2>Agregar Producto</h2>
    <form method="post" action="<?= site_url('/guardar-producto') ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre_prod" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion_prod" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" class="form-control-file" id="imagen" name="imagen" required>
        </div>
        <div class="form-group">
    <label for="categoria">Categoría:</label>
    <select class="form-control" id="categoria" name="categoria_id" required>
        <?php
        $categoriaModel = new \App\Models\Categoria_model();
        $categorias = $categoriaModel->findAll();
        foreach ($categorias as $categoria) {
            echo '<option value="' . $categoria['id'] . '">' . $categoria['descripcion'] . '</option>';
        }
        ?>
    </select>
</div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" class="form-control" id="precio" name="precio" required>
        </div>
        <div class="form-group">
            <label for="precio_vta">Precio de venta:</label>
            <input type="text" class="form-control" id="precio_vta" name="precio_vta" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="text" class="form-control" id="stock" name="stock" required>
        </div>
        <div class="form-group">
            <label for="stock_min">Stock mínimo:</label>
            <input type="text" class="form-control" id="stock_min" name="stock_min" required>
        </div>
        <div class="form-group">
            <label for="eliminado">Eliminado:</label>
            <select class="form-control" id="eliminado" name="eliminado" required>
                <option value="SI">Sí</option>
                <option value="NO">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
