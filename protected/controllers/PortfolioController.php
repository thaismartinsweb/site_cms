<?php

class PortfolioController extends Controller
{

	public function actionCliente($id)
	{
		echo 'entrou';exit;
		$this->config = Config::model()->findByPk(1);
		$portfolio = Portfolio::model()->findByPk(1);
		
		$this->render('index', array('portfolio' => $portfolio));
	}
}