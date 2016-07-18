<?php

class UserController extends Controller
{
	public $uses = [
		'User',
	];
	
	public function actionRegister()
	{
		if($this->User->isLogin) {
			Redirect::to();
		}
		if(!empty($_POST)) {
			if($this->User->validate($_POST)) {
				$this->User->save($data = [
					'username' => $_POST['username'],
					'email' => $_POST['email'],
					'password' => md5($_POST['password'] . Config::get('md5/solt')),
				]);
				Redirect::to('/user/Login');
			} else {
				$this->set('errors', $this->User->getErrors());
				$this->display('register');
			}
		} else {
			$this->display('register');
		}
	}
	
	public function actionLogin()
	{
		if($this->User->isLogin) {
			Redirect::to();
		}
		if(!empty($_POST)) {
			if(!empty($this->User->find($where = [
					'username' => $_POST['username'],
					'password' => md5($_POST['password'] . Config::get('md5/solt')),
			]))) {
				$this->User->auth(true);
				Redirect::to('/user/Login');
			} else {
				$this->set('badLogin', 'bad login or password');
				$this->display('login');
			}
		} else {
			$this->display('login');
		}
	}
	
	public function actionLogout()
	{
		$this->User->auth(false);
		Redirect::to('/user/Login');
	}
}