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
						<?php echo CHtml::activeLabel($model,'title', array('label' => 'Título da Galeria')); ?>
						<?php echo CHtml::activeTextField($model,'title', array('class' => 'form-control field-xxlg', 'placeholder' => 'Título')) ?>
					</div>
					
					<div class="form-group">
						<?php echo CHtml::activeLabel($model,'description', array('label' => 'Descrição da Galeria')); ?>
						<?php echo CHtml::activeTextArea($model,'description', array('class' => 'form-control field-xxlg', 'placeholder' => 'Breve descrição sobre esta galeria')) ?>
					</div>
					
					<div class="form-group">
						<?php echo CHtml::activeLabel($model,'exibition', array('label' => 'Ordem de Exibição')); ?>
						<?php echo CHtml::activeTextField($model,'exibition', array('class' => 'form-control field-sm', 'placeholder' => '1')) ?>
					</div>
			
					<?php echo CHtml::submitButton(isset($model->id) ? 'Alterar' : 'Salvar', array('class' => 'btn btn-primary')); ?>
					
				<?php echo CHtml::endForm(); ?>
			</div>
		</div>
	</div>
</div>