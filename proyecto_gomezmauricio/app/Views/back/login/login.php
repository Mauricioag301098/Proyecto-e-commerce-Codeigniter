<div class="container mt-5 mb-5 d-flex justify-content-center productos-destacados">
  <div class="card" style="width: 50%;">
    <div class="card-header text-center">
      <h2>Ingresar como usuario</h2>
    </div>
    <form method="post" action="<?php echo base_url(); ?>Login_controller/auth">
      <div class="card-body">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input name="email" type="email" class="form-control" value="<?php echo set_value('email')?>" placeholder="correo@algo.com">
          <!-- Mostrar mensaje de error personalizado para el campo 'email' -->
          <div class="text-danger"><?= session('validation') ? session('validation')->getError('email') : '' ?></div>
        </div>
        <div class="mb-3">
          <label for="pass" class="form-label">Password</label>
          <input name="pass" type="password" class="form-control" placeholder="contraseña">
          <!-- Mostrar mensaje de error personalizado para el campo 'pass' -->
          <div class="text-danger">
            <?= session('validation') ? session('validation')->getError('pass') : '' ?>
            <?= session('msg') ?: '' ?> <!-- Mostrar mensaje de error personalizado general -->
          </div>
        </div>

        <button type="submit" class="btn btn-success">Ingresar</button>
        <input type="reset" value="Cancelar" class="btn btn-danger">
        <a href="<?php echo base_url('/registro'); ?>" class="btn btn-primary float-end">Registrarse</a>
      </div>
    </form>
  </div>
</div>

