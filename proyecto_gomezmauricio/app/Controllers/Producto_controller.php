<?php

namespace App\Controllers;

use App\Models\Producto_model;
use App\Models\Categoria_model;
use CodeIgniter\Controller;

class Producto_controller extends Controller
{
    public function index()
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
    

        // Configura la paginación
        $perPage = 10; // Número de filas por página
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $totalRows = count($data['productos']);
        $numLinks = 2; // Número de enlaces de paginación a mostrar

        // Calcula el número total de páginas
        $totalPages = ceil($totalRows / $perPage);

        // Asegúrate de que el número de página actual sea válido
        if ($currentPage < 1) {
            $currentPage = 1;
        } elseif ($currentPage > $totalPages) {
            $currentPage = $totalPages;
        }

        // Obtiene los productos para la página actual
        $offset = ($currentPage - 1) * $perPage;
        $data['productos'] = array_slice($data['productos'], $offset, $perPage);

        // Genera los enlaces de paginación manualmente
        $data['pagination'] = $this->generatePaginationLinks($currentPage, $totalPages, $numLinks);
        
        // Pasa las categorías y la categoría seleccionada a la vista
        $data['categoriaSeleccionada'] = $categoriaSeleccionada;

        echo view('front/header');
        echo view('front/navbar');
        echo view('back/producto/lista_productos', $data);
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

    // Carga las vistas necesarias
    echo view('front/header');
    echo view('front/navbar');
    echo view('front/catalogo', $data);
    echo view('front/footer');
    }

    public function crearCategoria()
    {
        // Verifica si se ha enviado el formulario de creación
        if ($this->request->getMethod() === 'post') {
            $categoriaModel = new Categoria_model();

            // Obtén los datos del formulario
            $data = [
                'descripcion' => $this->request->getPost('descripcion')
            ];

            // Inserta los datos en la tabla categorías
            $categoriaModel->insert($data);

            // Redirige a la página de lista de productos
            return redirect()->to('/lista-productos');
        } else {
            // Si no se ha enviado el formulario, carga la vista del formulario de creación de categorías
            echo view('front/header');
            echo view('front/navbar');
            echo view('back/producto/crear_categoria');
            echo view('front/footer');
        }
    }


    // Genera los enlaces de paginación manualmente
    private function generatePaginationLinks($currentPage, $totalPages, $numLinks)
    {
    $pagination = '';

    if ($totalPages > 1) {
        $pagination .= '<ul class="pagination">';

        // Enlace a la página anterior
        if ($currentPage > 1) {
            $pagination .= '<li class="page-item"><a class="page-link" href="' . site_url('/lista-productos?page=' . ($currentPage - 1)) . '">Anterior</a></li>';
        }

        // Enlaces a las páginas individuales
        $start = max(1, $currentPage - $numLinks);
        $end = min($totalPages, $currentPage + $numLinks * 2);

        for ($i = $start; $i <= $end; $i++) {
            $isActive = ($i == $currentPage) ? ' active' : '';
            $pagination .= '<li class="page-item' . $isActive . '"><a class="page-link" href="' . site_url('/lista-productos?page=' . $i) . '">' . $i . '</a></li>';
        }

        // Enlace a la página siguiente
        if ($currentPage < $totalPages) {
            $pagination .= '<li class="page-item"><a class="page-link" href="' . site_url('/lista-productos?page=' . ($currentPage + 1)) . '">Siguiente</a></li>';
        }

        $pagination .= '</ul>';
    }

    return $pagination;
    }



    // public function contacto()
    // {
    //     // Carga la vista de contacto
    //     echo view('front/header');
    //     echo view('front/navbar');
    //     echo view('back/producto/contacto');
    //     echo view('front/footer');
    // }

    public function creaproducto()
    {
        $categoriasModel = new Categoria_model();

        $data['categorias'] = $categoriasModel->getCategorias();

        $productoModel = new Producto_model();
        $data['obj'] = $productoModel->orderBy('id','DESC')->findAll(); 
        // Carga la vista del formulario de creación de producto
        echo view('front/header');
        echo view('front/navbar');
        echo view('back/producto/crear_producto');
        echo view('front/footer');
    }

    public function store()
    {
    // Verifica si se ha enviado el formulario de creación
    if ($this->request->getMethod() === 'post') {
        $productoModel = new Producto_model();

        // Obtén los datos del formulario
        $data = [
            'nombre_prod' => $this->request->getPost('nombre_prod'),
            'descripcion_prod' =>$this->request->getPost('descripcion_prod'), 
            'categoria_id' => $this->request->getPost('categoria_id'),
            'precio' => $this->request->getPost('precio'),
            'precio_vta' => $this->request->getPost('precio_vta'),
            'stock' => $this->request->getPost('stock'),
            'stock_min' => $this->request->getPost('stock_min'),
            'eliminado' => $this->request->getPost('eliminado'),
        ];
        
        // Procesa la carga de la imagen
        $imagen = $this->request->getFile('imagen');
        if ($imagen->isValid() && !$imagen->hasMoved()) {
            // Genera un nombre único para la imagen
            $newName = $imagen->getRandomName();

            // Mueve la imagen a la ubicación de almacenamiento
            $imagen->move('assets\img', $newName);

            // Guarda el nombre de la imagen en el array de datos
            $data['imagen'] = $newName;
        }

        // Inserta los datos en la tabla productos
        $productoModel->insert($data);

        // Redirige a la página de lista de productos
        return redirect()->to('/lista-productos');
    }
    }

    public function singleproducto($id = null)
    {
    $productoModel = new Producto_model();

    // Obtiene el producto por su ID
    $data['producto'] = $productoModel->find($id);

    // Verifica si se ha enviado el formulario de edición
    if ($this->request->getMethod() === 'post') {
        // Obtén los datos del formulario
        $postData = [
            'nombre_prod' => $this->request->getPost('nombre_prod'),
            'precio' => $this->request->getPost('precio'),
            'precio_vta' => $this->request->getPost('precio_vta'),
            'stock' => $this->request->getPost('stock'),
            'stock_min' => $this->request->getPost('stock_min'),
            'eliminado' => $this->request->getPost('eliminado')
        ];

        // Procesa la carga de la imagen
        $imagen = $this->request->getFile('imagen');
        if ($imagen->isValid() && !$imagen->hasMoved()) {
            // Genera un nombre único para la imagen
            $newName = $imagen->getRandomName();

            // Mueve la imagen a la ubicación de almacenamiento
            $imagen->move('assets\img', $newName);

            // Guarda el nombre de la imagen en el array de datos
            $postData['imagen'] = $newName;
        }

        // Actualiza los datos en la tabla productos
        $productoModel->update($id, $postData);

        // Redirige a la página de lista de productos
        return redirect()->to('/lista-productos');
    }

    // Carga la vista del formulario de edición
    echo view('front/header');
    echo view('front/navbar');
    echo view('back/producto/editar_producto', $data);
    echo view('front/footer');
    }


    public function modifica($id){
    $productoModel = new Producto_Model();
    $id = $productoModel->where('id', $id)->first();

    // $img = $this->request->getFile('imagen');
    // echo $img; // Verificar el valor de $img
    // $nombre_aleatorio = $img->getRandomName();
    //  $img->move(ROOTPATH.'assets/img',$nombre_aleatorio);

     //$productoModel->update($id, ['imagen' => $nombre_aleatorio)]);

     $data = [
               'nombre_prod' => $this->request->getVar('nombre_prod'),
                // 'imagen' => $img->getName(),
                // completar con los demas campos
                'categorias_id' => $this->request->getVar('categoria'),
                'precio' => $this->request->getVar('precio'),
                'precio_vta' => $this->request->getVar('precio_vta'),
                'stock' => $this->request->getVar('stock'),
                'stock_min' => $this->request->getVar('stock_min'),
               // 'eliminado' => 'NO',
        ];
    
    $productoModel->update($id, $data);
    return $this->response->redirect(site_url('lista-productos'));
    } 

    

    public function deleteproducto($id = null)
    {
        $productoModel = new Producto_model();

        // Elimina el producto por su ID
        $productoModel->delete($id);

        // Redirige a la página de lista de productos
        return redirect()->to('/alta-producto');
    }

    public function eliminados()
    {
        $productoModel = new Producto_model();

        // Obtiene solo los productos eliminados
        $data['productos'] = $productoModel->where('eliminado', 'SI')->findAll();

        // Carga las vistas necesarias
        echo view('front/header');
        echo view('front/navbar');
        echo view('back/producto/lista_eliminados', $data);
        echo view('front/footer');
    }

    public function deshabilitar($id = null)
    {
    // Verifica si se ha enviado una solicitud POST o PATCH
    if ($this->request->getMethod() === 'post' || $this->request->getMethod() === 'patch') {
        $productoModel = new Producto_model();

        // Actualiza el campo "habilitado" o "activo" del producto a 0 (deshabilitado)
        $productoModel->update($id, ['eliminado' => 'SI']);

        // Redirige a la página de lista de productos
        return redirect()->to('/lista-productos');
    }
    }

    public function altaProducto()
    {
    $productoModel = new Producto_model();

    // Obtiene los productos deshabilitados
    $data['productos'] = $productoModel->where('eliminado', 'SI')->findAll();

    // Carga las vistas necesarias
    echo view('front/header');
    echo view('front/navbar');
    echo view('back/producto/alta_producto', $data);
    echo view('front/footer');
    }


    public function habilitarProducto($id = null)
    {
        $productoModel = new Producto_model();

        // Activar el producto por su ID
        $productoModel->update($id, ['eliminado' => 'NO']);

        // Redirige a la página de lista de productos eliminados
        return redirect()->to('/alta-producto');
    }
}
