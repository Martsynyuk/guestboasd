<?php

interface DatabaseInterface
{
	public function connect();
	public function executeQuery($sql);
	public function disconnect($pdo);
}