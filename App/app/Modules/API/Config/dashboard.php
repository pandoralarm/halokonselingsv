<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('api', ['namespace' => 'App\Modules\API\Controllers'], function($subroutes){

	/*** Route for Dashboard ***/
	$subroutes->add('dashboard', 'Dashboard::index');
	$subroutes->add('dashboard/index', 'Dashboard::index');

});