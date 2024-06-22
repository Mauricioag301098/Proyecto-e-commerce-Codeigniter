<?php

namespace App\Controllers;

use App\Models\Usuarios_model;
use CodeIgniter\Session\Session;

class Usuario_controller extends BaseController
{

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    // Muestra lista de usuarios
    public function index()
    {
        // // Verificar si el usuario está logueado como admin
        // if (!$this->isUserAdmin()) {
        //     return redirect()->to('login')->with('error', 'Debes iniciar sesión como administrador');
        // }

        $usuariosModel = new Usuarios_model();
        $data['users'] = $usuariosModel->orderBy('id', 'ASC')->findAll();
        $data['title'] = "Ver usuarios";
        echo view("front/header", $data);
        echo view("front/navbar");
        echo view("back/usuario/usuarios_view", $data);
        echo view("front/footer");
    }


    // Mostrar un usuario individual
    public function singleUser($id = null)
    {
        // Verificar si el usuario está logueado
        // if (!$this->isLoggedIn()) {
        //     return redirect()->to('login')->with('error', 'Debes iniciar sesión');
        // }

        $userModel = new Usuarios_model();
        $data['user'] = $userModel->where('id', $id)->first();
        $data["title"] = "Editar un usuario";
        echo view("front/header", $data);
        echo view("front/navbar");
        echo view("back/usuario/edit_view", $data);
        echo view("front/footer");
    }

    // Actualizar los datos del usuario
    public function update()
    {
        $userModel = new Usuarios_model();
        $id = $this->request->getVar('id');

        // Obtener el usuario actual de la base de datos
        $usuarioActual = $userModel->where('id', $id)->first();

        // Verificar si la contraseña ha sido modificada
        $contrasenaActual = $usuarioActual['pass'];
        $nuevaContrasena = $this->request->getVar('pass');

        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'email' => $this->request->getVar('email'),
            'usuario' => $this->request->getVar('usuario'),
        ];

        if ($nuevaContrasena === $contrasenaActual) {
            // La contraseña no ha sido modificada, no la actualices en la base de datos
            unset($data['pass']);
        } else {
            // La contraseña ha sido modificada, encripta la nueva contraseña
            $data['pass'] = password_hash($nuevaContrasena, PASSWORD_DEFAULT);
        }

        // Actualizar los datos en la base de datos
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/users-list'));
    }


    // Eliminar un usuario
    public function delete($id = null)
    {
        // Verificar si el usuario está logueado
        if (!$this->isLoggedIn()) {
            return redirect()->to('login')->with('error', 'Debes iniciar sesión');
        }

        $userModel = new Usuarios_model();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/users-list'));
    }

    // Iniciar sesión de usuario
    public function login(){
        // Obtener los datos de inicio de sesión enviados por el usuario
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Verificar las credenciales del usuario
        $usuarioModel = new Usuarios_model();
        $usuario = $usuarioModel->verificarCredenciales($username, $password);

        if ($usuario) {
            // Guardar el ID del usuario en la sesión
            $this->session->set('usuario_id', $usuario['id']);

            // Redirigir a la página principal o a la página deseada
            return redirect()->to('inicio');
        } else {
            // Las credenciales no son válidas, mostrar mensaje de error
            return redirect()->back()->with('error', 'Credenciales inválidas');
        }
    }

    // Cerrar sesión de usuario
    public function logout()
    {
        // Eliminar el ID del usuario de la sesión
        $this->session->remove('usuario_id');

        // Redirigir al formulario de inicio de sesión
        return redirect()->to('login')->with('success', 'Has cerrado sesión');
    }

    public function deshabilitarUsuario($id = null)
    {
    // Verifica si se ha enviado una solicitud POST o PATCH
    if ($this->request->getMethod() === 'post' || $this->request->getMethod() === 'patch') {
        $usuariosModel = new Usuarios_model();

        // Actualiza el campo "habilitado" o "activo" del usuario a 0 (deshabilitado)
        $usuariosModel->update($id, ['baja' => 'SI']);

        // Redirige a la página de lista de usuarios
        return redirect()->to('/users-list');
    }
    }

    public function habilitarUsuario($id = null)
    {
        $usuariosModel = new Usuarios_model();

        // Activar el usuario por su ID
        $usuariosModel->update($id, ['baja' => 'NO']);

        // Redirige a la página de lista de usuarios
        return redirect()->to('/users-list');
    }

    // Verificar si el usuario está logueado
    private function isLoggedIn()
    {
        return $this->session->has('usuario_id');
    }
}