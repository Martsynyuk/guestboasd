<?php

class UserController extends Controller
{
	private $autorization = ['login', 'register'];
	public $uses = [
		'User',
	];
	
	public function __construct($controller, $action, $params = [])
	{
		parent::__construct($controller, $action, $params = []);
		$this->beforeAction($action);
	}
	
	public function beforeAction($action)
	{
		if(User::isLogin()) {
			if(in_array($action, $this->autorization)) {
				Redirect::to();
			}
		} else {
			if(!in_array($action, $this->autorization)) {
				Redirect::to('/user/login');
			}
		}
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
				Redirect::to();
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