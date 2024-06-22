<?php
namespace App\Controllers;

use App\Models\Usuarios_model;
use CodeIgniter\Controller;

class Registro_controller extends Controller
{
    // Muestra el formulario de registro
    public function index()
    {
        helper(['form', 'url']);

        $data["title"] = "Registro";
        echo view("front/header", $data);
        echo view("front/navbar");
        echo view("back/usuario/registro");
        echo view("front/footer");
    }

    // Procesa el formulario de registro
    public function formValidation()
    {
        // Cargar el Helper de Validación
        helper(['form', 'url']);

        // Configurar Reglas de Validación
        $rules = [
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'usuario'  => 'required|min_length[3]',
            'pass'     => 'required|min_length[3]'
        ];

        // Configurar Mensajes de Error Personalizados
        $messages = [
            'nombre' => [
                'required' => 'El campo de nombre es obligatorio.',
                'min_length' => 'El campo de nombre debe tener al menos 3 caracteres.'
            ],
            'apellido' => [
                'required' => 'El campo de apellido es obligatorio.',
                'min_length' => 'El campo de apellido debe tener al menos 3 caracteres.',
                'max_length' => 'El campo de apellido no debe tener más de 25 caracteres.'
            ],
            'email' => [
                'required' => 'El campo de correo electrónico es obligatorio.',
                'min_length' => 'El campo de correo electrónico debe tener al menos 4 caracteres.',
                'max_length' => 'El campo de correo electrónico no debe tener más de 100 caracteres.',
                'valid_email' => 'Ingresa un correo electrónico válido.',
                'is_unique' => 'Este correo electrónico ya está registrado.'
            ],
            'usuario' => [
                'required' => 'El campo de usuario es obligatorio.',
                'min_length' => 'El campo de usuario debe tener al menos 3 caracteres.'
            ],
            'pass' => [
                'required' => 'El campo de contraseña es obligatorio.',
                'min_length' => 'El campo de contraseña debe tener al menos 3 caracteres.'
            ],
        ];

        // Validar el formulario
        if (!$this->validate($rules, $messages)) {
            $data["title"] = "Registro";
            echo view('front/header', $data);
            echo view('front/navbar');
            echo view('back/usuario/registro', ['validation' => $this->validator]);
            echo view('front/footer');
        } else {
            // Guardar el usuario en la base de datos
            $formModel = new Usuarios_model();
            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'usuario' => $this->request->getVar('usuario'),
                'email' => $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)
            ]);

            // Redirigir y mostrar mensaje de éxito
            session()->setFlashdata('success', 'Usuario registrado con éxito');
            return $this->response->redirect(site_url('/registro'));
        }
    }
}
