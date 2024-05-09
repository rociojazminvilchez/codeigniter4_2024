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
$routes->get('/estado/editar', 'Noticias::editar');

#categorias
$routes->get('/categorias/economia', 'Noticias::economia');
$routes->get('/categorias/turismo', 'Noticias::turismo');
$routes->get('/categorias/deporte', 'Noticias::deporte');
$routes->get('/categorias/politica', 'Noticias::politica');

$routes->get('/estado/validar', 'Noticias::validar');

$routes->get('/estado/borrador', 'Editar::borrador');

$routes->get('/estado/correcion', 'Noticias::correcion');

$routes->get('/noticias/mostrar', 'Noticias::mostrar');

$routes->resource('noticias', ['placeholder' => '(:num)', 'except' => 'show']);
$routes->resource('editar', ['placeholder' => '(:num)', 'except' => 'show']);
$routes->resource('corregir', ['placeholder' => '(:num)', 'except' => 'show']);

#ejemplo
$routes->get('/mostrar/(:num)/noticia_id', 'Noticias::show');