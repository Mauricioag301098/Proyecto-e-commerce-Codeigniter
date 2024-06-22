  <!-- Formulario para crear categorías -->
  <div class="container mt-4 productos-destacados">
        <form action="<?= site_url('/crear-categoria') ?>" method="POST">
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Categoría</button>
        </form>
    </div>