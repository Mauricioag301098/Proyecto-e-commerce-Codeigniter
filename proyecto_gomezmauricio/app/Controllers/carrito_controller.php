<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuarios_model;
use App\Models\Producto_Model;
Use App\Models\Ventas_cabecera_model;
Use App\Models\Ventas_detalle_model;

//namespace CodeIgniterCart;

class carrito_controller extends BaseController{

	public function __construct()
    {
    	helper(['form', 'url','cart']);
      
       $session = session();
       $cart = \Config\Services::cart();
       $cart->contents();
    } 
    
    
	public function catalogo(){
		
     $session=session();
    
		 $dato = array('titulo' => 'Todos los Productos');
		 $productoModel = new Producto_Model();
		 $data['producto'] = $productoModel->orderBy('id', 'DESC')->findAll();
         
      echo view('front/header', $dato);
      echo view('front/navbar');
      echo view('front/catalogo',$data);
      echo view('front/footer');
	
	}
   //muestro el carrito
    public function muestra() {

              
         $session = session();
         $cart = \Config\Services::cart();
         $cart = $cart->contents();
                           
         $dato['titulo'] = 'Confirmar compra';
          echo view('front/header', $dato);
          echo view('front/navbar');
          echo view('back/carrito/carrito_parte_view');
          echo view('front/footer');

    }
    //agrega items al carrito
  public function add() {

        $cart = \Config\Services::Cart();
        $request = \Config\Services::request();
      
        $cart->insert(array(
        'id'      =>  $request->getPost('id'),
        'qty'     =>  1,
        'name'    => $request->getPost('nombre_prod'),
        'price'   => $request->getPost('precio_vta'),
       
        ));
       
        return redirect()->to(base_url('catalogo'));
    }
  
    public function remove($rowid) {
   
         $cart = \Config\Services::Cart();
         $request = \Config\Services::request();
   //Si $rowid es "all" destruye el carrito
    if ($rowid==="all")
    {
      $cart->destroy();
    }
    else //Sino destruye sola fila seleccionada
    { 
       $cart->remove($rowid);
    }
     // Redirige a la misma página que se encuentra
   return redirect()->back()->withInput();
  }
   
      
  //Actualiza el carrito que se muestra
  public function actualiza_carrito()
    {        
        $cart = \Config\Services::Cart();
     
         $request = \Config\Services::request();
    
          $cart->update(array(
            'id'      => $request->getPost('id'),
            'qty'     =>  1,
            'price'   => $request->getPost('precio_Vta'),
            'name'    => $request->getPost('nombre_prod'),
   
    ));
        return redirect()->back()->withInput();
}
    
   	public function carroCompra(){

 		      $session=session();
          $cart = \Config\Services::Cart();

          $productoModel = new Producto_Model();
          $data['producto'] = $productoModel->findAll();
          $data['cart'] = $this->request->getVar('cart');
                  
		      $dato = array('titulo' => 'Todos los Productos');
		       
          echo view('front/header', $dato);
          echo view('front/navbar');
          echo view('back/carrito/carrito_parte_view',$data);
          echo view('front/footer');
 }    

   public function devolver_carrito(){
        $cart = \Config\Services::cart();
        return $cart->contents();
    }

 public function eliminar_carrito(){
        $cart = \Config\Services::cart();
        $session = session();

        $cart->destroy();
        $session->set('cart', 0);

        return redirect()->to(base_url('muestro'));
    }


 public function borrar_carrito()
{
    $cart = \Config\Services::cart();//para que incluya el $cart
    $cart->destroy();

  return redirect()->to(base_url('muestro'));

}

public function restar_carrito(){
           $cart = \Config\Services::cart();
            $productos = $cart->contents();
             $cantidad = $cart->getItem($this->request->getGet("id"))["qty"];
        
        if($cantidad > 1){ 
            $cart->update(array(
                "rowid" => $this->request->getGet("id"),
                "qty" => $cantidad-1
            ));
        }
        return redirect()->back()->withInput();
       // return redirect()->route('panel_carrito');
    }

   public function sumar_carrito(){
        $cart = \Config\Services::cart();

        $cantidad = $cart->getItem($this->request->getGet("id"))["qty"];
        $cantidadMax = $cart->getItem($this->request->getGet("id"))["stock"];
        
        if($cantidad < $cantidadMax){ 
            $cart->update(array(
                "rowid" => $this->request->getGet("id"),
                "qty" => $cantidad+1
            ));
        }
        return redirect()->back()->withInput();
       // return redirect()->route('panel_carrito');
    }

}

	