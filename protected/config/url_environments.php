<?php 

$url = $_SERVER['HTTP_HOST'];
$url = explode('.', $url);

switch($url[0])
{
	case 'dev':
		return 'http://dev.bcash.com.br/';
	break;
	
	case 'localhost':
		return 'http://localhost/';
	break;
	
	default:
		return 'http://thaismartins.rocks/';
	break;
	
}