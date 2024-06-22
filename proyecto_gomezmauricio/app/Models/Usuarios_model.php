<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios_model extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'apellido', 'usuario', 'email', 'pass', 'baja', 'created_at'];

    public function verificarCredenciales($username, $password)
    {
        // Buscar al usuario por nombre de usuario y contraseña
        $usuario = $this->where('usuario', $username)
            ->where('pass', $password)
            ->first();

        // Devolver el usuario si las credenciales son válidas, o NULL si no lo son
        return $usuario;
    }

    // public function getBuilderUsuarios()
    // {
    //     $db = \Config\Database::connect();

    //     $builder = $db->table('usuarios');

    //     $builder->select('*');

    //     $builder->join('perfiles', 'perfiles.id = usuarios.perfil_id');

    //     return $builder;
    // }
}