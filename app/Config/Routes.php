<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$module_path = ROOTPATH . 'Modules/';
$modules = scandir($module_path);

foreach ($modules as $module){
    if ($module === '.' || $module === '..') {
        continue;
    }
    if (is_dir($module_path . $module)) {
        $routes_path = $module_path . $module . '/Config/Routes.php';
        if(file_exists($routes_path)){
            require $routes_path;
        } else {
            continue;
        }
    }
}