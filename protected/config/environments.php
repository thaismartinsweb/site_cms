<?php 

$url = $_SERVER['HTTP_HOST'];
$url = explode('.', $url);

switch($url[0])
{
	case 'dev':
		$data = array(
			'adminEmail'=> 'thaismartinsweb@gmail.com',
			'siteUrl'=> 'https://dev.bcash.com.br/',
			'publicPath' => str_replace('protected', 'public', dirname(__DIR__)) . '/',
		);
	break;
	
	case 'localhost':
		$data =  array(
			'adminEmail'=> 'thaismartinsweb@gmail.com',
			'siteUrl'=> 'http://localhost/',
			'publicPath' => str_replace('protected', 'public', dirname(__DIR__)) . '/',
		);
	break;
	
	default:
		$data =  array(
			'adminEmail'=> 'thaismartinsweb@gmail.com',
			'siteUrl'=> 'http://thaismartins.rocks/',
			'publicPath' => str_replace('protected', 'public', dirname(__DIR__)) . '/',
		);
	break;
	
}

return $data;