<?php

class ContentController extends Controller
{
	public function beforeAction($action)
	{
		$this->post = isset($_POST['Content']) ? $_POST['Content'] : false;
		return parent::beforeAction($action);
	}

	public function actionEdit($id = null)
	{
		if($id){
			$data = array(	'model' => $this->getCurrentModel($id),
							'types' => $this->getTypesPage(),
							'menus' => $this->getMenus());
			
			$this->render('edit', $data);
		} else {
			$this->redirect('index');
		}
	}
	
	public function actionNew()
	{
		$data = array(	'model' => $this->getCurrentModel(),
						'types' => $this->getTypesPage(),
						'menus' => $this->getMenus());
		
		$this->render('edit', $data);		
	}

	public function actionIndex()
	{
		$data = array('itens' => Content::model()->findAll(array('order'=>'date_create DESC')));
		$this->render('index', $data);
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