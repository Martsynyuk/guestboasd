<?php

class Redirect
{	
	public static function to($patch = null)
	{
		if($patch) {
			header('Location: ' . $patch . '');
		} else {
			header('Location: /');
		}
	}
}