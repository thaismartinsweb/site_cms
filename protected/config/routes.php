<?php

$data['<module:\w+>/'] = '<module>/default/index';
$data['<module:\w+>/<controller:\w+>'] = '<module>/<controller>';
$data['<module:\w+>/<controller:\w+>/<action:\w+>'] = '<module>/<controller>/<action>';
$data['<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>'] = '<module>/<controller>/<action>';

$data['<controller:\w+>/<id:\d+>'] = '<controller>/view';
$data['<controller:\w+>/<action:\w+>'] = '<controller>/<action>';
$data['<controller:\w+>/<action:\w+>/<id:\d+>'] = '<controller>/<action>';

return $data;