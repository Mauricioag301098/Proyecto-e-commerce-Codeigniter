><style>
    .lista-facturas {
    list-style-type: none;
}

.factura {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 20px; /* Agregar un margen inferior para separar las facturas */
}
</style>

<div class="container mt-4 productos-destacados">
    <h2>Mis Compras</h2>
    <ul class="lista-facturas">
        <?php foreach ($ventas as $venta) : ?>
            <li class="factura">
                <p>Fecha de compra: <?= $venta['fecha'] ?></p>
                <p>Total de la compra: <?= $venta['total_venta'] ?></p>
                <p>Detalles de la compra:</p>
                <ul>
                    <?php foreach ($venta['detalles'] as $detalle) : ?>
                        <li><?= $detalle['producto_nombre'] ?> - <?= $detalle['cantidad'] ?> unidades - <?= $detalle['precio'] ?> $</li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
