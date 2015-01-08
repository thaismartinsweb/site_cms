<?php

class ProductController extends Controller
{
	public function beforeAction($action)
	{
		$this->layout = 'admin';
		$this->model  = 'Product';
		$this->post   = isset($_POST['Product']) ? $_POST['Product'] : false;
		$this->resolvePostAction($action);
		return parent::beforeAction($action);
	}

	public function actionEdit($id = null)
	{
		if($id){
			$this->breadcrumbs = array('Produtos' => array('admin/'.strtolower($this->model)), 'Editar Conteúdo');
			
			$model = $this->getCurrentModel($id);		
			$data = array(	'model' => $model,
							'categories' => $this->getCategoriesProduct());
			
			$this->render('edit', $data);
		} else {
			$this->redirect('index');
		}
	}
	
	public function actionNew()
	{
		$this->breadcrumbs = array('Produtos' => array('admin/'.strtolower($this->model)), 'Adicionar Conteúdo');
		
		$model = $this->getCurrentModel();
		$data = array(	'model' => $model,
						'categories' => $this->getCategoriesProduct());
		
		$this->render('edit', $data);		
	}

	public function actionIndex()
	{
		$this->breadcrumbs = array('Produtos');
		$itens = Product::model()->findAll();
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