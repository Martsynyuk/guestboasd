<?php

require_once(APP . '/app/config/config.php');

class MySQLDriver implements DatabaseInterface
{
	public function __construct()
	{
		$this->connect();
	}
	public function __destruct()
	{
		$this->disconnect();
	}
	public function connect($host, $user, $password, $dbname)
	{
		
	}
	public function executeQuery($sql)	
	{
		
	}
	public function disconnect($pdo)
	{
		
	}
}