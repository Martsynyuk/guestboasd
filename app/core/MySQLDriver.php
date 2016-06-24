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
			$this->pdo = new PDO(Config::get('database/dsn'), Config::get('database/user'), Config::get('database/password'));
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	}
	public function executeQuery($sql, $params = [])	
	{

	}
	public function disconnect()
	{
		$this->pdo = null;
	}
	public static function getInstance()
	{
		if(!isset(self::$instance)) {
			self::$instance = new MySQLDriver();
		}
		return self::$instance;
	}
}