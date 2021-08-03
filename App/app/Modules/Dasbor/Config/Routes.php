<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('dasbor', ['namespace' => 'App\Modules\Dasbor\Controllers'], function($subroutes){

	/*** Route for Dashboard ***/
	$subroutes->add('', 'Dashboard::index');
	$subroutes->add('dashboard/index', 'Dashboard::index');

	/*** Route for Signin ***/
	$subroutes->add('signin', 'Signin::index');
	$subroutes->add('signin/index', 'Signin::index');

	
});