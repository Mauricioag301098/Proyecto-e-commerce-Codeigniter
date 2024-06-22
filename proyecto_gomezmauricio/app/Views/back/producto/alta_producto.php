<div class="container mt-4 productos-destacados">
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
                                <?php if ($producto['eliminado'] === 'SI'): ?>
                                    <form action="<?= base_url('habilitar/' . $producto['id']) ?>" method="POST">
                                        <input type="hidden" name="_method" value="PATCH">
                                        <button type="submit" class="btn btn-success btn-sm">Habilitar</button>
                                    </form>
                                <?php endif; ?>
                                <form action="<?= base_url('eliminar/' . $producto['id']) ?>" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                                <a href="<?= base_url('editar/' . $producto['id']) ?>" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
