<?php

class Table
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
	public function get($conditions, $params = [])
	{
		return $this->select('SELECT' . $conditions, $params);
	}
	public function getAll($params = [])
	{
		return $this->select('SELECT *', $params);
	}
	public function insert($data = [])
	{
		if(count($data)) {
			$column = '';
			$string = '';
			foreach($data as $key => $val)
			{
				$column = $column . $key . ', ';
				$string = $string . '?' . ', ';
			}
			$sql = '"' . 'INSERT INTO' . $table . '(' . rtrim(', ', $column) . ')' . 'VALUES' . '(' . rtrim(', ', $string) . ')' . '"';
			if(!$this->driver->executeQuery($sql, array_values($data))) {
				return true;
			}
		}
		return false;
	}
	public function update($data = [], $where = [])
	{
		if(count($data) && count($where) === 3) {
			$filds = $where[0];
			$operators = $where[1];
			$value = $where[2];
			$updateData = '';
			foreach($data as $key => $val)
			{
				$updateData = $updateData . $key = $val . ',';
			}
			$sql = '"' . 'UPDATE' . $table . 'SET' . rtrim(',', $updateData) . 'WHERE' . $filds . $operators . '?' . '"';
			if(!$this->driver->executeQuery($sql, $value)) {
				return true;
			}
		}
		return false;
	}
	public function delete($params = []) 
	{
		if($this->action('DELETE', $params)) {
			return true;	
		}
		return false;
	}
	public function action($action, $params = [])
	{
		if(count($where === 3)) {
			$filds = $where[0];
			$operators = $where[1];
			$value = $where[2];
			$sql = "$action FROM $this->$table WHERE $filds $operators ?";
	
			if(!$this->driver->executeQuery($sql, $value)) {
				return $this;
			}
		}
		return false;
	}
	public function query($sql)
	{
		return $this->driver->executeQuery($sql);
	}
}