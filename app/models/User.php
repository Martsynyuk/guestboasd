<?php

class User extends Model
{
	public $isLogin = false;
	protected $tableName = 'users';
	protected $validationRules = [
		'username' => [
			'min' => 6,
			'max' => 16,
			'required' => true,
			'unique' => true,			
		],
		'email' => [
			'email' => true,
			'required' => true,
			'unique' => true,
		],
		'password' => [
			'min' => 6,
			'max' => 16,
			'required' => true,
			'matches' => [
				'password',
				'confirmpassword'
			],
		],
	];
	
	public static function isLogin()
	{
		if($_SESSION['login']) {
			return true;
		} else {
			return false;
		}
	}
	
	public function auth($status)
	{
		if($status) {
			$this->isLogin = $_SESSION['login']	= true;			
		} else {
			$this->isLogin = false;
			unset($_SESSION['login']);
		}
	}
	
	public function validate($data)
	{
		return parent::validate($data);
	}
	
	public function getErrors()
	{
		return parent::getErrors();
	}
	
	public function find($where = [], $limit = [], $order = [])
	{
		return parent::find($where = [], $limit = [], $order = []);
	}
	
	public function save($data, $where = [])
	{
		return parent::save($data, $where = []);
	}
	
	public function deleteRecord($where)
	{
		return parent::deleteRecord($where);
	}
}