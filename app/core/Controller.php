<?php

class Controller 
{
	private $view;
	public $uses = [];
	public $params = [];
	
	public function __construct($controller, $params = [])
	{
		$this->params = $params;
		$this->view = new View($controller);		
		$this->setModels($controller);
	}
	
	public function setModels($controller)
	{
		if(empty($this->uses)) {
			$controllers = $controller . 'Model';
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
	
	public function display($template)
	{
		$this->view->render($template);
	}
}