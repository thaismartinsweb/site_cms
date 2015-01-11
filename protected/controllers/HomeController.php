<?php

class HomeController extends Controller
{
	public $config;
	
	public function actionIndex()
	{
		$this->config = Config::model()->findByPk(1);
		
		$this->layout = "main";
		$this->render('index');
	}
}