<?php

class View
{
	private $workingFolder;
	private $templatesRoot;
	private $data;
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
		$value = $this->data[$name];/* не зовсім розумію сенс поверненя значення конкретної змінної
									якщо в render можна передати весь массив */
		return $value;
	}
	public function render($template)
	{
		ob_start();
		extract($data);
		if (file_exists($this->workingFolder . $template . '.html')) {
			include_once $this->workingFolder . $template . '.html';
		}
		echo ob_get_clean();
	}
}