<?php

class Controller 
{
	private $view;
	public $layout = 'main';
	public $uses = [];
	public $params = [];
	private $autorization = [];
	
	public function __construct($controller, $action, $params = [])
	{
		$this->params = $params;
		$this->view = new View($controller);		
		$this->setModels($controller);
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