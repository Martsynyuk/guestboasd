<?php

class Redirect
{	
	public static function to($patch)
	{
		header('Location: ' . $patch . '');
	}
}