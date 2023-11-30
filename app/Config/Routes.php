<?php
$routes->setAutoRoute(true);
//use CodeIgniter\Router\RouteCollection;
use App\Controllers\User;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::Index');
$routes->get('users/index','Users::Index');
$routes->post('users/login', 'Users::Login');
$routes->get('users/logout', 'Users::logout');
/*$routes->post('user/getAll', [User::class, 'getAll']);
$routes->post('user/getOne', [User::class, 'getOne']);
$routes->post('user/add', [User::class, 'add']);
$routes->post('user/edit', [User::class, 'edit']);
$routes->post('user/remove', [User::class, 'remove']);*/

