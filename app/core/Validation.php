<?php

class Validation
{
	public function min($rules, $value)
	{
		if($value <= strlen($rules)) {
			return 'mast be at list ' . $rules . ' sumbols';
		}
		return false;
	}
	
	public function max($rules, $value)
	{
		if($value >= strlen($rules)) {
			return 'mast maximum ' . $rules . ' sumbols';
		}
		return false;
	}
	
	public function matches($data, $first, $confirmation)
	{
		if($data[$first] != $data[$confirmation]) {
			return 'fields are not equal';
		}
		return false;
	}
	
	public function email($rules, $value)
	{
		if($rules) {
			if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
				return 'wrong email';
			}
		}
		return false;
	}
	
	public function required($rules, $value)
	{
		if($rules) {
			if($value != '')
			{
				return 'can\'t be empty';
			}
		}
		return false;
	}
	
	public function unique($model, $rules, $value)
	{
		if($rules) {
			if($model->find($value)) {
				return 'this text already exists';
			}
		}
		return false;
	}
}
