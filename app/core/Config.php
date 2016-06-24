<?php

require_once('app/config/config.php');

class Config
{
	public static function get($path = null)
	{
		if($path) {
			$config = $GLOBALS;
			$path = explode('/', $path);

			foreach($path as $value) {
				if(isset($config[$value])) {
					$config = $config[$value];
				}
			}
			return $config;
		}
		return false;
	}	
}