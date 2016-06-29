<?php

interface DatabaseInterface
{
	public function connect();
	public function executeQuery($sql, $params = []);
	public function disconnect();
	public function action($action, $table, $where = []);
	public function insert($action, $table, $data = []);
	public function update($action, $table, $data = [], $where = []);
	public function result();
	public function error();
}