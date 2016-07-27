<?php

class Router
{
	private $defaultController;
	private $defaultAction;
	private $defaultErrorAction;
	private $controller = null;
	private $action = null;
	private $params = [];
	private $autorization = ['actionLogin', 'actionRegister'];
	
	public function __construct()
	{	
		$this->defaultController = Config::get('router/defaultController');
		$this->defaultAction = Config::get('router/defaultAction');
		$this->defaultErrorAction = Config::get('router/defaultErrorAction');
		$this->urlParser();
	}
	
	public function run()
	{
		if(class_exists($this->controller . 'Controller')) {
			$controller = $this->controller . 'Controller';
			$controller = new $controller($this->controller, $this->params);
			
			if(method_exists($controller, 'action' . ucfirst($this->action))) {
				$action = 'action' . ucfirst($this->action);
				if(User::isLogin()) {
					if(in_array($action, $this->autorization)) {
						Redirect::to();
					} else {
						$controller->$action();
						$controller->set('content', $controller);
						$controller->set('action', $this->action);
						$controller->displayLayout($controller->layout);
					}
				} else {
					if(in_array($action, $this->autorization)) {
						$controller->$action();
						$controller->set('content', $controller);
						$controller->set('action', $this->action);
						$controller->displayLayout($controller->layout);
					} else {
						Redirect::to('/user/login');
					}
				}				
			} else {
				$this->error('404');
			}
		} else {
			$this->error('404');
		}
	}
	private function urlParser()
	{
		$url = explode('/', ltrim($_SERVER ['REQUEST_URI'], '/'));
		
		$this->controller = $this->defaultController;
		$this->action = $this->defaultAction;
		
		if(count($url) == 1 && $url[0] != '') {
			list($this->controller) = $url;
		} elseif(count($url) >= 2) {
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