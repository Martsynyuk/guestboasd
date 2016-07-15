<?php

class Validation
{	
	public $validationPassed = true;
	public $errorInfo = [];
	public $spesialConditions = [
		'unique',
	];

	public function min($fieldName, $rules, $value)
	{
		if($rules >= $value) {
			$errorText = 'mast be at list ' . $rules . ' sumbols';
			$this->validationPassed = false;
			$this->errorInfo[$fieldName][] = $errorText;
		}
		return;
	}
	
	public function max($fieldName, $rules, $value)
	{
		if($rules <= $value) {
			$errorText = 'mast maximum ' . $rules . ' sumbols';
			$this->validationPassed = false;
			$this->errorInfo[$fieldName][] = $errorText;
		}
		return;
	}
	
	public function matches($fieldName, $rules, $value)
	{
		if(is_array($value)) {
			foreach($value as $val) {
				if($value[$fieldName] != $val) {
					$errorText = 'fields are not equal';
					$this->validationPassed = false;
					$this->errorInfo[$fieldName][] = $errorText;
				}
			}
		}
		return;
	}
	
	public function email($fieldName, $rules, $value)
	{
		if($rules) {
			if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
				$errorText = 'wrong email';
				$this->validationPassed = false;
				$this->errorInfo[$fieldName][] = $errorText;
			}
		}
		return;
	}
	
	public function required($fieldName, $rules, $value)
	{
		if($rules) {
			if($value == '')
			{
				$errorText = 'can\'t be empty';
				$this->validationPassed = false;
				$this->errorInfo[$fieldName][] = $errorText;
			}
		}
		return;
	}
	
	public function unique($model, $fieldName, $rules, $value)
	{
		if($rules) {
			if($model->find($value)) {
				$errorText = 'this text already exists';
				$this->validationPassed = false;
				$this->errorInfo[$fieldName][] = $errorText;
			}
		}
		return;
	}
}
