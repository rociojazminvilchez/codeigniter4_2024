<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/noticias/ingreso', 'Noticias::ingreso');
$routes->post('/noticias/login', 'Noticias::login');
$routes->get('/', 'Noticias::salir');
$routes->get('/noticias/recuperar_contra', 'Noticias::recuperar');

#$routes->post('noticias/editar2', 'Noticias::updateE');
#noticia
$routes->get('/noticias/historial', 'Noticias::historial');
$routes->get('/noticias/editar', 'Noticias::editar');
#$routes->get('/noticias/editar2', 'Noticias::edit');

#categorias
$routes->get('/categorias/economia', 'Noticias::economia');
$routes->get('/categorias/turismo', 'Noticias::turismo');
$routes->get('/categorias/deporte', 'Noticias::deporte');
$routes->get('/categorias/politica', 'Noticias::politica');




#$routes->get('/panel/panel', 'Noticias::panel');
$routes->get('/panel/validar', 'Noticias::validar');
$routes->get('/panel/borrador', 'Noticias::borrador');
$routes->get('/panel/correcion', 'Noticias::correcion');

$routes->get('/noticias/mostrar', 'Noticias::mostrar');

#$routes->get('noticias/(:num)/editar2', 'Noticias::edit');


$routes->resource('noticias', ['placeholder' => '(:num)', 'except' => 'show']);