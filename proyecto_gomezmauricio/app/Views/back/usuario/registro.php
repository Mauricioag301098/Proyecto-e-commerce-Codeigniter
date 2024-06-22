<div>
  <!--recuperamos datos con la función Flashdata para mostrarlos-->
  <?php if (session()->getFlashdata('success')) {
      echo "
        <div class='mt-3 mb-3 ms-3 me-3 h4 text-center alert alert-success alert-dismissible'>
          <button type='button' class='btn-close' data-bs-dismiss='alert'></button>" . session()->getFlashdata('success') . "
        </div>";
    } ?>
</div>
   <!-- php $validación = \Config\Services::validación(); Esto carga automáticamente el archivo Config\Validation que contiene configuraciones para incluir múltiples conjuntos de reglas -->
    <?php $validation = \Config\Services::validation(); ?>

<div class="container mt-1 mb-1 d-flex justify-content-center productos-destacados">
  <div class="card" style="width: 50%;">
    <div class="card-header text-center">
      <!-- titulo del formulario-->
      <h2>Registrar usuario</h2>
    </div>
      <!-- envio de datos a la ruta /enviar-form -->
    <form method="post" action="<?php echo base_url() ?>/registro_controller/formValidation">
      <div class="card-body" media="(max-width:768px)">
        <div class="mb-2">
          <label for="nombre" class="form-label">Nombre</label>
          <!-- ingreso sel nombre-->
          <input name="nombre" type="text" class="form-control" value="<?php echo set_value('nombre')?>" placeholder="Nombre">
          <!-- Error -->
          <?php if ($validation->getError('nombre')) { ?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('nombre'); ?>
            </div>
          <?php } ?>
        </div>
        <div class="mb-3">
          <label for="apellido" class="form-label">Apellido</label>
          <input type="text" name="apellido" class="form-control" value="<?php echo set_value('apellido')?>" placeholder="Apellido">
          <!-- Error -->
          <?php if ($validation->getError('apellido')) { ?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('apellido'); ?>
            </div>
          <?php } ?>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input name="email" type="email" class="form-control" value="<?php echo set_value('email')?>"  placeholder="correo@algo.com">
          <!-- Error -->
          <?php if ($validation->getError('email')) { ?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('email'); ?>
            </div>
          <?php } ?>
        </div>
        <div class="mb-3">
          <label for="usuario" class="form-label">Usuario</label>
          <input type="text" name="usuario" value="<?php echo set_value('usuario')?>" class="form-control" placeholder="Usuario">
          <!-- Error -->
          <?php if ($validation->getError('usuario')) { ?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('usuario'); ?>
            </div>
          <?php } ?>
        </div>

        <div class="mb-3">
          <label for="pass" class="form-label">Password</label>
          <input name="pass" type="password" class="form-control" placeholder="Contraseña (mínimo 5 caracteres)">
          <!-- Error -->
          <?php if ($validation->getError('pass')) { ?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('pass'); ?>
            </div>
          <?php } ?>
        </div>
        <button type="submit" class="btn btn-success">Registrarse</button>
        <input type="reset" value="Cancelar" class="btn btn-danger">
      </div>
    </form>
  </div>
</div>