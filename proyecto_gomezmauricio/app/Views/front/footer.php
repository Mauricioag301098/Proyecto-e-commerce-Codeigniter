<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto">
                <!-- <a href="https://wa.me/" target="_blank" rel="noopener noreferrer" class="icono-footer"><i class="fab fa-whatsapp larger-icon"></i></a>
                <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook larger-icon"></i></a>
                <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram larger-icon"></i></a> -->
            </div>
            <div>
                <a href="<?php echo base_url('terminosyusos'); ?>" class="centered-link">Términos y uso</a>
            </div>
        </div>
    </div>
</footer>


<script src="<?php echo base_url("assets/js/popper.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/fontawesome/js/all.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
<script src="<?php echo base_url("assets\js\jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets\js\bootstrap.bundle.min.js"); ?>"></script>

<script>
    var myModal = document.getElementById('exampleModal');
    myModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var cardBody = button.closest('.card-body');
        var nombreProd = cardBody.querySelector('.card-title').textContent;
        var descripcionProd = cardBody.querySelector('.card-text').textContent;
        var imagen = cardBody.previousElementSibling.src;
        var stock = button.getAttribute('data-stock');
        var precioVta = button.getAttribute('data-precio');

        var modalBody = myModal.querySelector('.modal-body');
        var productoImagen = modalBody.querySelector('#producto-imagen');
        var productoNombre = modalBody.querySelector('#producto-nombre');
        var productoDescripcion = modalBody.querySelector('#producto-descripcion');
        var productoStock = modalBody.querySelector('#producto-stock');
        var productoPrecio = modalBody.querySelector('#producto-precio');

        productoImagen.src = imagen;
        productoNombre.textContent = nombreProd;
        productoDescripcion.textContent = descripcionProd;
        productoStock.textContent = 'Stock disponible: ' + stock;
        productoPrecio.textContent = 'Precio de venta: ' + precioVta;

        var addToCartBtn = myModal.querySelector('#btn-add-to-cart');
        addToCartBtn.setAttribute('data-id', button.getAttribute('data-id'));
        addToCartBtn.setAttribute('data-nombre_prod', button.getAttribute('data-nombre_prod'));
        addToCartBtn.setAttribute('data-precio_vta', button.getAttribute('data-precio_vta'));
    });

    document.addEventListener("DOMContentLoaded", function () {
        const addToCartBtn = document.getElementById('btn-add-to-cart');
        addToCartBtn.addEventListener('click', function (event) {
            event.preventDefault();

            var button = event.target;
            var productoId = button.getAttribute('data-id');
            var nombreProd = button.getAttribute('data-nombre_prod');
            var precioVta = button.getAttribute('data-precio_vta');

            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '<?php echo base_url('carrito-agrega'); ?>';

            var inputId = document.createElement('input');
            inputId.type = 'hidden';
            inputId.name = 'id';
            inputId.value = productoId;
            form.appendChild(inputId);

            var inputNombreProd = document.createElement('input');
            inputNombreProd.type = 'hidden';
            inputNombreProd.name = 'nombre_prod';
            inputNombreProd.value = nombreProd;
            form.appendChild(inputNombreProd);

            var inputPrecioVta = document.createElement('input');
            inputPrecioVta.type = 'hidden';
            inputPrecioVta.name = 'precio_vta';
            inputPrecioVta.value = precioVta;
            form.appendChild(inputPrecioVta);

            document.body.appendChild(form);
            form.submit();
        });
    });
</script>

</html>
