<?php

class User extends Model
{
	protected $tableName = 'users';
	protected $validationRules = [];
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
				'required' => true,
			],
			'email' => [
				'email' => true,
				'required' => true,
			],
			'password' => [
				'required' => true,
			],
		],
	];
	
	public function rules()
	{
		$rules = [
			'login' => [
				'login' => [
					'placeholder' => 'input name or email',
					'type' => 'text',
					'name' => 'login',
					'size' => '15',
				],
				'password' => [
					'placeholder' => 'input password',
					'type' => 'password',
					'name' => 'password',
					'size' => '15',
				],
			],
			'register' => [
				'username' => [
					'placeholder' => 'input name',
					'type' => 'text',
					'name' => 'username',
					'size' => '15',
				],
				'email' => [
					'placeholder' => 'input email',
					'type' => 'mail',
					'name' => 'email',
					'size' => '15',
				],
				'password' => [
					'placeholder' => 'input password',
					'type' => 'password',
					'name' => 'password',
					'size' => '15',
				],
				'confirm password' => [
					'placeholder' => 'confirm password',
					'type' => 'password',
					'name' => 'confirmpassword',
					'size' => '15',
				],		
			],
		];
		return $rules;
	}
	
	public static function form($action, $error)
	{
		$obj = new User();
		$rules = $obj->rules();
		
		if(!empty($_POST)) {
			$obj->validation($action, $_POST);
		}	
		
		if(!empty($rules[$action])) {
			foreach($rules[$action] as $key => $value) {
				$content = '';
				foreach($value as $field => $val) {
					$content .= ' ' . $field . '="' . $val . '"';
				}
				echo '<label>' . $key . '<input' . $content . '></label>';
				
				if(!empty($error) && array_key_exists($key, $error)) {
					echo '<div class="error">' . implode(', ', $error[$key]) . '</div>';
				} elseif($key = 'login' && array_key_exists('username', $error) || array_key_exists('email', $error)) {
					echo '<div class="error">' . implode(', ', $error['username']) . '</div>';
				}
			}
			echo '<input type="submit" name="submit" value="submit">';
		}
	}
	
	public static function isLogin()
	{	
		if(!empty($_SESSION['id'])) {
			return true;
		} else {
			return false;
		}
	}
	
	public function validation($action, $data)
	{
		if(isset($data['login'])) {
			if(filter_var($data['login'], FILTER_VALIDATE_EMAIL)) {
				$data['email'] = $data['login'];		
			} else {
				$data['username'] = $data['login'];
			}
		}
		
		if(array_key_exists($action, $this->validation)) {
			$this->validationRules = $this->validation[$action];
			return $this->validate($data);
		}
		return false;
	}
	
	public function saveUser($data)
	{	
		return $this->save([
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => md5($data['password'] . Config::get('md5/solt')),
		]);
	}
	
	public function auth($data)
	{
		if(!empty($data['login']) && filter_var($data['login'], FILTER_VALIDATE_EMAIL)) {
			$data['email'] = $data['login'];
		} else {
			$data['username'] = $data['login'];
		}
		unset($data['login']);
		unset($data['submit']);
		
		foreach($data as $key => $value) {
			if($key == 'password') {
				$data['password'] = ['=', md5($data['password'] . Config::get('md5/solt'))];
			} else {
				$data[$key] = ['=', $value];
			}
		}	
		
		if(!empty($this->find($data))) {
			$_SESSION['id'] = $this->db->getFirstResult()['id'];
			return true;
		} else {
			return false;
		}
	}
}