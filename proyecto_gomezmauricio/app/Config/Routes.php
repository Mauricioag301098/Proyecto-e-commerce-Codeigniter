<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/inicio', 'Home::index');
$routes->get('/contacto', 'Home::contacto');
$routes->get('/quienessomos', 'Home::quienes_somos');
$routes->get('/terminosyusos', 'Home::terminos_y_usos');
$routes->get('/catalogo', 'Home::catalogo');
$routes->get('/comercializacion','Home::comercializacion');


//Rutas de Productos
$routes->get('/lista-productos', 'Producto_controller::index', ['filter' => 'authAdmin']);
// $routes->get('/agregar', 'Producto_controller::contacto');
$routes->get('/agregar', 'Producto_controller::creaproducto', ['filter' => 'authAdmin']);
$routes->post('/guardar-producto', 'Producto_controller::store', ['filter' => 'authAdmin']);
$routes->match(['get', 'post'],'/editar/(:num)', 'Producto_controller::singleproducto/$1', ['filter' => 'authAdmin']);
$routes->match(['get', 'post'],'/crear-categoria/(:num)','Producto_controller::crearCategoria', ['filter' => 'authAdmin']);
$routes->post('/modifica/(:num)', 'Producto_controller::modifica/$1', ['filter' => 'authAdmin']);
$routes->delete('eliminar/(:num)', 'Producto_controller::deleteproducto/$1', ['filter' => 'authAdmin']);
$routes->patch('deshabilitar/(:num)', 'Producto_controller::deshabilitar/$1', ['filter' => 'authAdmin']);
$routes->patch('habilitar/(:num)', 'Producto_controller::habilitarProducto/$1', ['filter' => 'authAdmin']);
$routes->get('/eliminados', 'Producto_controller::eliminados', ['filter' => 'authAdmin']);
$routes->get('/alta-producto', 'Producto_controller::altaProducto', ['filter' => 'authAdmin']);
$routes->get('activar/(:num)', 'Producto_controller::activarproducto/$1', ['filter' => 'authAdmin']);


//CRUD de Usuarios
$routes->get('users-list', 'Usuario_controller::index', ['filter' => 'authAdmin']);
$routes->get('delete/(:num)', 'Usuario_controller::delete/$1', ['filter' => 'authAdmin']);
$routes->post('habilitar-usuario/(:num)', 'Usuario_controller::habilitarUsuario/$1', ['filter' => 'authAdmin']);
$routes->post('deshabilitar-usuario/(:num)', 'Usuario_controller::deshabilitarUsuario/$1', ['filter' => 'authAdmin']);
$routes->get('edit-view/(:num)', 'Usuario_controller::singleUser/$1', ['filter' => 'authAdmin']);
$routes->post('update', 'Usuario_controller::update', ['filter' => 'authAdmin']);

//Ruta de Consultas
$routes->post('/guardar-consulta', 'Consultas_controller::guardarConsulta');
$routes->get('/consultas', 'Consultas_controller::index',['filter' => 'authAdmin']);


//Rutas del Carrito
$routes->get('/todos_p','carrito_controller::catalogo',['filter'=>'auth']);
$routes->get('/muestro','carrito_controller::muestra',['filter'=>'auth']);
$routes->get('/carrito_actualiza','carrito_controller::actualiza_carrito',['filter'=>'auth']);
$routes->get('ventas/factura/(:num)', 'Ventas_controller::factura/$1');
$routes->match(['get', 'post'], '/carrito-agrega', 'carrito_controller::add');
$routes->get('carrito_elimina/(:any)','carrito_controller::remove/$1',['filter'=>'auth']);
$routes->get('/borrar','carrito_controller::borrar_carrito',['filter'=>'auth']);
$routes->get('/carrito-comprar', 'Ventas_controller::registrar_venta',['filter'=>'auth']);


/*rutas del login y registro*/
$routes->get('/registro', 'registro_controller::index');
$routes->match(['get', 'post'], 'registro_controller/formValidation', 'registro_controller::formValidation');
$routes->match(['get', 'post'], 'Login_controller/auth', 'Login_controller::auth');
$routes->get('/login', 'Login_controller::index');
$routes->get('/panel', 'Panel_controller::index',['filter' => 'auth']);
$routes->get('/panel-usuario', 'Panel_controller::panel');
$routes->get('/logout', 'Login_controller::logout');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
