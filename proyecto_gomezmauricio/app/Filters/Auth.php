<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! session()->get('isLoggedIn'))
        {
            return redirect()
                ->to('/login');
        }
    }

    protected function isLoggedInAsAdmin(): bool
    {
        $id = $this->session->get('id');
        if ($id) {
            $usuarioModel = new \App\Models\Usuarios_model();
            $usuario = $usuarioModel->find($id);
            if ($usuario && $usuario['perfil_id'] == 1) {
                return true;
            }
        }

        return false;
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}
