<?php
session_start();

$GLOBALS = [
	'database' => [
	    'dsn' => 'mysql:host=localhost;dbname=user;charset=utf8',
		'user' => 'root',
		'password' => ''
	],	
];

spl_autoload_register(function($file) {
	if(file_exists('app/core/' . $file . '.php')) {
		require_once('app/core/' . $file . '.php');
	} elseif(file_exists('app/interfaces/' . $file . '.php')) {
		require_once('app/interfaces/' . $file . '.php');
	}	
});

