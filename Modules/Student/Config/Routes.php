<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('student', ['namespace' => '\Modules\Student\Controllers'], function ($routes) {
    $routes->get('/', 'StudentController::index');
    $routes->match(["GET", "POST"], "add-student", 'StudentController::addStudent');
    $routes->match(["GET", "PUT"], "edit-student/(:num)", 'StudentController::editStudent/$1');
    $routes->delete("delete-student/(:num)", 'StudentController::deleteStudent/$1');
});

$routes->group('api', ['namespace' => '\Modules\Student\Controllers'], function ($routes) {
    $routes->resource("student", ['controller' => 'ApiController']);

});