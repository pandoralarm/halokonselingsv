<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('konseling', ['namespace' => 'App\Modules\Konseling\Controllers'], function($subroutes){


	/*** Route for Chatroom ***/
	$subroutes->add('chatroom', 'Chatroom::index');
	$subroutes->add('chatroom/index', 'Chatroom::index');
	$subroutes->add('chatroom/getall/(:alphanum)', 'Chatroom::getall/$1');
	$subroutes->add('chatroom/hello', 'Chatroom::hello');
	$subroutes->add('chatroom/getThreadKey/(:alphanum)', 'Chatroom::getThreadKey/$1');
	$subroutes->add('chatroom/getThreadKey', 'Chatroom::getThreadKey');
	$subroutes->add('chatroom/getMessages/(:alphanum)', 'Chatroom::getMessages/$1');
	$subroutes->add('chatroom/makeRequest', 'Chatroom::makeRequest');
	$subroutes->add('chatroom/isRequest', 'Chatroom::isRequest');
	$subroutes->add('chatroom/getOpenRequest', 'Chatroom::getOpenRequest');
	$subroutes->add('chatroom/getOpenThread', 'Chatroom::getOpenThread');
	$subroutes->add('chatroom/findKonselor/(:alphanum)', 'Chatroom::findKonselor/$1');
	$subroutes->add('chatroom/confirmSession', 'Chatroom::confirmSession');
	$subroutes->add('chatroom/addToSession', 'Chatroom::addToSession');
	$subroutes->add('chatroom/sendMessage', 'Chatroom::sendMessage');
	$subroutes->add('chatroom/sessionInfo/(:alphanum)', 'Chatroom::sessionInfo/$1');
	$subroutes->add('chatroom/closeSession', 'Chatroom::closeSession');
	$subroutes->add('chatroom/mediaupload', 'Chatroom::mediaupload');

	/*** Route for chatroom ***/
	$subroutes->add('chatroom', 'chatroom::index');
	$subroutes->add('chatroom/index', 'chatroom::index');
	$subroutes->add('chatroom/getall/(:alphanum)', 'chatroom::getall/$1');
	$subroutes->add('chatroom/hello', 'chatroom::hello');
	$subroutes->add('chatroom/openThread', 'chatroom::openThread');

});