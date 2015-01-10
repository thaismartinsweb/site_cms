<?php $this->widget('application.extensions.tinymce.SladekTinyMce'); ?>
<?php $this->renderPartial('buttons'); ?>

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><?php echo $model->isNewRecord ? Yii::t('admin', 'Adicionar Conteudo') : Yii::t('admin', 'Editar Conteudo')?></h3>
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

					<?php if($types){ ?>
						<div class="form-group">
							<?php echo CHtml::label('Categorias', 'Categorias'); ?>
							<?php echo CHtml::dropDownList('type_portfolio[]', $typesSelected, $types, array('multiple' => 'multiple', 'class' => 'form-control field-sm')) ?>
						</div>
					<?php }?>

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
						<?php echo $form->labelEx($model, 'description'); ?>
						<?php echo $form->textArea($model, 'description', array('class' => 'form-control field-xxlg', 'placeholder' => 'Breve descrição sobre este conteúdo')) ?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model, 'content'); ?>
						<?php echo $form->textArea($model, 'content', array('class' => 'form-control field-xxlg', 'id' => 'content', 'rows' => '15')) ?>
					</div>
			
					<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin', 'Salvar') : Yii::t('admin', 'Alterar'), array('class' => 'btn btn-primary')); ?>
					
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>