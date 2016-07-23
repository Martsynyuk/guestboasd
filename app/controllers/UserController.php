<?php

class UserController extends Controller
{
	public $uses = [
		'User',
	];
	
	public function actionRegister()
	{
		if(!empty($_POST)) {
			if($this->User->validation('register', $_POST)) {
				$this->User->saveUser($_POST);
			} else {
				$this->set('errors', $this->User->getErrors());
				$this->display('register');
			}
		}
	}
	
	public function actionLogin()
	{
		if(!empty($_POST)) {
			if(!empty($_POST['login']) && filter_var($_POST['login'], FILTER_VALIDATE_EMAIL)) {
				$_POST['email'] = $_POST['login'];
			} else {
				$_POST['username'] = $_POST['login'];
			}
			
			if($this->User->validation('login', $_POST)) {
				if(!$this->User->auth($_POST)) {
					$this->set('errors', 'bad login or password');
					$this->display('login');
				}
			} else {
				$this->set('errors', $this->User->getErrors());
				$this->display('login');
			}
		}
	}
	
	public function actionLogout()
	{
		$this->User->auth(false);
		Redirect::to('/user/Login');
	}
}