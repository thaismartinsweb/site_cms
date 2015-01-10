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
	
	protected function getTypesMenu()
	{
		$typeMenus = TypeMenu::model()->findAll();
	
		if($itens){
			return CHtml::listData($typeMenus, 'id', 'title');
		}
	
		return false;
	}
	
	protected function getTypesVideo()
	{
		$typeVideos = TypeVideo::model()->findAll();
		
		if($itens){
			return CHtml::listData($typeVideos, 'id', 'title');
		}
		
		return false;
	}
	
	protected function getVideoGalleries()
	{
		$videoGaleries = VideoGallery::model()->findAll();
	
		if($itens){
			return CHtml::listData($videoGaleries, 'id', 'title');
		}
	
		return false;
	}
	
	protected function getCategoriesProduct()
	{
		$productCategories = ProductCategory::model()->findAll();
	
		if($itens){
			return CHtml::listData($productCategories, 'id', 'title');
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
	
	
}