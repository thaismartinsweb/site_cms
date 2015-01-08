<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout = 'admin';
	
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu = array();
	
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs = array();
	
	public $modelName;
	public $model;
	public $post;
	public $type;
	
	public function beforeAction($action){
	
		$this->breadcrumbs = Breadcrumbs::create(
									$this->findControllerName(Yii::app()->controller->id),
									Yii::app()->controller->action->id );
		return parent::beforeAction($action);
	}
	
	public function findControllerName($name)
	{
		
		$model = Module::model()->findByAttributes(array('controller' => $name));
		
		if($model)
		{
			return $model->title;
		}
		
		return '';
	}
	
// 	public function beforeAction($action)
// 	{
// 		$module = Module::model()->findByAttributes(array('controller' => $action->controller->id));

// 		if($module)
// 		{
// 			$this->model = ucfirst($module->controller);
// 			$this->modelName = $module->title;
// 		}
		
// 		$this->resolvePostAction($action);
// 		$this->breadcrumbs = $this->createBreadcrumbs($action->id);
		
// 		return parent::beforeAction($action);
// 	}
	
	public function resolvePostAction($action)
	{	
		$this->type = ($this->model == 'Config') ? 'new' : $action->id;
		
		if($this->post)
		{
			$model = $this->setPost();
					
			if($model->save()) {
				Yii::app()->user->setFlash('save','Conteúdo salvo com sucesso!');
				if($this->model == 'Config'){
					$this->refresh();
				} else {
					$this->redirect('/admin/'.strtolower($this->model).'/edit/' . $model->id);
				}
			} else {
				Yii::app()->user->setFlash('error', $model);
			}
		}
	}
	
	protected function getCurrentModel($id = null)
	{
		$class = $this->model;

		if($id)
		{
			if($item = $class::model()->findAllByPk($id)) {
				return $item[0];
			}
		}

		if($this->type == 'new' && $this->post)
		{
			return new $class;
		}

		return $class::model();
	}
	
	protected function setPost()
	{

		if($this->post)
		{
			$model = $this->getCurrentModel($this->post['id']);
			$this->post['date_create'] = date('Y-m-d H:i:s');
			$model->attributes = $this->post;

			$image = CUploadedFile::getInstance($model, 'image');
			
			if($this->model == 'PhotoGallery')
			{
				$this->setPostPhotos($model);
			}
			
			if($image)
			{
				$model->image = $image;
				$model->image->saveAs('/var/www/html/public/' . strtolower($this->model) . '/' . $model->image->name);
			}

			return $model;
		}
	}
	
	protected function setPostPhotos($model)
	{
		if($model)
		{
			$photos = CUploadedFile::getInstances($model, 'photos');
			
			if($photos)
			{
				foreach($photos as $photo)
				{
					$dir = '/var/www/html/public/' . strtolower($this->model) . '/' . $model->id . '/';
						
					if(!is_dir($dir)){
						mkdir($dir, 0777, true);
					}
						
					if($photo->saveAs( $dir . $photo->name))
					{
						$item = new Photo;
						$item->photo_gallery_id = $model->id;
						$item->image = $photo->name;
						$item->date_create = date('Y-m-d H:i:s');
						$item->save();
					}
				}
			}
		}
	}
	
	protected function getTypesPage()
	{
		$itens = TypePage::model()->findAll();
	
		if($itens){
			return CHtml::listData($itens, 'id', 'title');
		}
	
		return false;
	}
	
	protected function getTypesMenu()
	{
		$itens = TypeMenu::model()->findAll();
	
		if($itens){
			return CHtml::listData($itens, 'id', 'title');
		}
	
		return false;
	}
	
	protected function getTypesVideo()
	{
		$itens = TypeVideo::model()->findAll();
		
		if($itens){
			return CHtml::listData($itens, 'id', 'title');
		}
		
		return false;
	}
	
	protected function getVideoGalleries()
	{
		$itens = VideoGallery::model()->findAll();
	
		if($itens){
			return CHtml::listData($itens, 'id', 'title');
		}
	
		return false;
	}
	
	protected function getCategoriesProduct()
	{
		$itens = ProductCategory::model()->findAll();
	
		if($itens){
			return CHtml::listData($itens, 'id', 'title');
		}
	
		return false;
	}
	
	protected function getMenus()
	{
		$itens = Menu::model()->findAll();
	
		if($itens){			
			
			return CHtml::listData($itens, 'id', 'title');
		}
	
		return false;
	}
	
	protected function getPhotosByGallery($id)
	{
		$itens = Photo::model()->findAllByAttributes(array('photo_gallery_id' => $id));
	
		if($itens){

			if(is_array($itens)){
				return $itens;
			} else {
				$collections = new CMap();
				$collections->add(0, $itens);
				return $collections->toArray();
			}
		}
	
		return false;
	}
	
	
	
	protected function deleteModel($model){
		
		if($model)
		{
			if($model->delete())
			{
				Yii::app()->user->setFlash('save','Conteúdo deletado com sucesso!');
			}
			else
			{
				Yii::app()->user->setFlash('error', $model);
			}
		}
	}
	
	protected function createBreadcrumbs($page)
	{
		switch($page){
			
			case 'view':
				return array(
					$this->modelName => array($this->createUrl('index')),
					'Visualizar Conteúdo'
				);
				break;
			
			case 'new':
				return array(
					$this->modelName => array($this->createUrl('index')),
					'Adicionar Conteúdo'
				);
				break;
			
			case 'update':
				return array(
					$this->modelName => array($this->createUrl('index')),
					'Atualizar Conteúdo'
				);
				break;
			
			case 'index':
				return array($this->modelName);
				break;
		}
	}
	
	
}