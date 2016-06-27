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
				if($this->query->execute()) {
					$this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);
					$this->count = $this->query->rowCount();
				} else {
					$this->error = true;
				}
			}
		}
		return $this;
	}
	public function action($action, $table, $where = [])
	{
		if(count($where === 3)) {
			$operators = ['=', '>', '<', '>=', '<='];
			$field = $where[0];
			$operator = $where[1];
			$value = $where[2];
			
			if(in_array($operator, $operators)) {
				$sql = "$action FROM $table WHERE $field $operator ?";
				
				if(!$this->executeQuery($sql, array($value)->error())) {
					return $this;
				}
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
	public static function getInstance()
	{
		if(!isset(self::$instance)) {
			self::$instance = new MySQLDriver();
		}
		return self::$instance;
	}
}