<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('music', 'MusicController::music');
$routes->get('/uploads', 'MusicController::uploads');