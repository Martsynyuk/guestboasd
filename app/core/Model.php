<?php

class Model extends Table
{
	protected $tableName;
	protected $validateObj;
	public $errorInfo = [];
	protected $validationRules = [
		'username' => [
			'min' => 6,
			'max' => 20,
			'matches' => '/^[A-Z][a-z]+$/',
			'unique' => true,
		],
		'password' => [
			'min' => 4,
			'max' => 10
		],
	];
	
	public function __construct()
	{	
		$this->validateObj = new Validation();
	}
	
	public function validate($data)
	{
		foreach($data as $fields => $val)
		{
			foreach($this->validationRules as $field => $value)
			{
				if($field == $fields) {
					if(!$this->error($field, $val)) {
						return false;
					}
				}
			}
		}
		return true;
	}
	
	public function find($where = [], $limit = [], $order = [])
	{
		if(empty($where)) {
			return $this->getAll($this->tableName);
		} else {
			return $this->get($this->tableName, $where, $limit, $order);
		}
	}
	
	public function save($data, $where = [])
	{
		if($this->validate($data))
		{
			if(empty($where)) {
				return $this->insert($this->tableName, $data);
			} else {
				return $this->update($this->tableName, $data, $where);
			}
		} else {
			return false;
		}
	}
	
	public function deleteRecord($where)
	{
		return $this->delete($this->tableName, $where);
	}
	
	public function error($field, $value)
	{
		foreach($field as $condition => $val)
		{
			if($this->validateObj->$condition($val, $value)) {
				if($condition == 'unique') {
					$this->errorInfo[$field][] = $this->validateObj->$condition($this, $val, $value);
				} else {
					$this->errorInfo[$field][] = $this->validateObj->$condition($val, $value);
				}
				
			}
		}
		
		if(!empty($this->errorInfo)) {
			return false;
		}
		return true;
	}
}