<?php

class Router
{
	private $defaultController;
	private $defaultAction;
	private $defaultErrorAction;
	
	public function __construct($url)
	{
		$defaultController = Config::get('router/defaultController');
		$defaultAction = Config::get('router/defaultAction');
		$defaultErrorAction = Config::get('router/defaultErrorAction');
	}
	
	public function run()
	{
		
	}
}