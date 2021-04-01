<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('perwa', ['namespace' => 'App\Modules\Perwa\Controllers'], function($subroutes){

	/*** Route for Beasiswa ***/
	$subroutes->add('beasiswa', 'Beasiswa::index');
	$subroutes->add('beasiswa/index', 'Beasiswa::index');
	$subroutes->add('beasiswa/addBeasiswa', 'Beasiswa::addBeasiswa');
	$subroutes->add('beasiswa/showBeasiswa', 'Beasiswa::showBeasiswa');
	$subroutes->add('beasiswa/deleteBeasiswa/(:alphanum)', 'Beasiswa::deleteBeasiswa/$1');

	/*** Route for Dashboard ***/
	$subroutes->add('dashboard', 'Dashboard::index');
	$subroutes->add('dashboard/index', 'Dashboard::index');

	/*** Route for Pengajuan ***/
	$subroutes->add('pengajuan', 'Pengajuan::index');
	$subroutes->add('pengajuan/index', 'Pengajuan::index');
	$subroutes->add('pengajuan/commit', 'Pengajuan::commit');
	$subroutes->add('pengajuan/showDiproses/(:alphanum)', 'Pengajuan::showDiproses/$1');
	$subroutes->add('pengajuan/showDisetujui/(:alphanum)', 'Pengajuan::showDisetujui/$1');
	$subroutes->add('pengajuan/showDitolak/(:alphanum)', 'Pengajuan::showDitolak/$1');
	$subroutes->add('pengajuan/deletePengajuan/(:alphanum)', 'Pengajuan::deletePengajuan/$1');
	$subroutes->add('pengajuan/getCV/(:alphanum)', 'Pengajuan::getCV/$1');
	$subroutes->add('pengajuan/getRekomendasi/(:alphanum)', 'Pengajuan::getRekomendasi/$1');
	$subroutes->add('pengajuan/showDiprosesSekprodi', 'Pengajuan::showDiprosesSekprodi');
	$subroutes->add('pengajuan/showDiselesaikanSekprodi', 'Pengajuan::showDiselesaikanSekprodi');
	$subroutes->add('pengajuan/showPengajuanMhs/(:alphanum)', 'Pengajuan::showPengajuanMhs/$1');
	$subroutes->add('pengajuan/getNilai', 'Pengajuan::getNilai');

});