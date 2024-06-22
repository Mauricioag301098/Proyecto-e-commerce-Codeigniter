<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuarios_model;
  
class Login_controller extends BaseController
{
    public function index()
    {
        helper(['form','url']);
      
        $data["title"]="Iniciar Sesion";
        echo view('front/header',$data);
        echo view('front/navbar');
        echo view ('back/login/login');
        echo view('front/footer');     
    } 
  
    public function auth()
    {
        $session = session();
        $model = new Usuarios_model();

        // Cargar el Helper de Validación
        helper(['form', 'url', 'text']);

        // Configurar Reglas de Validación
        $rules = [
            'email' => 'required|valid_email',
            'pass' => 'required',
        ];

        // Configurar Mensajes de Validación
        $messages = [
            'email' => [
                'required' => 'El campo de correo electrónico es obligatorio.',
                'valid_email' => 'Ingresa un correo electrónico válido.',
            ],
            'pass' => [
                'required' => 'El campo de contraseña es obligatorio.',
                'valid_pass' => 'La contraseña es incorrecta'
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->to('/login')->withInput()->with('validation', \Config\Services::validation());
        }


        // Traemos los datos del formulario
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');

        $data = $model->where('email', $email)->first();

        if ($data) {
            $pass = $data['pass'];
            $ba = $data['baja'];

            if ($ba == 'SI') {
                $session->setFlashdata('msg', 'Usuario dado de baja');
                return redirect()->to('/login');
            }

            // Se verifican los datos ingresados para iniciar, si cumple la verificación inicia la sesión
            $verify_pass = password_verify($password, $pass);

            // password_verify determina los requisitos de configuración de la contraseña
            if ($verify_pass) {
                $ses_data = [
                    'id' => $data['id'],
                    'nombre' => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'email' =>  $data['email'],
                    'usuario' => $data['usuario'],
                    'perfil_id' => $data['perfil_id'],
                    'isLoggedIn'  => TRUE
                ];

                // Se se cumple la verificación inicia la sesión
                $session->set($ses_data);

                session()->setFlashdata('msg', '¡Bienvenido!');
                return redirect()->to('/panel-usuario');
            } else {
                // No pasó la validación de la contraseña
                $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'No existe el email o es incorrecto');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
} 
