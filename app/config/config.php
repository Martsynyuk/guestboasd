<?php
session_start();

$settings = [
	'database' => [
		'driver' => 'MySQL',
		'host' => 'localhost',
		'dbname' => 'user',
		'user' => 'root',
		'password' => ''
	],
	'router' =>[
		'defaultController' => 'PostController',
		'defaultAction' => 'actionIndex',
		'defaultErrorAction' => 'actionError'
	]
];

spl_autoload_register(function($file) {
	$paths = [
			'app/core/',
			'app/interfaces/',
			'app/models/'
	];

	foreach ($paths as $path)
	{
		if(file_exists($path . $file . '.php')) {
			require_once($path . $file . '.php');
		}
	}
});

Config::set($settings);

