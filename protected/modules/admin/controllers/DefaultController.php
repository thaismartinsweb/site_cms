<?php

class DefaultController extends Controller
{ 	
 	public function actionLogin(){
 		
 		$this->layout = 'main';
 		
 		$model = new User();
 		$data['model'] = $model;
 		var_dump($_POST);
 		if(isset($_POST['User'])){
 			
 			$model->attributes = $_POST['User'];
 			var_dump($model);
 			if($model->validate() && $model->login())
 			{
 				$this->redirect($this->createUrl('default/index'));
 			} 
 		}
 		
 		$this->render('login', $data);
 	}
 	
 	public function actionDoLogin(){
 		var_dump($_POST);
 		die('TAQUEOPA..');
 	}
	
	public function actionIndex()
	{
		$data = array( 'modules' => Module::model()->findAll(),
					   'contents' => Content::model()->findAll());
		
		$this->render('index', $data);
	}
	
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else {
				$this->layout = 'admin';
				$this->render('error', $error);
			}
	
		}
	}
	
	public function actionLogout()
	{
		Yii::app()->user->logout(false);
		$this->redirect(Yii::app()->getModule('admin')->user->loginUrl);
	}
	
}