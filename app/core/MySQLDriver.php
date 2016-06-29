<?php

class MySQLDriver implements DatabaseInterface
{
	private static $instance = null;
	private $error = false;
	private $count = 0;
	private $query;
	private $result;
	private $pdo;
	private function __construct()
	{
		$this->connect();
	}
	public function __destruct()
	{
		$this->disconnect();
	}
	public function connect()
	{
		try {
			$dsn = 'mysql:host=' . Config::get('database/host') . ';dbname=' . Config::get('database/dbname') . ';charset=utf8';
			$this->pdo = new PDO($dsn, Config::get('database/user'), Config::get('database/password'));
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	}
	public function disconnect()
	{
		$this->pdo = null;
	}
	public function executeQuery($sql, $params = [])	
	{
		$this->error = false;
		if($this->query = $this->pdo->prepare($sql)) {
			if(count($params)) {
				$index = 1;
				foreach($params as $value)
				{
					$this->query->bindValue($index, $value);
					$index++;
				}
			}
			if($this->query->execute()) {
				$this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);
				$this->count = $this->query->rowCount();
			} else {
				$this->error = true;
				return false;
			}
		}
		return $this;
	}
	/**
	 * 
	 *  @param array $where - condition, example ['id', '=', '0'] 
	 */
	public function action($action, $table, $where = [])
	{
		if(count($where === 3)) {			
			$sql = "$action FROM $table WHERE $where[0] $where[1] ?";
				
			if(!$this->executeQuery($sql, $where[2])) {
				return $this;
			}
		}
		return false;
	}
	/**
	 * 
	 */
	public function insert($action, $table, $data = [])
	{
		if(count($data)) {
			$column = '';
			$value = '';
			foreach($data as $key => $val)
			{
				$column = $column . $key . ', ';
				$value = $value . $val . ', ';
			}
			$sql = '"' . $action . $table . '(' . rtrim(', ', $column) . ')' . 'VALUES' . '(' . rtrim(', ', $value) . ')' . '"';
			if(!$this->executeQuery($sql)) {
				return true;
			}
		}
		return false;
	}
	/**
	 * 
	 * @param array $data - data for update, ['column' => 'value']
	 * @param array $where - condition for update, example ['id', '=', '12'] 
	 */
	public function update($action, $table, $data = [], $where = [])
	{
		if(count($data) && count($where) === 3) {
			$updateData = '';
			foreach($data as $key => $val)
			{
				$updateData = $updateData . $key = $val . ',';
			}
			$sql = '"' . $action . $table . 'SET' . rtrim(',', $updateData) . 'WHERE' . $where[0] . $where[1] . '?' . '"';
			if(!$this->executeQuery($sql, $where[2])) {
				return true;
			}
		}
		return false;
	}
	public function result()
	{
		return $this->result;
	}
	public function error() {
		return $this->error;
	}
}