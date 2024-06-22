<title>Contacto</title>
<div class="container">
  <div class="row">
    <div class="col">
      <div class="row mt-4 productos-destacados">
        <div class="col">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <i class="fab fa-facebook larger-icon"></i><h5 class="card-title">Dale me gusta a nuestra pagina de Facebook</h5>
              <p class="card-text">Asi vas a estar al dia con nuestras ofertas y promociones!.</p>
              <a href="https://www.facebook.com/" class="card-link" target="_blank" rel="noopener noreferrer">Ir a Facebook</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <i class="fab fa-whatsapp larger-icon"></i><h5 class="card-title">Escribinos por WhatsApp</h5>
              <p class="card-text">Consulta cualquier duda o realiza un pedido a través de Whatsapp.</p>
              <a href="https://wa.me/" class="card-link" target="_blank" rel="noopener noreferrer">Ir a WhatsApp</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <i class="fab fa-instagram larger-icon"></i><h5 class="card-title">Seguinos en Instagram</h5>
              <p class="card-text">Conocé nuestros productos y novedades, tambien vas a poder participar en sorteos exclusivos de esta plataforma.</p>
              <a href="https://www.instagram.com/" class="card-link" target="_blank" rel="noopener noreferrer">Ir a Instagram</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
            <i class="fa-solid fa-location-dot larger-icon"></i><h5 class="card-title">Visitanos en nuestro local</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">Estamos en Salta 977</h6>
              <p class="card-text">Trabajamos de Lunes a Viernes de 8 a 12:30 y de 16 a 21, sabados solo medio día</p>
              <a href="https://www.google.com/maps/" class="card-link" target="_blank" rel="noopener noreferrer">Ir a Maps</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4 productos-destacados">
    <div class="col">
    <h3>Formulario de Consultas</h3>
<form action="<?php echo base_url('guardar-consulta'); ?>" method="post">
    <!-- Mostrar mensajes de error generales -->
    <?php if (session('error')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session('error') ?>
        </div>
    <?php endif; ?>

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
        <!-- Mostrar mensajes de error para el campo 'nombre' -->
        <?php if (session('validation') && session('validation')->hasError('nombre')) : ?>
            <div class="text-danger"><?= session('validation')->getError('nombre') ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" required>
        <!-- Mostrar mensajes de error para el campo 'apellido' -->
        <?php if (session('validation') && session('validation')->hasError('apellido')) : ?>
            <div class="text-danger"><?= session('validation')->getError('apellido') ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
        <!-- Mostrar mensajes de error para el campo 'email' -->
        <?php if (session('validation') && session('validation')->hasError('email')) : ?>
            <div class="text-danger"><?= session('validation')->getError('email') ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="tel" class="form-control" id="telefono" name="telefono" required>
        <!-- Mostrar mensajes de error para el campo 'telefono' -->
        <?php if (session('validation') && session('validation')->hasError('telefono')) : ?>
            <div class="text-danger"><?= session('validation')->getError('telefono') ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="mensaje" class="form-label">Mensaje</label>
        <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
        <!-- Mostrar mensajes de error para el campo 'mensaje' -->
        <?php if (session('validation') && session('validation')->hasError('mensaje')) : ?>
            <div class="text-danger"><?= session('validation')->getError('mensaje') ?></div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Enviar Consulta</button>
</form>

    </div>
  </div>
</div>
    </div>
  </div>
</div>

