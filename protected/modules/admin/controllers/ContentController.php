<?php

class ContentController extends Controller
{

	public function actionIndex()
	{
		$contents = Content::model()->findAll(array('order' => 'date_create DESC'));
	
		$this->render('index', array('itens' => $contents));
	}

	public function actionEdit($id = null)
	{

		$model = Content::model()->findByPk($id);
		
		if(!$model) {
			$model = new Content();
		}
		
		if(isset($_POST['Content'])) {
			$model->attributes = $_POST['Content'];
			$model->date_create = date('Y-m-d H:i:s');
				
			$image = CUploadedFile::getInstance($model, 'image');
				
			if($image) {
				$file = Yii::app()->params['publicPath'].Yii::app()->controller->id.'/'.$image->name;
				$image->saveAs($file);
				$model->image = $image->name;
			}
				
			$model->save();
		}
		
		$typePages = TypePage::model()->findAll();
		$menus = Menu::model()->findAll();

		$this->render('edit', array('model' => $model,
									'types' => CHtml::listData($typePages, 'id', 'title'),
									'menus' => CHtml::listData($menus, 'id', 'title')));
	}

	public function actionRemove($id)
	{
		Yii::log('Deletando conteúdo do site - id '.$id, 'info');

		$model = Content::model()->findByPk($id);
		$model->delete();
		
		$this->redirect($this->createUrl('index'));
	}
	
}