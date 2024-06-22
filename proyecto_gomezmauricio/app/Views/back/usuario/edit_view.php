<div class="container mt-5 mb-5 productos-destacados">
    <form method="post" id="user" name="user" action="<?= site_url('/update') ?>">
        <input type="hidden" name="id" id="id" value="<?php echo $user['id']; ?>">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $user['nombre']; ?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>">
        </div>
        <div class="form-group">
            <label>Usuario</label>
            <input type="text" name="usuario" class="form-control" value="<?php echo $user['usuario']; ?>">
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="pass" class="form-control" value="<?php echo $user['pass']; ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger btn-block">Guardar cambios</button>
        </div>
    </form>
</div>
