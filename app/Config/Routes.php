<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/noticias', 'Noticias::index');

$routes->get('/economia', 'Home::economia');
/*Ejemplo ruta con parametros string - num
$routes->get('/noticias/(:alpha)/(:num)','Noticias::cat/$1/$2');
*/