<?php

class VideogalleryController extends Controller
{
	public function beforeAction($action)
	{
		$this->layout = 'admin';
		$this->model  = 'VideoGallery';
		$this->post   = isset($_POST['VideoGallery']) ? $_POST['VideoGallery'] : false;
		$this->resolvePostAction($action);
		return parent::beforeAction($action);
	}

	public function actionEdit($id = null)
	{
		if($id){
			$this->breadcrumbs = array('Galeria de Videos' => array('admin/'.strtolower($this->model)), 'Editar Conteúdo');
			
			$model = $this->getCurrentModel($id);
			$data = array('model' => $model);
			
			$this->render('edit', $data);
		} else {
			$this->redirect('index');
		}
	}

	public function actionNew()
	{
		$this->breadcrumbs = array('Galeria de Videos' => array('admin/'.strtolower($this->model)), 'Adicionar Conteúdo');
		
		$model = $this->getCurrentModel();
		$data = array('model' => $model);
		
		$this->render('edit', $data);		
	}

	public function actionIndex()
	{
		$this->breadcrumbs = array('Galeria de Videos');
		$itens = VideoGallery::model()->findAll(array('order'=>'exibition'));
		$data = array('itens' => $itens);
		$this->render('index', $data);
	}
	
	public function actionRemove($id = null)
	{
		if($id)
		{
			$model = $this->getCurrentModel($id);
			$this->deleteModel($model);
		}
	
		$this->redirect(array('admin/'.strtolower($this->model).'/index'));
	}
	
}