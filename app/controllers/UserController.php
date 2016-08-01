<?php

class UserController extends Controller
{
	public $layout = 'main';
	public $uses = [
		'User',
	];
	
	public function beforeAction($action)
	{
		/*if(!empty($_POST)) {
			Redirect::to($_SERVER ['REQUEST_URI']);
		}*/
	}
	
	public function actionRegister()
	{	var_dump($_POST);
		if(!empty($_POST)) {
			if($this->User->validation('register', $_POST) && $this->User->saveUser($_POST)) {
				Redirect::to('/user/Login');
			} else {
				$this->User->setError($this->User->getErrors());
			}
		}
	}
	
	public function actionLogin()
	{
		if(!empty($_POST)) {
			if($this->User->validation('login', $_POST)) {
				if(!$this->User->auth($_POST)) {
					$this->User->setError(['login'=> ['bad login or password']]);
				} else {
					Redirect::to();
				}
			} else {
				$this->User->setError($this->User->getErrors());
			}
		}
	}
	
	public function actionLogout()
	{
		unset($_SESSION['id']);
		Redirect::to('/user/Login');
	}
}