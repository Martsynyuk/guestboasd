<?php

class User extends Model
{
	protected $tableName = 'users';
	protected $validationRules = [
		'register' => [
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
		],
		'login' => [
			'login' => [
				'required' => true,
			],
			'password' => [
				'required' => true,
			],
		],
	];
	
	public static function isLoggedIn()
	{	
		if(!empty($_SESSION['id'])) {
			return true;
		}
		return false;
	}
	
	public function saveUser($data)
	{	
		return $this->save([
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => md5($data['password'] . Config::get('md5/salt')),
		]);
	}
	
	public function auth($data)
	{
		if(!empty($data['login']) && filter_var($data['login'], FILTER_VALIDATE_EMAIL)) {
			$data['email'] = ['=', $data['login']];
			$data['password'] = ['=', md5($data['password'] . Config::get('md5/salt'))];
		} else {
			$data['username'] = ['=', $data['login']];
			$data['password'] = ['=', md5($data['password'] . Config::get('md5/salt'))];
		}
		unset($data['login']);
		unset($data['submit']);
		
		if(!empty($this->find($data))) {
			$_SESSION['id'] = $this->db->getFirstResult()['id'];
			return true;
		}
		$this->setErrors('login', 'bad login or password');
		return false;
	}
}