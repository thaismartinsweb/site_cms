<?php
class Breadcrumbs {
	
	public static function create($controller, $action)
	{
		switch($action){
			case 'view':
				return array($controller => array($this->createUrl('index')), 'Visualizar Conteúdo');
			break;
	
			case 'new':
				return array($controller => array($this->createUrl('index')), 'Adicionar Conteúdo');
			break;
	
			case 'update':
				return array($controller => array($this->createUrl('index')),'Atualizar Conteúdo');
			break;
	
			case 'index':
				return array($controller);
			break;
		}
	}
	
}
