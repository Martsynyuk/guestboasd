<?php

namespace app\app\core;

use app\app\core\Config as Config;

class MySQLDriver implements DatabaseInterface
{
	public $pdo;
	public function __construct()
	{
		$this->connect();
	}
	public function __destruct()
	{
		$this->disconnect();
	}
	public function connect()
	{
		$this->pdo = new PDO(Config::$dbConfig['dsn'], Config::$dbConfig['user'], Config::$dbConfig['password']);
	}
	public function executeQuery($sql)	
	{
		
	}
	public function disconnect($pdo)
	{
		$this->pdo = null;
	}
}