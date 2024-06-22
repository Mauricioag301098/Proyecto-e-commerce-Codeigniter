<?php 
namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;
use App\Models\Categoria_model;

class Panel_controller extends Controller
{
    public function index()
    {

        $session = session(); //Sesion iniciada.
        $nombre=$session->get('usuario'); //Nombre del usuario que inicio sesion guardada como variable.
        $perfil=$session->get('perfil_id');//Id del usuario que inicio sesion guardada como variable.
        $data['perfil_id']=$perfil;    
        $data['nombre']=$nombre; 
        $dato["title"]="Panel del Usuario";
        echo view('front/header',$data);
        echo view('front/navbar');
        echo view ('back/login/login2',$data); //Conexion de la varialbe con el nombre y el id.
        echo view('front/footer');       
     }

    public function panel()
    {
    $usuarioId = session()->get('id'); // Obtiene el ID del usuario desde la sesión
    $ventasDetalleModel = new Ventas_detalle_model();
    $ventasCabeceraModel = new Ventas_cabecera_model();
    $session = session(); //Sesion iniciada.
    $nombre=$session->get('usuario'); //Nombre del usuario que inicio sesion guardada como variable.
    $perfil=$session->get('perfil_id');//Id del usuario que inicio sesion guardada como variable.
    // Obtener todas las ventas del usuario
    $ventas = $ventasCabeceraModel->where('usuario_id', $usuarioId)->findAll();

    // Obtener detalles de cada venta
    foreach ($ventas as &$venta) {
        $venta['detalles'] = $ventasDetalleModel->getDetalles($venta['id']);
    }

    // Cargar la vista del panel de usuario y pasar los datos de las ventas
    $data['perfil_id']=$perfil;    
    $data['nombre']=$nombre; 
    $dato["title"]="Panel del Usuario";
    echo view('front/header',$data);
    echo view('front/navbar');
    echo view('back/usuario/panel_usuario.php', ['ventas' => $ventas]);
    echo view('front/footer');    
    }
}

