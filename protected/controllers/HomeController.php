<?php

class HomeController extends Controller
{

	public function actionIndex()
	{
		$this->layout = "main";
		$this->render('index');
	}
}