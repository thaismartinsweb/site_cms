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
						<?php echo CHtml::activeLabel($model,'title', array('label' => 'Título da Categoria')); ?>
						<?php echo CHtml::activeTextField($model,'title', array('class' => 'form-control field-xxlg', 'placeholder' => 'Título')) ?>
					</div>

					<div class="form-group">
						<?php echo CHtml::activeLabel($model,'description', array('label' => 'Descrição do Menu')); ?>
						<?php echo CHtml::activeTextArea($model,'description', array('class' => 'form-control field-xxlg', 'placeholder' => 'Breve descrição sobre esta categoria')) ?>
					</div>
					
					<div class="form-group">
						<?php echo CHtml::activeLabel($model, 'image', array('label' => 'Imagem da Categoria')); ?>
						<?php echo CHtml::activeFileField($model, 'image'); ?>
						<?php if(isset($model['image'])){ ?>
							<a href="/public/<?php echo strtolower($this->model) ?>/<?php echo $model['image']?>" data-lightbox="<?php echo $model['image']?>">
								<img src="/public/<?php echo strtolower($this->model) ?>/<?php echo $model['image']?>" style="margin:10px;max-width:100px;max-height:100px;" title="Logo" alt="Logo" />
							</a>
						<?php }?>
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