<?php

namespace App\Controllers;

use App\Models\Producto_model;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;
use App\Models\Categoria_model;

class Ventas_controller extends BaseController
{

    private $cart;
    private $productos_modelo;
    private $venta_modelo;
    private $detalleventa_modelo;


    public function __construct()
    {
        $this->cart = \Config\Services::cart();
        $this->productos_modelo = new Producto_model();
        $this->venta_modelo = new Ventas_cabecera_model();
        $this->detalleventa_modelo = new Ventas_detalle_model();
    }

    public function factura($venta_id)
    {
        $detalle_ventas = new Ventas_detalle_model();
        $data['ventaDetalle'] = $detalle_ventas->getDetalles($venta_id);

        $productoModel = new Producto_model();
        $data['productoModel'] = $productoModel;

        echo view('front/header');
        echo view('front/navbar');
        echo view('back/carrito/factura', $data);
        echo view('front/footer');
    }

    public function registrar_venta()
    {
        $cart = \Config\Services::cart();
        $productos = $cart->contents();
        $request = \Config\Services::request();
        $montoTotal = 0;

        foreach ($productos as $producto) {
            $montoTotal += $producto["price"] * $producto["qty"];
        }

        $ventaCabecera = new Ventas_cabecera_model();
        $id_session = intval(session()->id);

        $fechaActual = date('Y-m-d H:i:s'); // Obtener la fecha actual en el formato deseado

        $idcabecera = $ventaCabecera->insert([
            "total_venta" => $montoTotal,
            "usuario_id" => $id_session,
            "fecha" => $fechaActual // Agregar la fecha actual al array de datos
        ]);
        $ventaDetalle = new Ventas_detalle_model();
        $productModel = new Producto_model();

        foreach ($productos as $producto) {
            $ventaDetalle->insert([
                "venta_id" => $idcabecera,
                "producto_id" => $producto['id'],
                "cantidad" => $producto["qty"],
                "precio" => $producto["price"]
            ]);
            $productStock = $productModel->find($producto["id"]); // Obtener los detalles del producto

            $stock = $productStock["stock"]; // Obtener el stock del producto
            // Restar la cantidad del carrito al stock actual
            $newStock = $stock - $producto["qty"];

            $productModel->update($producto["id"], ['stock' => $newStock]);
        }
        $cart->destroy();

        // Redirigir a la página de la factura con el ID de la venta como parámetro
        return redirect()->to(base_url('ventas/factura/' . $idcabecera));
    }
}
