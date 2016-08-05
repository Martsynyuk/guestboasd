<?php

class Post extends Model
{
	protected $tableName = 'post';
	protected $validationRules = [
				'default' => [
					'title' => [
						'max' => 100,
						'required' => true,
					],
					'body' => [
						'max' => 255,
						'required' => true,
					],
					'lat' => [
						'intiger' => true,
						'required' => true,
					],
					'lng' => [
						'intiger' => true,
						'required' => true,
					],
				],
	];
	
	public function findPosts($id = false)
	{
		if($id) {
			return $this->find(['user_id' => ['=', User::getUserId()], 'id' => ['=', $id]]);
		}
		return $this->find(['user_id' => ['=', User::getUserId()]]);
	}
	
	public function autorization($id)
	{
		return $this->find(['user_id' => ['=', User::getUserId()], 'id' => ['=', $id]]);
	}
	
	public function deletePost($id)
	{
		return $this->deleteRecord(['user_id' => ['=', User::getUserId()], 'id' => ['=', $id]]);
	}
	
	public function savePost($id = false)
	{
		if(!$id) {
			return $this->save([
				'user_id' => User::getUserId(),
				'title' => $_POST['title'],
				'body' => $_POST['body'],
				'lat' => $_POST['lat'],
				'lng' => $_POST['lng'],
			]);
		}
		return $this->save([
				'title' => $_POST['title'],
				'body' => $_POST['body'],
				'lat' => $_POST['lat'],
				'lng' => $_POST['lng'],
				],
				[
				'user_id' => ['=', User::getUserId()], 'id' => ['=', $id]
				]);
	}
}