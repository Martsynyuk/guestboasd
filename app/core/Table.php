<?php

abstract class Table
{
	protected $driver;
	protected $table;
	public function __construct()
	{
		$this->driver = Config::get('database/driver') . 'Driver';
		$this->driver = new $this->driver();
	}
	public function get($conditions, $params = [])
	{
		return $this->driver->action('SELECT' . $conditions, $this->table, $params);
	}
	public function getAll($params = [])
	{
		return $this->driver->action('SELECT *', $this->table, $params);
	}
	public function insert($conditions, $params = [])
	{
		
	}
	public function update($conditions, $params = [])
	{
		
	}
	public function delete($params = [])
	{
		if($this->driver->action('DELETE', $params)) {
			return true;
		}
		return false;
	}
}