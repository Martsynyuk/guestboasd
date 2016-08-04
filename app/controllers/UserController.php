<?php

class UserController extends Controller
{
	public $uses = [
		'User',
	];
	
	public function __construct($controller, $action, $params = [])
	{
		$this->autorization = $this->autorizationRules();
		parent::__construct($controller, $action, $params = []);
	}
	
	public function autorizationRules()
	{
		return [
			'deny' => [
				'users' => ['user'],
				'actions' => ['login', 'register'],
				'redirect' => '/',
			],
		];
	}
	
	public function actionRegister()
	{
		if(!empty($_POST)) {
			if($this->User->validate('register', $_POST) && $this->User->saveUser($_POST)) {
				Redirect::to('/user/Login');
			} else {
				$this->set('error', $this->User->getErrors());
			}
		}
	}
	
	public function actionLogin()
	{
		if(!empty($_POST)) {
			if($this->User->validate('login', $_POST) && $this->User->auth($_POST)) {
				Redirect::to('/');
			} else {
				$this->set('error', $this->User->getErrors());
			}
		}
	}
	
	public function actionLogout()
	{
		unset($_SESSION['id']);
		Redirect::to('/user/Login');
	}
}