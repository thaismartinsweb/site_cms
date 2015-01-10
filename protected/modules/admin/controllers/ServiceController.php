<?php

class ServiceController extends Controller
{

	public function actionIndex()
	{
		$services = Service::model()->findAll(array('order' => 'id DESC'));

		$this->render('index', array('itens' => $services));
	}

	public function actionEdit($id = null)
	{
		$model = Service::model()->findByPk($id);
		
		if(!$model) {
			$model = new Service();
		}
		
		if(isset($_POST['Service'])) {
			$model->attributes = $_POST['Service'];
			$model->save();
		}

		$this->render('edit', array('model' => $model,
									'icons' => Icons::getAll()));
	}

	public function actionRemove($id)
	{
		Yii::log('Deletando conteúdo do site - id '.$id, 'info');

		$model = Service::model()->findByPk($id);
		$model->delete();
		
		$this->redirect($this->createUrl('index'));
	}

	
}