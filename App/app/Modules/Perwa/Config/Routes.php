<?php

if (!isset($routes)) {
	$routes = \Config\Services::routes(true);
}

$routes->group('perwa', ['namespace' => 'App\Modules\Perwa\Controllers'], function ($subroutes) {

	/*** Route for Dashboard ***/
	$subroutes->add('', 'Dashboard::index');
	$subroutes->add('dashboard', 'Dashboard::index');

	/*** Route for Pengajuan ***/
	$subroutes->add('pengajuan', 'Pengajuan::index');
	$subroutes->add('pengajuan/index', 'Pengajuan::index');
	$subroutes->add('pengajuan/commit', 'Pengajuan::commit');
	$subroutes->add('pengajuan/showDiproses/(:alphanum)', 'Pengajuan::showDiproses/$1');
	$subroutes->add('pengajuan/showDiterima/(:alphanum)', 'Pengajuan::showDiterima/$1');
	$subroutes->add('pengajuan/showDitolak/(:alphanum)', 'Pengajuan::showDitolak/$1');
	$subroutes->add('pengajuan/deletePengajuan/(:alphanum)', 'Pengajuan::deletePengajuan/$1');
	$subroutes->add('pengajuan/getResponse', 'Pengajuan::getResponse');
});
