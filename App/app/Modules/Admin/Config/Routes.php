<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('admin', ['namespace' => 'App\Modules\Admin\Controllers'], function($subroutes){

	/*** Route for Dashboard ***/
    $subroutes->add('', 'Dashboard::index');
	$subroutes->add('dashboard', 'Dashboard::index');

	/*** Route for Laporan ***/
	$subroutes->add('laporan', 'Laporan::index');
	$subroutes->add('laporan/index', 'Laporan::index');
});