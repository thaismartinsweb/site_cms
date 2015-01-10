<?php

class ConfigController extends Controller
{
	public function actionIndex()
	{
		Yii::log('Editando Dados do Site', 'info');
		
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
			
			$model->save();
		}
		
		$this->render('index', array('model' => $model));
	}
	
}