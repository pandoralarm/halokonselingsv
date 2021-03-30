<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('admin', ['namespace' => 'App\Modules\Admin\Controllers'], function($subroutes){

	/*** Route for Dashboard ***/
	$subroutes->add('dashboard', 'Dashboard::index');
	$subroutes->add('dashboard/index', 'Dashboard::index');

});