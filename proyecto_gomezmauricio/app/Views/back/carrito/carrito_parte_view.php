<div class="container-fluid productos-destacados" id="carrito">
    <div class="cart">
        <div class="heading">
            <h2 id="h3" align="center">Productos en tu Carrito</h2>
        </div>
        <div class="text" align="center">
            <?php
            $session = session();
            $cart = \Config\Services::cart();
            $cartItems = $cart->contents();

            // Si el carrito está vacío, mostrar el siguiente mensaje
            if (empty($cartItems)) {
                echo 'Para agregar productos al carrito, haz click en "Comprar"';
            }
            ?>
        </div>
    </div>
    <?php if (!empty($cartItems)) : ?>
        <div class="container">
            <div class="table-responsive-sm">
                <table class="table table-bordered table-hover table-dark table-striped ml-3">
                    <tr>
                        <td>ID</td>
                        <td>nombre_prod</td>
                        <td>Precio</td>
                        <td>Cantidad</td>
                        <td>Total</td>
                        <td>Cancelar Producto</td>
                    </tr>
                    <?php
                    $gran_total = 0;
                    $i = 1;
                    foreach ($cartItems as $item) :
                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td>" . $item['name'] . "</td>";
                        echo "<td>$" . number_format($item['price'], 2) . "</td>";
                        echo "<td>" . $item['qty'] . "</td>";

                        $subtotal = $item['subtotal'];
                        echo "<td>$" . number_format($subtotal, 2) . "</td>";

                        $gran_total += $subtotal;

                        echo "<td>";
                        $icon = '<i class="fas fa-trash-alt"></i>'; // Icono de Font Awesome para el botón de eliminar
                        echo anchor('carrito_elimina/' . $item['rowid'], $icon);
                        echo "</td>";

                        echo "</tr>";
                    endforeach;
                    ?>
                    <tr class="table-light">
                        <td colspan="5">
                            <b>Total: $<?php echo number_format($gran_total, 2); ?></b>
                        </td>
                        <td colspan="5" align="center">
                            <input type="button" class="btn btn-primary btn-lg" value="Borrar Carrito" onclick="window.location = 'borrar'">
                            <input type="button" class="btn btn-primary btn-lg" value="comprar" onclick="window.location = 'carrito-comprar'">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>
<br>
