<?php

class ConfigController extends Controller
{
	public function actionIndex()
	{
// 		if(!Yii::app()->request->isPostRequest) {
// 			throw new  CHttpException(400, Yii::t('app', 'requisicao_invalida'));
// 		}

		$model = Config::model()->findByPk(1);
		
		if(!$model)
		{
			$model = new Config();
		}

		if(isset($_POST['Config']))
		{
			$model->attributes = $_POST['Config'];
			
			$image = CUploadedFile::getInstance($model, 'image');
			
			if($image)
			{
				$file = Yii::app()->params['publicPath'].Yii::app()->controller->id.'/'.$image->name;
				$image->saveAs($file);
				$model->image = $image->name;
			}
			
			if($model->save()) {
				Yii::app()->user->setFlash('save','Conteúdo salvo com sucesso!');
				$this->refresh();
			} else {
				Yii::app()->user->setFlash('error', $model);
			}
		}
		
		$this->render('index', array('model' => $model));
	}
	
}