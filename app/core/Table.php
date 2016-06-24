<?php

class Table extends MySQLDriver
{
	public function __construct()
	{
		
	}
	public function get($conditions, $table, $params = [])
	{
		return $this->action('SELECT' . $conditions, $table, $params);
	}
	public function getAll($table, $params = [])
	{
		return $this->action('SELECT *', $table, $params);
	}
	public function insert($conditions, $table, $params = [])
	{
		
	}
	public function update($conditions, $table, $params = [])
	{
		
	}
	public function delete($table, $params = [])
	{
		if($this->action('DELETE FROM', $table, $params)) {
			return true;
		}
		return false;
	}
}