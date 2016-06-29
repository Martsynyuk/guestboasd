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
	/**
	 * @param $conditions - must be string 
	 * @param array $params
	*/
	public function get($conditions, $params = [])  //  +
	{
		return $this->driver->action('SELECT' . $conditions, $this->table, $params);
	}
	public function getAll($params = [])  //  +
	{
		return $this->driver->action('SELECT *', $this->table, $params);
	}
	public function insert($data = [])
	{
		return $this->driver->insert('INSERT INTO', $this->table, $data);
	}
	public function update($data = [], $where = [])
	{
		return $this->driver->update('UPDATE', $this->table, $data, $where);
	}
	public function delete($params = [])  // +
	{
		if($this->driver->action('DELETE', $this->table, $params)) {
			return true;
		}
		return false;
	}
}