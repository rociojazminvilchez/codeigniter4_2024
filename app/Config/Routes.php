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

$routes->get('/mostrar/(:num)/historial', 'Noticias::historial/$1');
$routes->get('/estado/editar', 'Noticias::editar');

#categorias
$routes->get('/categorias/economia', 'Noticias::economia');
$routes->get('/categorias/turismo', 'Noticias::turismo');
$routes->get('/categorias/deporte', 'Noticias::deporte');
$routes->get('/categorias/politica', 'Noticias::politica');


$routes->get('/estado/validar', 'Noticias::validar');

//ESTADOS
$routes->get('/estado/borrador', 'Editar::borrador');

$routes->get('/estado/correcion', 'Editar::correcion');

$routes->get('/noticias/mostrar', 'Noticias::mostrar');

$routes->resource('noticias', ['placeholder' => '(:num)', 'except' => 'show']);
$routes->resource('editar', ['placeholder' => '(:num)', 'except' => 'show']);
$routes->resource('corregir', ['placeholder' => '(:num)', 'except' => 'show']);

#Mostrar noticia ID
$routes->get('/mostrar/(:num)/noticia_id', 'Noticias::mostrar_noticia/$1');

#PERFIL EDITAR - ESTADO BORRADOR -> Descartar
$routes->get('/estado/(:num)/descartar', 'Editar::descartar/$1');

#PERFIL VALIDADOR - ESTADOS
$routes->get('/estado/(:num)/publicar', 'Noticias::publicar/$1');
$routes->get('/estado/(:num)/descartar_v', 'Noticias::descartar/$1');
$routes->get('/estado/(:num)/corregir_v', 'Noticias::correcion/$1');

$routes->get('/estado/(:num)/corregir_editar', 'Editar::corregir_editar/$1');