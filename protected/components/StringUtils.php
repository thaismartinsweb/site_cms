<?php

class StringUtils
{
	public static function removeSpace($str)
	{
		return str_replace(array(' ', '-'), array('_', '_'), strtolower($str));
	}
}