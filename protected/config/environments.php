<?php 

$url = $_SERVER['HTTP_HOST'];
$url = explode('.', $url);

switch($url[0])
{
	case 'dev':
		return array(
			'adminEmail'=> 'thaismartinsweb@gmail.com',
			'pageName'=> 'CMS',
			'adminUrl' 	=> 'http://dev.bcash.com.br/admin/',
			'logoutUrl' => 'http://dev.bcash.com.br/admin/default/logout',
			'url' 		=> 'http://dev.bcash.com.br/',
			'publicPath' => '/var/www/site/public/',
		);
		break;
	case 'localhost':
		return array(
			'adminEmail'=> 'thaismartinsweb@gmail.com',
			'pageName'=> 'CMS',
			'adminUrl' 	=> 'http://localhost/admin/',
			'logoutUrl' => 'http://localhost/admin/default/logout',
			'url' 		=> 'http://localhost/',
			'publicPath' => '/var/www/site/public/',
		);
		break;
}
