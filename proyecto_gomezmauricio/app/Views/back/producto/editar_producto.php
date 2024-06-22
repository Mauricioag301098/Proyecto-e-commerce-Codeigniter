<div class="productos-destacados">
<form method="post" action="<?php echo base_url('modifica/' . $producto['id']); ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nombre_prod">Nombre del producto</label>
        <input type="text" class="form-control" id="nombre_prod" name="nombre_prod" value="<?php echo $producto['nombre_prod']; ?>">
    </div>
    <div class="form-group">
        <label for="precio_vta">Precio de venta</label>
        <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $producto['precio']; ?>">
    </div>
    <div class="form-group">
        <label for="precio_vta">Precio de venta</label>
        <input type="text" class="form-control" id="precio_vta" name="precio_vta" value="<?php echo $producto['precio_vta']; ?>">
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $producto['stock']; ?>">
    </div>
    <div class="form-group">
        <label for="stock_min">Stock mínimo</label>
        <input type="number" class="form-control" id="stock_min" name="stock_min" value="<?php echo $producto['stock_min']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Guardar cambios</button>
</form>
</div>
</div>