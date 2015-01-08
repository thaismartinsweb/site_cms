<?php

class AdminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
		
		$this->setComponents(array(
										'errorHandler' => array(
																'errorAction'=>'admin/default/error'
																),
										'user' => array(
														'class' => 'CWebUser',
														'loginUrl' => Yii::app()->createUrl('admin/default/login'),
														'returnUrl' => Yii::app()->createUrl('admin/default/index'),
														),
									));
		
		$this->layoutPath = Yii::getPathOfAlias('admin.views.layouts');
		$this->layout = 'admin';
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			$route = $controller->id . '/' . $action->id;
			
			$publicPages = array(
					'default/login',
					'default/error',
			);
			
			if(Yii::app()->getModule('admin')->user->isGuest && !in_array($route, $publicPages))
			{
				Yii::app()->request->redirect(Yii::app()->getModule('admin')->user->loginUrl);
			}
			return true;
		}
		else
			return false;
	}
}
