<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// vista con el formilario
$routes->get('/', 'Home::index');



$routes->post('/auth/login', 'AuthController::login');
$routes->get('/auth/logout', 'AuthController::logout');


// lógica para el login
$routes->post('/login', 'AuthController::login');
$routes->get('/auth/logout', 'AuthController::logout');

$routes->get('/menu', 'AuthController::menu');
//ruta para cargar vistas

$routes->get('/persona', 'PersonaController::index');
$routes->get('/persona/crear', 'PersonaController::crear');
$routes->post('/persona/registrar', 'PersonaController::registrar');
$routes->get('/persona/editar/(:num)', 'PersonaController::editar/$1');
$routes->post('/persona/actualizar/(:num)', 'PersonaController::actualizar/$1');
$routes->get('/persona/eliminar/(:num)', 'PersonaController::eliminar/$1');

$routes->get('/material', 'MaterialController::index');
$routes->get('/material/crear', 'MaterialController::crear');
$routes->post('/material/registrar', 'MaterialController::registrar');
$routes->get('/material/editar/(:num)', 'MaterialController::editar/$1');
$routes->post('/material/actualizar/(:num)', 'MaterialController::actualizar/$1');
$routes->get('/material/eliminar/(:num)', 'MaterialController::eliminar/$1');

$routes->get('/comprarenta/crear', 'ComprarentaController::crear');
$routes->post('/comprarenta/registrar', 'ComprarentaController::registrar');

$routes->get('/venta', 'VentaController::index');
$routes->get('/venta/crear', 'VentaController::crear');
$routes->post('/venta/registrar', 'VentaController::registrar');
$routes->get('/venta/editar/(:num)', 'VentaController::editar/$1');
$routes->post('/venta/actualizar/(:num)', 'VentaController::actualizar/$1');
$routes->get('/venta/eliminar/(:num)', 'VentaController::eliminar/$1');
$routes->get('/venta/detalle/(:num)', 'VentaController::detalle/$1');

$routes->get('/reportes', 'Home::reportes');
$routes->get('/reportes/materiales-renta', 'Home::materialesrenta');
$routes->get('/reportes/historial-usuarios', 'Home::historialusuarios');
$routes->get('/reportes/materiales-pedidos-rentados', 'Home::materialespedidosrentados');
$routes->get('/reportes/dueño-material', 'Home::duenomaterial');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
