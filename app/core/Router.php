<?php

class Router
{
	private $defaultController;
	private $defaultAction;
	private $defaultErrorAction;
	private $controller = null;
	private $action = null;
	private $params = [];
	
	public function __construct($url)
	{	
		$this->defaultController = Config::get('router/defaultController');
		$this->defaultAction = Config::get('router/defaultAction');
		$this->defaultErrorAction = Config::get('router/defaultErrorAction');
		$this->urlParser($url);
	}
	
	public function run()
	{
		if(class_exists($this->controller . 'Controller')) {
			$controller = $this->controller . 'Controller';
			$controller = new $controller($this->controller, $this->params);
			
			if(method_exists($controller, 'action' . ucfirst($this->action))) {
				$action = 'action' . ucfirst($this->action);
				$controller->$action();
				$controller->display($this->action);
				
			} else {
				$this->error('404');
			}
		} else {
			$this->error('404');
		}
	}
	
	private function urlParser($url)
	{
		$url = explode('/', ltrim($url, '/'));
		
		$this->controller = $this->defaultController;
		$this->action = $this->defaultAction;
		
		if(count($url) >= 2) {
			list($this->controller, $this->action) = $url;
			$this->params = array_slice($url, 2);
		}	
		$this->run();
	}
	
	private function error($error)
	{
		$controller = $this->defaultController . 'Controller';
		$action = 'action' . ucfirst($this->defaultErrorAction);
		$controller = new $controller($this->defaultController);
		$controller->$action($error);
		$controller->display($this->defaultErrorAction);
	}
}