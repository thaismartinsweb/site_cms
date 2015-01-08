<?php

class PhotogalleryController extends Controller
{
	public function beforeAction($action)
	{
		$this->post = isset($_POST['PhotoGallery']) ? $_POST['PhotoGallery'] : false;
		return parent::beforeAction($action);
	}

	public function actionEdit($id = null)
	{
		if($id){
			$data = array('model' => $this->getCurrentModel($id),
					      'photos' => $this->getPhotosByGallery($id) );
			
			$data['view_photos'] = $this->renderPartial('photos', $data, true);
			$this->render('edit', $data);
			
		} else {
			$this->redirect('index');
		}
	}
	
	public function actionEditImage($id = null)
	{
		if($id){
			$this->model = 'Photo';
			$this->post = isset($_POST['Photo']) ? $_POST['Photo'] : false;
			$model = $this->setPost();

			if($model->save()) {
				Yii::app()->user->setFlash('save','Conteúdo salvo com sucesso!');
				$this->redirect($this->createUrl('edit' . $model->photo_gallery_id));
			} else {
				Yii::app()->user->setFlash('error', $model);
			}
		} else {
			$this->redirect('index');
		}
	}

	public function actionNew()
	{
		$this->render('edit', array('model' => $this->getCurrentModel()));		
	}

	public function actionIndex()
	{
		$this->render('index', array('itens' => Photogallery::model()->findAll(array('order'=>'exibition'))));
	}
	
	public function actionRemove($id = null)
	{
		if($id)
		{
			$model = $this->getCurrentModel($id);
			$this->deleteModel($model);
		}
	
		$this->redirect($this->createUrl('index'));
	}
	
}