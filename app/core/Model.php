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
			'unique' => true,
		],
		'password' => [
			'min' => 4,
			'max' => 10,
			'matches' => 'confirmpassword',
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
					foreach($field as $condition => $val)
					{
						if($condition == 'unique') {
							$this->errorInfo[$fields][] = $this->validateObj->$condition($this, $val, $value);
						} elseif($condition == 'matches') {
							$this->errorInfo[$fields][] = $this->validateObj->$condition($data, $field, $val);
						} else {
							$this->errorInfo[$fields][] = $this->validateObj->$condition($val, $value);
						}				
					}
				}
			}
		}
		
		if(!empty($this->errorInfo)) {
			return false;
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
		if(empty($where)) {
			return $this->insert($this->tableName, $data);
		} else {
			return $this->update($this->tableName, $data, $where);
		}
	}
	
	public function deleteRecord($where)
	{
		return $this->delete($this->tableName, $where);
	}
}