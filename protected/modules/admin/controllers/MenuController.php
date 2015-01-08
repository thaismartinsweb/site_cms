<?php

class MenuController extends Controller
{
	public function beforeAction($action)
	{
		$this->post = isset($_POST['Menu']) ? $_POST['Menu'] : false;
		return parent::beforeAction($action);
	}

	public function actionEdit($id = null)
	{
		if($id){
			$data = array(	'model' => $this->getCurrentModel($id),
							'types' => $this->getTypesMenu(),
							'menus' => $this->getMenus());
			
			$this->render('edit', $data);
		} else {
			$this->redirect('index');
		}
	}

	public function actionNew()
	{

		$data = array(	'model' => $this->getCurrentModel(),
						'types' => $this->getTypesMenu(),
						'menus' => $this->getMenus());
		
		$this->render('edit', $data);		
	}

	public function actionIndex()
	{
		$data = array('itens' => Menu::model()->findAll(array('order'=>'exibition')));
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