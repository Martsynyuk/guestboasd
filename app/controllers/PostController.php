<?php

class PostController extends Controller
{
	public $uses = [
			'PostModel'
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
				'users' => ['guest'],
				'actions' => ['create', 'update', 'index'],
			],
		];
		
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