    <title>Listado de consultas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<body>
    <div class="container productos-destacados" style="text-align: center;">
        <h2>Listado de consultas</h2>
        <ul class="list-group">
            <?php foreach ($consultas as $consulta) : ?>
                <li class="list-group-item consulta-item">
                    <div class="row">
                        <div class="col-sm-6">
                            <span><?= $consulta['nombre'] ?> <?= $consulta['apellido'] ?></span>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal<?= $consulta['id_consulta'] ?>">Ver</button>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Modals -->
    <?php foreach ($consultas as $consulta) : ?>
        <div class="modal fade" id="modal<?= $consulta['id_consulta'] ?>" tabindex="-1" role="dialog"
            aria-labelledby="modalLabel<?= $consulta['id_consulta'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel<?= $consulta['id_consulta'] ?>">Consulta de <?= $consulta['nombre'] ?> <?= $consulta['apellido'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body border-top">
                        <p>Email: <?= $consulta['email'] ?></p>
                        <p>Teléfono: <?= $consulta['telefono'] ?></p>
                        <p>Mensaje: <?= $consulta['mensaje'] ?></p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>