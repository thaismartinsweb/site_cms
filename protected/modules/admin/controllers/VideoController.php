<?php

class VideoController extends Controller
{
	public function beforeAction($action)
	{
		$this->layout = 'admin';
		$this->model  = 'Video';
		$this->post   = isset($_POST['Video']) ? $_POST['Video'] : false;
		$this->resolvePostAction($action);
		return parent::beforeAction($action);
	}

	public function actionEdit($id = null)
	{
		if($id){
			$this->breadcrumbs = array('Video' => array('admin/'.strtolower($this->model)), 'Editar Conteúdo');
			
			$model = $this->getCurrentModel($id);
			$data = array(	'model' => $model,
							'types' => $this->getTypesVideo(),
							'galleries' => $this->getVideoGalleries());
			
			$this->render('edit', $data);
		} else {
			$this->redirect('index');
		}
	}

	public function actionNew()
	{
		$this->breadcrumbs = array('Video' => array('admin/'.strtolower($this->model)), 'Adicionar Conteúdo');
		
		$model = $this->getCurrentModel();
		$data = array(	'model' => $model,
						'types' => $this->getTypesVideo(),
						'galleries' => $this->getVideoGalleries());
		
		$this->render('edit', $data);		
	}

	public function actionIndex()
	{
		$this->breadcrumbs = array('Video');
		$itens = Video::model()->findAll();
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