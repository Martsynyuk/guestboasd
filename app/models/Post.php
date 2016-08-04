<?php

class Post extends Model
{
	protected $tableName = 'information';
	protected $validationRules = [
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
	];
	
	public function getFirstResult()
	{
		return $this->db->getFirstResult();
	}
}