<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/playmusic', 'MusicController::song');
$routes->post('/save', 'MusicController::save');
$routes->post('/insert', 'MusicController::insert');
$routes->get('/search', 'MusicController::search');
$routes->post('/music/(:any)', 'MusicController::music/$1');
$routes->post('/saveMusic', 'MusicController::saveMusic');