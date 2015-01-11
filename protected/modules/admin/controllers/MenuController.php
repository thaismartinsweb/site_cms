<?php

class MenuController extends Controller
{
	public function actionIndex()
	{
		$menus = Menu::model()->findAll(array('order' => 'exibition ASC'));
	
		$this->render('index', array('itens' => $menus));
	}

	public function actionEdit($id = null)
	{

		$model = Menu::model()->findByPk($id);
		
		if(!$model) {
			$model = new Menu();
		}
		
		if(isset($_POST['Menu'])) {
			$model->attributes = $_POST['Menu'];
				
			$image = CUploadedFile::getInstance($model, 'image');
				
			if($image) {
				$file = Yii::app()->params['publicPath'].Yii::app()->controller->id.'/'.$image->name;
				$image->saveAs($file);
				$model->image = $image->name;
			}
				
			$model->save();
		}
		
		$types = TypeMenu::model()->findAll();
		$menus = Menu::model()->findAll(array('order' => 'exibition ASC'));

		$this->render('edit', array('model' => $model,
									'types' => CHtml::listData($types, 'id', 'title'),
									'menus' => CHtml::listData($menus, 'id', 'title') ));
	}

	public function actionRemove($id)
	{
		Yii::log('Deletando conteúdo do site - id '.$id, 'info');

		$model = Content::model()->findByPk($id);
		$model->delete();
		
		$this->redirect($this->createUrl('index'));
	}
}