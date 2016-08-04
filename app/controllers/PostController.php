<?php

class PostController extends Controller
{
	public $uses = [
		'Post'
	];
	
	public function __construct($controller, $action, $params = [])
	{
		$this->autorization = $this->autorizationRules();
		parent::__construct($controller, $action, $params);
	}
	
	public function autorizationRules()
	{
		return [
			'deny' => [
				'users' => ['guest'],
				'actions' => ['create', 'update', 'index', 'delete', 'my'],
				'redirect' => '/user/login',
			],
		];
		
	}

	public function actionCreate()
	{
		if(!empty($_POST)) {
			if($this->Post->validate('create', $_POST) && $this->Post->save(['user_id' => User::getUserId(), 
																			 'title' => $_POST['title'],
																			 'body' => $_POST['body'],
																			 'lat' => $_POST['lat'],
																			 'lng' => $_POST['lng'],
			])) {
				Redirect::to('/post/my');
			} else {
				$this->set('error', $this->Post->getErrors());
			}
		}
	}

	public function actionUpdate()
	{
		if(!isset($this->params[0])) {
			Redirect::to('/post/my');
		}
		if(!empty($_POST)) {
			if($this->Post->validate('create', $_POST) && !empty($this->Post->find(['user_id' => ['=', User::getUserId()], 'id' => ['=', $this->params[0]]]))) {
				$this->Post->save(['title' => $_POST['title'],
		   						   'body' => $_POST['body'],
								   'lat' => $_POST['lat'],
								   'lng' => $_POST['lng'],
								], 
								['user_id' => ['=', User::getUserId()], 'id' => ['=', $this->params[0]]]);
				Redirect::to('/post/my');
			} else {
				$informations = $_POST;
				$this->set('informations', $informations);
				$this->set('error', $this->Post->getErrors());
				$this->set('id', $this->params[0]);
			}
		} else {
			$this->Post->find(['user_id' => ['=', User::getUserId()], 'id' => ['=', $this->params[0]]]);
			$informations = $this->Post->getFirstResult();		
			$this->set('informations', $informations);
			$this->set('id', $this->params[0]);
		}
	}

	public function actionIndex()
	{
		$informations = $this->Post->find();
		$this->set('informations', $informations);
	}
	
	public function actionMy()
	{
		$informations = $this->Post->find(['user_id' => ['=', User::getUserId()]]);
		$this->set('informations', $informations);
	}
	
	public function actionDelete()
	{
		if($this->Post->find(['user_id' => ['=', User::getUserId()], 'id' => ['=', $this->params[0]]])) {
			$this->Post->deleteRecord(['user_id' => ['=', User::getUserId()], 'id' => ['=', $this->params[0]]]);
			Redirect::to('/post/my');
		} else {
			Redirect::to('/user/logout');
		}
	}

	public function actionError($error = '404')
	{

	}
}