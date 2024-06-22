<div class="container productos-destacados">
    <div class="row">
        <div class="col">
            <h2>Factura</h2>
            <hr>
            <p>Detalles de la venta:</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ventaDetalle as $detalle) : ?>
                        <tr>
                            <td><?php echo $detalle['id']; ?></td>
                            <td>
                                <?php
                                $producto = $productoModel->find($detalle['producto_id']);
                                echo $producto['nombre_prod'];
                                ?>
                            </td>
                            <td>
                                <?php echo $producto['descripcion_prod']; ?>
                            </td>
                            <td><?php echo $detalle['cantidad']; ?></td>
                            <td><?php echo $detalle['precio']; ?></td> <!-- Cambiado de precio_vta a precio -->
                            <td><?php echo $detalle['cantidad'] * $detalle['precio']; ?></td> <!-- Cambiado de precio_vta a precio -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <hr>
            <p>Fecha de la venta: <?php echo date('Y-m-d H:i:s'); ?></p>
        </div>
    </div>
</div>
