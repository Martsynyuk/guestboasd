<?php

class View
{
	private $workingFolder;
	private $data;
	private $templatesRoot = 'templates';
	private $extension = '.php';
	public function __construct($workingFolder)
	{	
		$this->workingFolder = $workingFolder;
	}
	public function set($name, $value)
	{
		$this->data[$name] = $value;
	}
	public function get($name)
	{
		if (!empty($this->data[$name])) {
			$value = $this->data[$name];
			return $value;
		}
		return false;
	}
	public function render($template)
	{
		ob_start();
		extract($this->$data);
		if (file_exists($this->templatesRoot . '/' . $this->workingFolder . '/' . $template . $this->extension)) {
			include_once $this->templatesRoot . '/' . $this->workingFolder . '/' . $template . $this->extension;
		}
		echo ob_get_clean();
	}
}