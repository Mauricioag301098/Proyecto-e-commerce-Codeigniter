<?php
// Obtiene todas las categorías
$categoriaModel = new \App\Models\Categoria_model();
$categorias = $categoriaModel->findAll();

// Selecciona la categoría actual, si está definida
$categoriaSeleccionada = isset($categoriaSeleccionada) ? $categoriaSeleccionada : null;
?>

<link rel="stylesheet" href="assets/css/estilos_catalogo.css">
<div class="container">
    <div class="row mt-4 productos-destacados">
        <!-- Columna de las categorías -->
        <div class="col-md-3">
            <h3>Categorías</h3>
            <ul class="list-group">
                <li class="list-group-item <?= empty($categoriaSeleccionada) ? 'active' : '' ?>">
                    <a href="<?= site_url('catalogo') ?>">Todas las categorías</a>
                </li>
                <?php foreach ($categorias as $categoria): ?>
                    <li class="list-group-item <?= ($categoriaSeleccionada == $categoria['id']) ? 'active' : '' ?>">
                        <a href="<?= site_url('catalogo?categoria=' . $categoria['id']) ?>"><?= $categoria['descripcion'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- Columna de los productos -->
        <div class="col-md-9">
            <h2>Nuestros Productos</h2>
            <hr><br>
            <div class="row justify-content-start">
                <?php
                // Verificar si hay productos disponibles
                if (empty($productos)) {
                    echo '<p class="text-center">No hay productos disponibles</p>';
                } else {
                    // Recorre los productos y muestra las cards
                    foreach ($productos as $index => $producto) {
                        // Verificar si el producto está marcado como eliminado y si pertenece a la categoría seleccionada
                        if ($producto['eliminado'] === 'NO' && ($categoriaSeleccionada == $producto['categoria_id'] || empty($categoriaSeleccionada))) {
                            $nombreProd = $producto['nombre_prod'];
                            $descripcionProd = $producto['descripcion_prod'];
                            $imagen = $producto['imagen'];
                            $precio = $producto['precio_vta'];
                            $stock = $producto['stock'];
                            $stock_min = $producto['stock_min'];

                            // Genera una card para cada producto
                            echo '
                            <div class="col-3 mb-4">
                                <div class="card">
                                    <img src="assets/img/' . $imagen . '" class="card-img-top custom-image-size" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $nombreProd . '</h5>
                                        <p class="card-text">' . $descripcionProd . '</p>';

                            // Verificar el stock y mostrar el botón correspondiente
                            if ($stock == 0) {
                                echo '
                                        <a href="#" class="btn btn-outline-secondary">Sin stock</a>';
                            } else {
                                echo '
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-stock="' . $stock . '" data-precio="' . $precio . '" data-id="' . $producto['id'] . '" data-nombre_prod="' . $nombreProd . '" data-precio_vta="' . $precio . '">Ver</a>';
                            }

                            echo '
                                    </div>
                                </div>
                            </div>';

                            // Si es el último elemento de la fila actual, cierra el div y abre uno nuevo
                            if (($index + 1) % 4 === 0) {
                                echo '</div><div class="row justify-content-start">';
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles del producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <img id="producto-imagen" src="" alt="Imagen del producto">
                        </div>
                        <div class="col-6">
                            <h4 id="producto-nombre"></h4>
                            <p id="producto-descripcion"></p>
                            <p id="producto-stock"></p>
                            <p id="producto-precio" style="font-weight: bold;"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary" id="btn-add-to-cart">Agregar al carrito</a>
                </div>
            </div>
        </div>
    </div>
</div>

