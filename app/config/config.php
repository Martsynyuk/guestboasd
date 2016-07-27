<?php
session_start();

$settings = [
	'database' => [
		'driver' => 'MySQL',
		'host' => 'localhost',
		'dbname' => 'guestboard',
		'user' => 'root',
		'password' => ''
	],
	'router' => [
		'defaultController' => 'Post',
		'defaultAction' => 'index',
		'defaultErrorAction' => 'error'
	],
	'md5' => [
		'solt' => 'board',
	],
];

spl_autoload_register(function($file) {
	$paths = [
			'app/core/',
			'app/interfaces/',
			'app/models/',
			'app/controllers/'
	];

	foreach ($paths as $path)
	{
		if(file_exists($path . $file . '.php')) {
			require_once($path . $file . '.php');
		}
	}
});

Config::set($settings);

