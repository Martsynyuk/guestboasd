<?php

class User extends Model
{
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
			'matches' => 'confirmpassword',
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
			$_SESSION['login']	= true;			
		} else {
			unset($_SESSION['login']);
		}
	}

}