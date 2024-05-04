<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/noticias/ingreso', 'Noticias::ingreso');
$routes->get('/noticias/recuperar_contra', 'Noticias::recuperar');

#categorias
$routes->get('/categorias/economia', 'Noticias::economia');
$routes->get('/categorias/turismo', 'Noticias::turismo');
$routes->get('/categorias/deporte', 'Noticias::deporte');
$routes->get('/categorias/politica', 'Noticias::politica');

#noticia

$routes->get('/panel/historial', 'Noticias::historial');
$routes->get('/panel/panel', 'Noticias::panel');
$routes->get('/panel/validar', 'Noticias::validar');
$routes->get('/panel/borrador', 'Noticias::borrador');
$routes->get('/panel/correcion', 'Noticias::correcion');

$routes->get('/noticias/mostrar', 'Noticias::mostrar');


$routes->resource('noticias', ['placeholder' => '(:num)', 'except' => 'show']);