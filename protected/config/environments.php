<?php 

$url = $_SERVER['HTTP_HOST'];
$url = explode('.', $url);

switch($url[0])
{
	case 'dev':
		$data = array(
			'adminEmail'=> 'thaismartinsweb@gmail.com',
			'publicPath' => '/var/www/site/public/',
		);
	break;
	
	case 'localhost':
		$data =  array(
			'adminEmail'=> 'thaismartinsweb@gmail.com',
			'publicPath' => '/var/www/html/public/',
		);
	break;
	
	default:
		$data =  array(
			'adminEmail'=> 'thaismartinsweb@gmail.com',
			'publicPath' => '/var/www/site/public/',
		);
	break;
	
}

return $data;