<?php

class PostController extends Controller
{
	private $autorization = ['login', 'register'];
	public $uses = [
			'PostModel'
	];
	
	public function __construct($controller, $action, $params = [])
	{
		parent::__construct($controller, $action, $params = []);
		$this->beforeAction($action);
	}
	
	public function beforeAction($action)
	{
		if($action != 'error')
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
	}

	public function actionCreate()
	{

	}

	public function actionUpdate()
	{

	}

	public function actionIndex()
	{

	}

	public function actionError($error = '404')
	{

	}
}