<?php

interface DatabaseInterface
{
	public function connect($host, $user, $password, $dbname);
	public function executeQuery($sql);
	public function disconnect($pdo);
}