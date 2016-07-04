<?php

class Table
{
	protected $db;
	public function __construct()
	{
		$this->db = Config::get('database/driver') . 'Driver';
		$this->db = new $this->db();
	}
	/**
	 * @param array $fields = [
	 * 					'name',
	 * 					'age',
	 * 					etc...
	 * ]
	 * @param array $where = [
	 * 					'where' => [
	 * 						'id' => ['=', '3']
	 * 				],
	 * 					'limit' => [0, 5],
	 * 					'orderBy' => [
	 * 							'field'	or 'field DESC'
	 * 				],
	 * ]
	*/
	public function get($fields = [], $where = [])
	{	
		if(count($fields)) {
			if(!is_array($where)) {
				$where = null;
			}
			$action = 'SELECT ' . implode(', ', $fields) . 'FROM';
			return $this->action($action, $this->table, $where);
		}
		return false;
	}
	public function getAll($where = [])
	{
		if(!is_array($where)) {
			$where = null;
		}
		return $this->action('SELECT * FROM', $this->table, $where);
	}
	public function insert($data = [])
	{
		if(count($data)) {
			$string = '';
			foreach($data as $val)
			{
				$string .= '?' . ', ';
			}
			$sql = "INSERT INTO $this->table (" . implode(', ', array_keys($data)) . ") VALUES (" . rtrim($string, ', ') . ")";
			return $sql;
			if(!$this->db->executeQuery($sql, array_values($data))) {
				return true;
			}
		}
		return false;
	}
	public function delete($where = [])
	{
		if(is_array($where)) {
			if(!$this->action('DELETE FROM', $this->table, $where)) {
				return true;
			}
		}
		return false;
	}
	public function action($action, $table, $where = [])
	{	
		if(where) {
			$where = $this->conditions($where);
			$data = $where[1];
			$where = $where[0];
		} else {
			$where = '';
			$data = null;
		}
		$sql = "$action $table $where";
		if(!$this->db->executeQuery($sql, $data)) {
			return $this->db;
		}
		return false;
	}
	public function update($data = [], $where = [])
	{
		if(count($data)) {
			if(!is_array($where)) {
				$where = '';
				$dataCondition = null;
			} else {
				$where = $this->conditions($where);
				$dataCondition = $where[1];
				$where = $where[0];
			}
			$updateData = '';
			foreach($data as $key => $val)
			{
				$updateData .= $key . '=?,';
			}
			if(!$dataCondition) {
				$data = array_merge($data, $dataCondition);
			}
			$data = array_values($data);
			$sql = "UPDATE $this->table SET " . rtrim($updateData, ',' . "$where");
			if(!$this->db->executeQuery($sql, $data)) {
				return true;
			}
		}
		return false;
	}
	public function conditions($where = [])
	{
		if(count($where['limit'])) {
			$limit = " LIMIT " . $where['limit'][0] . ',' . $where['limit'][1] . "";
		} else {
			$limit = '';
		}
		if($where['orderBy']) {
			foreach($where['orderBy'] as $field)
			{
				$orderBy = " ORDER BY $field";
			}
		} else {
			$orderBy = '';
		}
		if(count($where['where'])) {
			$data = null;
			foreach($where['where'] as $field => $value)
			{
				$condition = $field . $value[0] . '?';
				$conditions[] = $condition;
				$data[] = $value[1];
			}
			$conditions = ' WHERE ' . implode(' AND ', $condition);
		} else {
			$conditions = '';
		}
		$where = $conditions . $orderBy . $limit;
		return [$where, $data];
	}
}