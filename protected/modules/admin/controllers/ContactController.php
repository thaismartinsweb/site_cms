<?php

class ContactController extends Controller
{
	public function actionShow($id)
	{
		$model = Contact::model()->findByPk($id);
		var_Dump($model);
		$this->render('view', array('model' => $model));
	}

	public function actionIndex()
	{
		$itens = Contact::model()->findAll(array('order' => 'date_create DESC'));
		$this->render('index', array('itens' => $itens));
	}
	
	public function actionRemove($id = null)
	{
		$model = Contact::model()->findByPk($id);
		$model->delete();
		
		$this->redirect($this->createUrl('index'));
	}
	
}