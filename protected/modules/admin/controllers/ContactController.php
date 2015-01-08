<?php

class ContactController extends Controller
{
	public function actionView($id = null)
	{
		if($id){
			$data = array(	'model' => $this->getCurrentModel($id),
							'types' => $this->getTypesMenu(),
							'menus' => $this->getMenus());
			
			$this->render('view', $data);
		} else {
			$this->redirect($this->createUrl('index'));
		}
	}

	public function actionIndex()
	{
		$this->breadcrumbs = $this->createBreadcrumbs('index');
		$itens = Contact::model()->findAll(array('order'=>'date_create DESC'));
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
	
		$this->redirect($this->createUrl('index'));
	}
	
}