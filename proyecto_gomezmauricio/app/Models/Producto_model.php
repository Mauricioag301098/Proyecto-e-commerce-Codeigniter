<?php

namespace App\Models;

use CodeIgniter\Model;

class Producto_model extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre_prod', 'descripcion_prod', 'imagen', 'categoria_id', 'precio', 'precio_vta', 'stock', 'stock_min', 'eliminado'];

    public function getBuilderProductos()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('productos');

        $builder->select('*');

        $builder->join('categorias', 'categorias.id = productos.categoria_id');

        return $builder;
    }

    public function getProducto($id = null)
    {
        $builder = $this->getBuilderProductos();

        $builder->where('productos.id', $id);

        $query = $builder->get();

        return $query->getRowArray();
    }

    public function updateStock($id = null, $stock_actual = null)
    {
        $builder = $this->getBuilderProductos();

        $builder->where('productos.id', $id);

        $builder->set('productos.stock', $stock_actual);

        $builder->update();
    }
    
    public function getProductsByCategory($categoriaId)
    {
        return $this->where('categoria_id', $categoriaId)->where('eliminado', 'NO')->findAll();
    }

    public function obtenerProductosAlAzar($cantidad)
    {
        return $this->orderBy('RAND()')->limit($cantidad)->findAll();
    }
    
}