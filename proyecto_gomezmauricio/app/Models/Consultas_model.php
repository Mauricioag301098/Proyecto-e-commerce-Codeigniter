<?php
namespace App\Models;
use CodeIgniter\Model;

class Consultas_model extends Model
{
    protected $table = "consultas";
    protected $primaryKey = "id_consulta";
    protected $allowedFields = ["nombre","apellido","email","telefono","respuesta","mensaje"];
}