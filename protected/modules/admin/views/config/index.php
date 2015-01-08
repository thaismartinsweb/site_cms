<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Editar Conteúdo</h3>
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
					
					<?php echo $form->errorSummary($model);?>

					<div class="form-group">
						<?php echo $form->labelEx($model,'title'); ?>
						<?php echo $form->textField($model,'title', array('class' => 'form-control field-xxlg', 'placeholder' => 'Título')) ?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model, 'image'); ?>
						<?php echo $form->fileField($model, 'image'); ?>
						
						<?php if(isset($model['image'])){ ?>
							<?php $image = '/public/' . Yii::app()->controller->id . '/' . $model['image'];?>
							<a href="<?php echo $image ?>" data-lightbox="<?php echo $model['image']?>">
								<?php echo CHtml::image($image, 'Imagem', array('style' => 'max-width:100;margin:10px;'));?>
							</a>
						<?php }?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model,'email'); ?>
						<?php echo $form->textField($model,'email', array('class' => 'form-control field-xlg', 'placeholder' => 'email@email.com.br')) ?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model,'contact'); ?>
						<?php echo $form->textField($model,'contact', array('class' => 'form-control field-lg', 'placeholder' => '(11)2222-2222')) ?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model,'address'); ?>
						<?php echo $form->textField($model,'address', array('class' => 'form-control field-xxlg', 'placeholder' => 'Rua Blabla, 123')) ?>
					</div>
					
					<?php echo CHtml::submitButton($model->id ? Yii::t('app', 'Alterar') :  Yii::t('app', 'Salvar'), array('class' => 'btn btn-primary')); ?>
					
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>
