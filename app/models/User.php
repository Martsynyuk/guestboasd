<?php

class User extends Model
{
	protected $tableName = 'users';
	protected $valdationRules = [];
	protected $validation = [
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
			'username' => [
				'min' => 6,
				'max' => 16,
				'required' => true,
			],
			'email' => [
				'email' => true,
				'required' => true,
			],
			'password' => [
				'min' => 6,
				'max' => 16,
				'required' => true,
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
	
	public function validation($action, $data)
	{
		if(array_key_exists($action, $this->validation)) {
			$this->valdationRules = $this->validation[$action];
			return $this->validate($data);
		}
		return false;
	}
	
	public function saveUser($data)
	{
		$this->save([
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => md5($data['password'] . Config::get('md5/solt')),
		]);
		Redirect::to('/user/Login');
	}
	
	public function auth($data)
	{
		unset($data['login']);
		unset($data['submit']);
		$data['password'] = md5($data['password'] . Config::get('md5/solt'));

		if(!empty($this->find($data))) {
			$_SESSION['login'] = true;
			Redirect::to('/user/Login');
		} else {
			return false;
		}
	}

}