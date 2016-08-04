<?php

class Redirect
{	
	public static function to($patch = null)
	{
		header('Location: ' . $patch . '');
	}
}