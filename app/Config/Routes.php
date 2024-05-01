<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//$routes->get('/noticias', 'Noticias::index');
$routes->get('/ingreso', 'Home::ingreso');
$routes->post('/rormularios/login', 'Home::login');
$routes->get('/formularios/recuperar_contra', 'Home::recuperar');
#categorias
$routes->get('/categorias/economia', 'Home::economia');
$routes->get('/categorias/turismo', 'Home::turismo');
$routes->get('/categorias/deporte', 'Home::deporte');
$routes->get('/categorias/politica', 'Home::politica');

//$routes->get('productos/monitores', 'Productos::monitores');

/*Ejemplo ruta con parametros string - num
$routes->get('/noticias/(:alpha)/(:num)','Noticias::cat/$1/$2');
*/