<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//$routes->get('/noticias', 'Noticias::index');
$routes->get('/ingreso', 'Home::ingreso');
$routes->post('/login', 'Home::login');
//$routes->get('productos/monitores', 'Productos::monitores');

/*Ejemplo ruta con parametros string - num
$routes->get('/noticias/(:alpha)/(:num)','Noticias::cat/$1/$2');
*/