<?php

class PostModel extends Table
{
	private $table = 'post'; 
	
	public function get($where, $limit = [], $orderBy = [])
	{
		return parent::get($where, $limit, $orderBy);
	}
	
	public function getAll()
	{
		return parent::getAll();
	}
	
	public function delete($where)
	{
		return parent::delete($where);
	}
	
	public function insert($data)
	{
		return parent::insert($data);
	}
	
	public function update($data, $where)
	{
		return parent::update($data, $where);
	}
}