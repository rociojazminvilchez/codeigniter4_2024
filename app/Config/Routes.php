<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/noticias/ingreso', 'Noticias::ingreso');
$routes->post('/noticias/login', 'Noticias::login');

$routes->get('/noticias/salir', 'Noticias::salir');
$routes->get('/', 'Noticias::salir');
$routes->get('/noticias/recuperar_contra', 'Noticias::recuperar');

#HISTORIAL
$routes->get('/noticias/(:num)/historial', 'Noticias::historial');
$routes->get('/noticias/(:num)/original', 'Noticias::original');

$routes->get('/noticias/editar', 'Noticias::editar');

#historial


#categorias
$routes->get('/categorias/economia', 'Noticias::economia');
$routes->get('/categorias/turismo', 'Noticias::turismo');
$routes->get('/categorias/deporte', 'Noticias::deporte');
$routes->get('/categorias/politica', 'Noticias::politica');

$routes->get('/panel/validar', 'Noticias::validar');
$routes->get('/panel/borrador', 'Noticias::borrador');
$routes->get('/panel/correcion', 'Noticias::correcion');

$routes->get('/noticias/mostrar', 'Noticias::mostrar');



$routes->resource('noticias', ['placeholder' => '(:num)', 'except' => 'show']);
$routes->resource('editar', ['placeholder' => '(:num)', 'except' => 'show']);