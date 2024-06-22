<?php

namespace App\Controllers;
use App\Models\Producto_model;
use App\Models\Categoria_model;
use CodeIgniter\Controller;

class Home extends BaseController
{
    // public function index()
    // {
    //     return view('welcome_message');
    // }

    public function index()
    {
        $productoModel = new Producto_model();
        // Lógica para obtener cuatro productos al azar de la base de datos
        $productosDestacados = $productoModel->obtenerProductosAlAzar(4); // Suponiendo que tienes un método en tu modelo para obtener productos al azar

        // Pasar los productos a la vista
        $productos['productosDestacados'] = $productosDestacados;

        $data['titulo']='principal';
        echo view('front/header', $data);
        echo view('front/navbar');
        echo view('front/principal', $productos);
        echo view('front/footer');
    }



    public function contacto()
    {
        $data['titulo']='contacto';
        echo view('front/header', $data);
        echo view('front/navbar');
        echo view('front/contacto');
        echo view('front/footer');
    }

    public function quienes_somos()
    {
        $data['titulo']='quienes somos';
        echo view('front/header', $data);
        echo view('front/navbar');
        echo view('front/quienes_somos');
        echo view('front/footer');
    }

    public function terminos_y_usos()
    {
        $data['titulo']='terminos y condiciones';
        echo view('front/header', $data);
        echo view('front/navbar');
        echo view('front/terminos');
        echo view('front/footer');
    }

    public function catalogo()
    {
        $productoModel = new Producto_model();
        $categoriaModel = new Categoria_model();
    
        // Obtén todas las categorías
        $data['categorias'] = $categoriaModel->getCategorias();
    
        // Verifica si se ha seleccionado una categoría
        $categoriaSeleccionada = $this->request->getGet('categoria');
    
        // Obtén los productos según la categoría seleccionada
        if ($categoriaSeleccionada) {
            $data['productos'] = $productoModel->getProductsByCategory($categoriaSeleccionada);
        } else {
            // Si no hay categoría seleccionada, obtén todos los productos
            $data['productos'] = $productoModel->where('eliminado', 'NO')->findAll();
        }
    
        // Pasa las categorías y la categoría seleccionada a la vista
        $data['categoriaSeleccionada'] = $categoriaSeleccionada;
    

        $data['titulo']='catalogo';
        echo view('front/header', $data);
        echo view('front/navbar');
        echo view('front/catalogo', $data);
        echo view('front/footer');
    }

    public function comercializacion()
    {
        $data['titulo']='comercializacion';
        echo view('front/header', $data);
        echo view('front/navbar');
        echo view('front/comercializacion');
        echo view('front/footer');
    }
}
