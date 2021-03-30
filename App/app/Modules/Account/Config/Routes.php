<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('account', ['namespace' => 'App\Modules\Account\Controllers'], function($subroutes){

	/*** Route for Auth ***/
	$subroutes->add('auth', 'Auth::index');
	$subroutes->add('auth/index', 'Auth::index');
	$subroutes->add('auth/post/(:alphanum)/(:alphanum)', 'Auth::post/$1/$2');

	/*** Route for Dashboard ***/
	$subroutes->add('', 'Dashboard::index');
	$subroutes->add('dashboard', 'Dashboard::index');
	
	/*** Route for Signin ***/
	$subroutes->add('signin', 'Signin::index');
	$subroutes->add('signin/index', 'Signin::index');
	$subroutes->add('signin/auth', 'Signin::auth');
	$subroutes->add('signin/signout', 'Signin::signout');
	$subroutes->add('signin/getAll', 'Signin::getAll');
	$subroutes->add('signin/desktopAuth', 'Signin::desktopAuth');
});

?>