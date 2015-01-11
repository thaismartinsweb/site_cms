<?php 

$url = $_SERVER['HTTP_HOST'];
$url = explode('.', $url);

switch($url[0])
{
	case 'dev':
		$data = array(
			'adminEmail'=> 'thaismartinsweb@gmail.com',
			'publicPath' => str_replace('proteced', 'public', dirname(__DIR__)) . '/',
		);
	break;
	
	case 'localhost':
		$data =  array(
			'adminEmail'=> 'thaismartinsweb@gmail.com',
			'publicPath' => str_replace('proteced', 'public', dirname(__DIR__)) . '/',
		);
	break;
	
	default:
		$data =  array(
			'adminEmail'=> 'thaismartinsweb@gmail.com',
			'publicPath' => str_replace('proteced', 'public', dirname(__DIR__)) . '/',
		);
	break;
	
}

return $data;