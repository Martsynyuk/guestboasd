<?php

class PostModel extends Table
{
	private $table = 'post'; 
	
	public function get($where, $limit = [], $orderBy = [])
	{
		return parent::get($this->table, $where, $limit, $orderBy);
	}
	
	public function getAll()
	{
		return parent::getAll($this->table);
	}
	
	public function delete($where)
	{
		return parent::delete($this->table, $where);
	}
	
	public function insert($data)
	{
		return parent::insert($this->table, $data);
	}
	
	public function update($data, $where)
	{
		return parent::update($this->table, $data, $where);
	}
}