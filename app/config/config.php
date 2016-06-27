<?php
session_start();

$settings = [
	'database' => [
		'driver' => 'MySQL',
		'host' => 'localhost',
		'dbname' => 'user',
		'user' => 'root',
		'password' => ''
	]
];
return $settings;

