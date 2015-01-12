<?php

$url = $_SERVER['HTTP_HOST'];
$url = explode('.', $url);

switch($url[0])
{
	case 'dev':
		$data = array(
				'connectionString' => 'mysql:host=127.0.0.1;dbname=thaismar_site',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => 'root',
				'charset' => 'utf8',
				'enableParamLogging' => true,
				'enableProfiling' => true,
		);
	break;
	
	case 'localhost':
		$data = array(
				'connectionString' => 'mysql:host=127.0.0.1;dbname=thaismar_site',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => 'teste123',
				'charset' => 'utf8',
				'enableParamLogging' => true,
				'enableProfiling' => true,
		);
	break;
	
	default:
		$data = array(
			'connectionString' => 'mysql:host=177.11.48.142;dbname=thaismar_site',
			'emulatePrepare' => true,
			'username' => 'thaismar_admin',
			'password' => '!cms@2015',
			'charset' => 'utf8',
			'enableParamLogging' => true,
			'enableProfiling' => true,
		);
	break;
	
	
}

return $data;