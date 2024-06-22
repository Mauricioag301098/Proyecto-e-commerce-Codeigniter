<div class="container mt-4 productos-destacados">
<div class="d-flex justify-content-end mb-2">
    <a href="<?= site_url('/agregar') ?>" class="btn btn-success mb-2" style="margin-right: 10px;">Agregar producto</a>
    <a href="<?= site_url('/crear-categoria') ?>" class="btn btn-warning mb-2">Agregar categoria</a>
</div>
    <div class="mt-3">
        <table class="table table-bordered" id="productos-list">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Precio de venta</th>
                    <th>Stock</th>
                    <th>Stock mínimo</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($productos): ?>
                    <?php foreach ($productos as $producto): ?>
                        <tr>
                            <td><?= $producto['id'] ?></td>
                            <td><?= $producto['nombre_prod'] ?></td>
                            <td><img src="<?= base_url('assets/img/' . $producto['imagen']) ?>" alt="<?= $producto['nombre_prod'] ?>" style="width: 50px; height: auto;"></td>
                            <td><?= $producto['categoria_id'] ?></td>
                            <td><?= $producto['precio'] ?></td>
                            <td><?= $producto['precio_vta'] ?></td>
                            <td><?= $producto['stock'] ?></td>
                            <td><?= $producto['stock_min'] ?></td>
                            <td>
                                <a href="<?= base_url('editar/' . $producto['id']) ?>" class="btn btn-primary btn-sm">Editar</a>
                                <form action="<?= base_url('deshabilitar/' . $producto['id']) ?>" method="POST">
                                    <input type="hidden" name="_method" value="PATCH">
                                    <button type="submit" class="btn btn-danger btn-sm">Deshabilitar</button>
                                </form>
                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <!-- Agregar paginación -->
    <div class="d-flex justify-content-center">
        <?php echo $pagination; ?>
    </div>
</div>
