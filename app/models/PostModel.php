<?php

class PostModel extends Model
{
	protected $tableName = 'users';
	protected $validationRules = [
		'username' => [
			'min' => 6,
			'max' => 20,
			'unique' => true,
		],
		'password' => [
			'min' => 4,
			'max' => 10,
			'matches' => [
				'password',
				'confirmpassword',
				],
		],
	];
}