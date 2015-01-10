<?php
class Messages {
	
	public static function show($errors) 
	{
		if ($errors){
			$message = '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
			$message .= '<i class="fa fa-exclamation-triangle fa-1x" style="margin-right:10px"></i>';
			$message .= '<b>' . Yii::t('admin', 'Erro ao salvar') . '</b>';
			
			return '<div class="alert alert-danger alert-dismissable">' . $message . $errors . '</div>';				
		}
		else if(Yii::app()->request->isPostRequest){
			$message = '<div class="alert alert-success alert-dismissable">';
			$message .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
			$message .= '<i class="fa fa-check fa-1x" style="margin-right:10px"></i>';
			$message .=  Yii::t('admin', 'Conteudo salvo com sucesso'). '</div>';
			return $message;
		}
	}
	
	public static function ajax($model)
	{
		if(!$model){
			$error = '<ul><li>'.Yii::t('admin', 'Item nao encontrado').'</li></ul>';
			return self::show($error);
		}
		
		$message = '<div class="alert alert-success alert-dismissable">';
		$message .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
		$message .= '<i class="fa fa-check fa-1x" style="margin-right:10px"></i>';
		$message .=  Yii::t('admin', 'Conteudo excluido com sucesso'). '</div>';
		return $message;
	}
}