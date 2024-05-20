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
$routes->get('/mostrar/(:num)/versionEditada', 'Noticias::historialEditada/$1');
$routes->get('/mostrar/(:num)/versionCorregida', 'Noticias::historialCorregida/$1');

$routes->get('/estado/editar', 'Noticias::editar');

#categorias
$routes->get('/categorias/economia', 'Noticias::economia');
$routes->get('/categorias/turismo', 'Noticias::turismo');
$routes->get('/categorias/deporte', 'Noticias::deporte');
$routes->get('/categorias/politica', 'Noticias::politica');


//ESTADOS
$routes->get('/estado/borrador', 'Editar::borrador');

$routes->get('/estado/correcion', 'Editar::correcion');

$routes->get('/noticias/mostrar', 'Noticias::mostrar');

$routes->resource('noticias', ['placeholder' => '(:num)', 'except' => 'show']);
$routes->resource('editar', ['placeholder' => '(:num)', 'except' => 'show']);
$routes->resource('corregir', ['placeholder' => '(:num)', 'except' => 'show']);
$routes->resource('editar2', ['placeholder' => '(:num)', 'except' => 'show']);

#Mostrar noticia ID
$routes->get('/mostrar/(:num)/noticia_id', 'Noticias::mostrar_noticia/$1');

#PERFIL EDITAR - ESTADO BORRADOR -> Descartar
$routes->get('/estado/(:num)/descartar', 'Editar::descartar/$1');
$routes->get('/estado/(:num)/descartarEdit2', 'Editar2::descartar/$1');

$routes->get('/estado/(:num)/descartarNoticia', 'Noticias::descartar2/$1');

$routes->put('/noticias/(:num)/update2', 'Noticias::update2/$1');
$routes->put('/editar/(:num)/update2', 'Editar::update2/$1');
$routes->put('/editar2/(:num)/update2', 'Editar2::update2/$1');

#PERFIL VALIDADOR - ESTADOS - NOTICIAS
$routes->get('/estado/validar', 'Noticias::validar');
$routes->get('/estado/(:num)/publicar', 'Noticias::publicar/$1');
$routes->get('/estado/(:num)/descartar_v', 'Noticias::descartar/$1');
$routes->get('/estado/(:num)/corregir_v', 'Noticias::correcion/$1');
$routes->get('/estado/(:num)/deshacer_v', 'Noticias::deshacer/$1');

#PERFIL VALIDADOR - ESTADOS - EDITAR
$routes->get('/validarEDITAR/(:num)/publicar', 'Editar::publicar2/$1');
$routes->get('/validarEDITAR/(:num)/descartar_v', 'Editar::descartar2/$1');
$routes->get('/validarEDITAR/(:num)/corregir_v', 'Editar::correcion2/$1');
$routes->get('/validarEDITAR/(:num)/deshacer_v', 'Editar::deshacer2/$1');


$routes->get('/validarEDITAR2/(:num)/publicar', 'Editar2::publicar2/$1');
$routes->get('/validarEDITAR2/(:num)/descartar_v', 'Editar2::descartar2/$1');
$routes->get('/validarEDITAR2/(:num)/corregir_v', 'Editar2::correcion2/$1');
$routes->get('/validarEDITAR2/(:num)/deshacer_v', 'Editar2::deshacer2/$1');

$routes->get('/estado/(:num)/corregir_editar', 'Editar::corregir_editar/$1');

$routes->get('/noticias/deshacer_cambios', 'Noticias::deshacer_cambios');