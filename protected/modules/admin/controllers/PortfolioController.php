<?php

class PortfolioController extends Controller
{

	public function actionIndex()
	{
		$portfolios = Portfolio::model()->findAll(array('order' => 'id DESC'));

		$this->render('index', array('itens' => $portfolios));
	}

	public function actionEdit($id = null)
	{

		$model = Portfolio::model()->findByPk($id);
		
		if(!$model) {
			$model = new Portfolio();
		}
		
		if(isset($_POST['Portfolio'])) {
			$model->attributes = $_POST['Portfolio'];
				
			$image = CUploadedFile::getInstance($model, 'image');
				
			if($image) {
				$file = Yii::app()->params['publicPath'].Yii::app()->controller->id.'/'.$image->name;
				$image->saveAs($file);
				$model->image = $image->name;
			}
			
			if($model->save() && isset($_POST["tags_portfolio"])) {
				$this->saveTypes($model->id, $_POST["tags_portfolio"]);
				$id = $model->id;
			}
		}
		
		$typesPortfolio = Tag::model()->findAll();
		$typesSelecteds = $this->getTypesSelected($id);
		
		$this->render('edit', array('model' => $model,
									'typesSelected' => $typesSelecteds,
									'types' => CHtml::listData($typesPortfolio, 'id', 'title')));
	}

	public function actionRemove($id)
	{
		Yii::log('Deletando conteúdo do site - id '.$id, 'info');

		TagXPortfolio::model()->deleteAllByPortfolio($id);
		
		$model = Portfolio::model()->findByPk($id);
		$model->delete();
		
		$this->redirect($this->createUrl('index'));
	}
	
	private function getTypesSelected($id)
	{
		if($id){
			$types = TagXPortfolio::model()->findAllByAttributes(array('id_portfolio' => $id));
			
			$selecteds = '';
			
			foreach($types as $type) {
				$selecteds[] = $type->id_tag;
			}
			
			return $selecteds;
		}
		
		return null;
	}
	
	private function saveTypes($idPortfolio, $tags)
	{
		TagXPortfolio::model()->deleteAllByPortfolio($idPortfolio);
		
		foreach($tags as $tag) {
			$model = new TagXPortfolio();
			$model->id_portfolio = $idPortfolio;
			$model->id_tag = $tag;
			$model->save();
		}
	}
	
}