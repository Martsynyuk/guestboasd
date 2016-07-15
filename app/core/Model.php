<?php

class Model extends Table
{
	protected $tableName;
	protected $validateObj;
	protected $validationRules = [];
	
	public function __construct()
	{	
		$this->validateObj = new Validation();
	}
	
	public function validate($data)
	{
		foreach($data as $fieldName => $val)
		{
			foreach($this->validationRules as $field => $keys)
			{
				if($field == $fieldName) {
					foreach($keys as $condition => $rules)
					{
						if(is_array($rules)) {
							foreach($rules as $fields)
							{
								if(in_array($fields, $data)) {
									$val[$fields] = $data[$fields];
								}
							}
						}
						
						if(in_array($condition, $this->validateObj->spesialConditions)) {
							$this->validateObj->$condition($this, $fieldName, $rules, $val);
						} else {
							$this->validateObj->$condition($data, $fieldName, $rules, $val);
						}
					}
				}
			}
		}
		if($this->validateObj->validationPassed) {
			return false;
		}
		return true;
	}
	
	public function getErrors()
	{
		return $this->validateObj->errorInfo;
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