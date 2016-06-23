<?php

namespace app\app\core;

require_once(APP . '/app/config/config.php');

class Config
{
	public static $dbConfig = $settings['database'] ;
}