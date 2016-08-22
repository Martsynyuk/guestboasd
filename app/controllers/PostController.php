<?php

class PostController extends Controller
{
	public $uses = [
		'Post'
	];
	
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
		$this->set('action', 'create');
		
		if(!empty($_POST)) {
			if($this->Post->validate('default', $_POST) && $this->Post->savePost()) {
				Redirect::to('/post/my');
			} else {
				$this->set('error', $this->Post->getErrors());
			}
		}
	}

	public function actionUpdate($id)
	{
		if(!isset($id[0])) {
			Redirect::to('/post/my');
		}
		
		$this->set('action', 'update');
		$this->set('id', $id[0]);
		
		if(!empty($_POST)) {
			if($this->Post->validate('default', $_POST) && !empty($this->Post->isUserPost($id[0]))) {
				$this->Post->savePost($id[0]);
				Redirect::to('/post/my');
			} else {
				$this->set('posts', $_POST);
				$this->set('error', $this->Post->getErrors());
			}
		} else {
			$this->Post->findPosts($id[0]);	
			$this->set('posts', $this->Post->getFirstResult());
		}
	}

	public function actionIndex()
	{
		$this->set('posts', $this->Post->find());
	}
	
	public function actionMy()
	{
		$this->set('posts', $this->Post->findPosts());
	}
	
	public function actionDelete($id)
	{
		if($this->Post->isUserPost($id[0])) {
			$this->Post->deletePost($id[0]);
			Redirect::to('/post/my');
		} else {
			Redirect::to('/user/logout');
		}
	}

	public function actionError($error = '404')
	{

	}
}