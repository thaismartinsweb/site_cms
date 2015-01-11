<?php

class PhotoController extends Controller
{
	
	public function actionIndex()
	{
		$photos = Photo::model()->findAll(array('order' => 'exibition'));
		$this->render('index', array('itens' => $photos));
	}
	
	public function actionEdit($id = null)
	{
	
		$model = Photo::model()->findByPk($id);
	
		if(!$model) {
			$model = new Photo();
		}
	
		if(isset($_POST['Photo'])) {
			$model->attributes = $_POST['Photo'];
	
			$image = CUploadedFile::getInstance($model, 'image');
	
			if($image) {
				$file = Yii::app()->params['publicPath'].Yii::app()->controller->id.'/'.$image->name;
				$image->saveAs($file);
				$model->image = $image->name;
			}
	
			$model->save();
		}
	
		$portfolios = Portfolio::model()->findAll();
		
		$this->render('edit', array('model' => $model,
									'portfolios' => CHtml::listData($portfolios, 'id', 'title')));
	}
	
	public function actionEditImage($id)
	{
		$this->post = isset($_POST['Photo']) ? $_POST['Photo'] : false;
		$model = $this->setPost();

		if($model->save()) {
			Yii::app()->user->setFlash('save','Conteúdo salvo com sucesso!');
			$this->redirect($this->createUrl('edit' . $model->photo_gallery_id));
		} else {
			Yii::app()->user->setFlash('error', $model);
		}
	}

public function actionRemove($id)
	{
		Yii::log('Deletando conteúdo do site - id '.$id, 'info');

		$model = Photo::model()->findByPk($id);
		$model->delete();
		
		$this->redirect($this->createUrl('index'));
	}
	
}