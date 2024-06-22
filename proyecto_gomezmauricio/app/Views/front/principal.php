<title>Inicio</title>

<style>
    .card-img-top {
        height: 300px; /* Establece la altura deseada */
        width: auto; /* Deja que el ancho se ajuste automáticamente */
    }
</style>

<h1 class="title" style="margin-top: 10px;">Miaulandia</h1>
<h2 class="title" style="margin-top: 10px;">petshop</h2>



<div class="container">
    <div class="row">
        <div class="col">
            <a href="<?php echo base_url('catalogo');?>"><img src="assets/img/banner.jpg" alt="Banner principal" class="img-fluid" style="margin-top: 20px;"></a>
        </div>
    </div>
    <div class="row mt-4 productos-destacados">
    <div class="col">
        <h2>Productos destacados</h2>
        <hr><br>
        <div class="row">
    <?php foreach (array_slice($productosDestacados, 0, 4) as $producto) : ?>
        <div class="col-3">
            <div class="card">
            <img src="<?php echo base_url('assets/img/') . $producto['imagen']; ?>" class="card-img-top custom-image-size" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $producto['nombre_prod']; ?></h5>
                    <p class="card-text"><?php echo $producto['descripcion_prod']; ?></p>
                    <a href="<?php echo base_url('catalogo');?>" class="btn btn-primary">ver</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
    </div>
</div>

<div class="container contenido" >
    <div class="row">
        <div class="col">
<div class="row mt-4 productos-destacados">
        <div class="col">
        <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets\img\balanceado-para-perros-atos-x20kg.webp" class="d-block img-fluid" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets\img\img-nov26-1.jpg" class="d-block img-fluid" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets\img\im2.jpg" class="d-block img-fluid" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </div>
</div>
</div>
    </div>
</div>
