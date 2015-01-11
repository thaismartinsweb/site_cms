<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><?php echo Yii::t('admin', 'Editar Conteudo') ?></h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
			
					<?php $form = $this->beginWidget('CActiveForm', array(
						    'id' => 'user-form',
						    'enableAjaxValidation' => false,
						    'enableClientValidation' => false,
							'htmlOptions' => array('enctype'=>'multipart/form-data')
					)); ?>
					
					<?php echo Messages::show($form->errorSummary($model));?>

					<div class="form-group">
						<?php echo $form->labelEx($model, 'title'); ?>
						<?php echo $form->textField($model, 'title', array('class' => 'form-control field-xxlg', 'placeholder' => 'Título')) ?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model, 'image'); ?>
						<?php echo $form->fileField($model, 'image'); ?>
						
						<?php if(isset($model['image']) && $model['image'] != ""){ ?>
							<?php $image = '/public/' . Yii::app()->controller->id . '/' . $model['image'];?>
							<a href="<?php echo $image ?>" data-lightbox="<?php echo $model['image']?>">
								<?php echo CHtml::image($image, 'Imagem', array('style' => 'max-width:200px;margin:10px;'));?>
							</a>
						<?php }?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model, 'email'); ?>
						<?php echo $form->textField($model, 'email', array('class' => 'form-control field-xlg', 'placeholder' => 'email@email.com.br')) ?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model, 'contact'); ?>
						<?php echo $form->textField($model, 'contact', array('class' => 'form-control field-lg', 'placeholder' => '(11)2222-2222')) ?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model, 'site'); ?>
						<?php echo $form->textField($model, 'site', array('class' => 'form-control field-xxlg', 'placeholder' => 'http://www.teste.com.br')) ?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model, 'skype'); ?>
						<?php echo $form->textField($model, 'skype', array('class' => 'form-control field-xxlg', 'placeholder' => 'usuario')) ?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model, 'github'); ?>
						<?php echo $form->textField($model, 'github', array('class' => 'form-control field-xxlg', 'placeholder' => 'http://www.teste.com.br')) ?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model, 'behance'); ?>
						<?php echo $form->textField($model, 'behance', array('class' => 'form-control field-xxlg', 'placeholder' => 'http://www.teste.com.br')) ?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model, 'linkedin'); ?>
						<?php echo $form->textField($model, 'linkedin', array('class' => 'form-control field-xxlg', 'placeholder' => 'http://www.teste.com.br')) ?>
					</div>
					
					<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Salvar') : Yii::t('app', 'Alterar'), array('class' => 'btn btn-primary')); ?>
					
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>
