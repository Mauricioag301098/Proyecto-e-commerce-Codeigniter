<?php

namespace App\Controllers;

use App\Models\Consultas_model;
use CodeIgniter\Controller;

class Consultas_controller extends Controller
{
    public function index()
    {
        // Crea una instancia del modelo Consultas_model
        $consultasModel = new Consultas_model();

        // Obtén todas las consultas de la base de datos
        $consultas = $consultasModel->findAll();

        echo view('front/header');
        echo view('front/navbar');
        echo view('back/panel', ['consultas' => $consultas]);
        echo view('front/footer');
    }

    public function guardarConsulta()
    {
        // Cargar el Helper de Validación
        helper(['form', 'url']);

        // Configurar Reglas de Validación
        $rules = [
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'telefono' => 'required|min_length[10]|numeric',
            'mensaje' => 'required|min_length[10]',
        ];

        // Configurar Mensajes de Validación
        $messages = [
            'nombre' => [
                'required' => 'El campo de nombre es obligatorio.',
                'min_length' => 'El nombre debe tener al menos 3 caracteres.',
            ],
            'apellido' => [
                'required' => 'El campo de apellido es obligatorio.',
                'min_length' => 'El apellido debe tener al menos 3 caracteres.',
            ],
            'email' => [
                'required' => 'El campo de correo electrónico es obligatorio.',
                'valid_email' => 'Ingresa un correo electrónico válido.',
            ],
            'telefono' => [
                'required' => 'El campo de teléfono es obligatorio.',
                'min_length' => 'El teléfono debe tener al menos 10 dígitos.',
                'numeric' => 'El teléfono debe ser numérico.',
            ],
            'mensaje' => [
                'required' => 'El campo de mensaje es obligatorio.',
                'min_length' => 'El mensaje debe tener al menos 10 caracteres.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            // Si la validación falla, regresa con los errores
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Si la validación pasa, guarda los datos en la base de datos
        $consultasModel = new Consultas_model();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'telefono' => $this->request->getPost('telefono'),
            'mensaje' => $this->request->getPost('mensaje'),
        ];
        $consultasModel->insert($data);

        // Redirige a la página de éxito o agradecimiento
        return redirect()->to('/contacto')->with('message', 'Gracias por escribirnos.');
    }
}
