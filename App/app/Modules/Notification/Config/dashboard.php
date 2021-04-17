<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('notification', ['namespace' => 'App\Modules\Notification\Controllers'], function($subroutes){

	/*** Route for Dashboard ***/
	$subroutes->add('dashboard', 'Dashboard::index');
	$subroutes->add('dashboard/index', 'Dashboard::index');

	/*** Route for Mailing ***/
	$subroutes->add('mailing', 'Mailing::index');
	$subroutes->add('mailing/index', 'Mailing::index');
	$subroutes->add('mailing/send/(:alphanum)/(:alphanum)', 'Mailing::send/$1/$2');

});