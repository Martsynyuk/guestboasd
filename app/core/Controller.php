<?php

class Controller 
{
	private $view;
	public $layout = 'main';
	public $uses = [];
	public $params = [];
	private $autorization = ['login', 'register'];
	
	public function __construct($controller, $action, $params = [])
	{
		$this->beforeAction($action);
		$this->params = $params;
		$this->view = new View($controller);		
		$this->setModels($controller);
	}
	
	public function beforeAction($action)
	{
		if($action != 'error') {
			if(User::isLogin()) {
				if(in_array($action, $this->autorization)) {
					Redirect::to();
				}
			} else {
				if(!in_array($action, $this->autorization)) {
					Redirect::to('/user/login');
				}
			}
		}
	}
	
	public function setModels($controller)
	{
		if(empty($this->uses)) {
			$controllers = $controller;
			$this->$controllers = new $controllers();
		} else {
			foreach($this->uses as $className)
			{
				if(class_exists($className)) {
					$this->$className = new $className();
				}
			}	
		}
	}
	
	public function set($name, $value)
	{
		$this->view->set($name, $value);
	}
	
	public function display($template, $layout)
	{
		$this->view->render($template, $layout);
	}

}