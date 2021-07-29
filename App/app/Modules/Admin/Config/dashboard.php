<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('admin', ['namespace' => 'App\Modules\Admin\Controllers'], function($subroutes){

	/*** Route for Contents ***/
	$subroutes->add('contents', 'Contents::index');
	$subroutes->add('contents/index', 'Contents::index');
	$subroutes->add('contents/publish', 'Contents::publish');
	$subroutes->add('contents/headerprocess/(:alphanum)', 'Contents::headerprocess/$1');
	$subroutes->add('contents/getArticles', 'Contents::getArticles');
	$subroutes->add('contents/getYtId', 'Contents::getYtId');

	/*** Route for Dashboard ***/
	$subroutes->add('dashboard', 'Dashboard::index');
	$subroutes->add('dashboard/index', 'Dashboard::index');

	/*** Route for Laporan ***/
	$subroutes->add('laporan', 'Laporan::index');
	$subroutes->add('laporan/index', 'Laporan::index');

});