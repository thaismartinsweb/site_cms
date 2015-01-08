<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><?php echo isset($model->id) ? 'Editar Conteúdo' : 'Adicionar Conteúdo'?></h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<?php echo CHtml::beginForm('', 'post', array('enctype'=>'multipart/form-data')); ?>
					
					<?php echo CHtml::activeHiddenField($model,'id') ?>
					
					<?php echo CHtml::showErrorMessage($model); ?>
					<?php echo CHtml::showSuccessMessage();?>
				
					<div class="form-group">
						<?php echo CHtml::activeLabel($model,'title', array('label' => 'Título do Video')); ?>
						<?php echo CHtml::activeTextField($model,'title', array('class' => 'form-control field-xxlg', 'placeholder' => 'Título')) ?>
					</div>
					
					<?php if($galleries){ ?>
						<div class="form-group">
							<?php echo CHtml::activeLabel($model,'video_gallery_id', array('label' => 'Galeria')); ?>
							<?php echo CHtml::activeDropDownList($model,'video_gallery_id', $galleries, array('class' => 'form-control  field-md', 'empty' => '')) ?>
						</div>
					<?php }?>
					
					<?php if($types){ ?>
						<div class="form-group">
							<?php echo CHtml::activeLabel($model,'type_video_id', array('label' => 'Tipo de Video')); ?>
							<?php echo CHtml::activeDropDownList($model,'type_video_id', $types, array('class' => 'form-control field-sm')) ?>
						</div>
					<?php }?>
					
					<div class="form-group">
						<?php echo CHtml::activeLabel($model,'description', array('label' => 'Descrição do Menu')); ?>
						<?php echo CHtml::activeTextArea($model,'description', array('class' => 'form-control field-xxlg', 'placeholder' => 'Breve descrição sobre o video')) ?>
					</div>
					
					<div class="form-group">
						<?php echo CHtml::activeLabel($model,'url', array('label' => 'URL do Video')); ?>
						<?php echo CHtml::activeTextField($model,'url', array('class' => 'form-control field-xxlg', 'placeholder' => 'http://youtube.com/')) ?>
					</div>
			
					<?php echo CHtml::submitButton(isset($model->id) ? 'Alterar' : 'Salvar', array('class' => 'btn btn-primary')); ?>
					
				<?php echo CHtml::endForm(); ?>
			</div>
		</div>
	</div>
</div>