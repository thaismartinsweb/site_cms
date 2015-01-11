<?php $this->renderPartial('buttons'); ?>
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><?php echo isset($model->id) ? 'Editar Conteúdo' : 'Adicionar Conteúdo'?></h3>
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
						<?php echo CHtml::activeTextField($model, 'title', array('class' => 'form-control field-xxlg', 'placeholder' => 'Título')) ?>
					</div>
					
					<?php if($menus){ ?>
						<div class="form-group">
							<?php echo $form->labelEx($model, 'master_id'); ?>
							<?php echo$form->dropDownList($model, 'master_id', $menus, array('class' => 'form-control  field-md', 'empty' => '')) ?>
						</div>
					<?php }?>
					
					<?php if($types){ ?>
						<div class="form-group">
							<?php echo $form->labelEx($model, 'type_menu_id'); ?>
							<?php echo CHtml::activeDropDownList($model, 'type_menu_id', $types, array('class' => 'form-control field-sm')) ?>
						</div>
					<?php }?>

					<div class="form-group">
						<?php echo $form->labelEx($model, 'image'); ?>
						<?php echo CHtml::activeFileField($model, 'image'); ?>
						<?php if(isset($model['image'])){ ?>
							<a href="/public/<?php echo strtolower($this->model) ?>/<?php echo $model['image']?>" data-lightbox="<?php echo $model['image']?>">
								<img src="/public/<?php echo strtolower($this->model) ?>/<?php echo $model['image']?>" style="margin:10px;max-width:100px;max-height:100px;" title="Logo" alt="Logo" />
							</a>
						<?php }?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model, 'description'); ?>
						<?php echo CHtml::activeTextArea($model, 'description', array('class' => 'form-control field-xxlg', 'placeholder' => 'Breve descrição sobre este menu')) ?>
					</div>
					
					<div class="form-group">
						<?php echo $form->labelEx($model, 'exibition'); ?>
						<?php echo CHtml::activeTextField($model, 'exibition', array('class' => 'form-control field-sm', 'placeholder' => '1')) ?>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeCheckBox($model, 'special') ?>
						<?php echo $form->labelEx($model, 'special'); ?>
					</div>
			
					<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin', 'Salvar') : Yii::t('admin', 'Alterar'), array('class' => 'btn btn-primary')); ?>
					
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>