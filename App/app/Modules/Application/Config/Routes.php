<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('application', ['namespace' => 'App\Modules\Application\Controllers'], function($subroutes){

	/*** Route for Dashboard ***/
	$subroutes->add('', 'Dashboard::index');
	$subroutes->add('dashboard', 'Dashboard::index');

	/*** Route for Debug ***/
	$subroutes->add('debug', 'Debug::index');
	$subroutes->add('debug/index', 'Debug::index');
	
	/*** Route for Home ***/
	$subroutes->add('home', 'Home::index');
	$subroutes->add('home/index', 'Home::index');

	/*** Route for Server ***/
	$subroutes->add('server', 'Server::index');
	$subroutes->add('server/index', 'Server::index');

});