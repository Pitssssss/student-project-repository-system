<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'ProjectController::index');
$routes->get('/projects', 'ProjectController::index', ['cache' => 60]);
$routes->get('/projects/create', 'ProjectController::create');
$routes->post('/projects/store', 'ProjectController::store');
$routes->get('/projects/download/(:any)', 'ProjectController::download/$1');