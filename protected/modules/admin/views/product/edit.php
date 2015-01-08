<?php $this->widget('application.extensions.tinymce.SladekTinyMce'); ?>
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><?php echo $model->id ? 'Editar Conteúdo' : 'Adicionar Conteúdo'?></h3>
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
						<?php echo CHtml::activeLabel($model,'title', array('label' => 'Nome do Produto')); ?>
						<?php echo CHtml::activeTextField($model,'title', array('class' => 'form-control field-xxlg', 'placeholder' => 'Título')) ?>
					</div>
					
					<?php if($categories){ ?>
						<div class="form-group">
							<?php echo CHtml::activeLabel($model,'product_category_id', array('label' => 'Categoria do Produto')); ?>
							<?php echo CHtml::activeDropDownList($model,'product_category_id', $categories, array('class' => 'form-control field-md', 'empty' => '')) ?>
						</div>
					<?php }?>

					<div class="form-group">
						<?php echo CHtml::activeLabel($model, 'image', array('label' => 'Foto do Produto')); ?>
						<?php echo CHtml::activeFileField($model, 'image'); ?>
						<?php if(isset($model['image'])){ ?>
							<a href="/public/<?php echo strtolower($this->model) ?>/<?php echo $model['image']?>" data-lightbox="<?php echo $model['image']?>">
								<img src="/public/<?php echo strtolower($this->model) ?>/<?php echo $model['image']?>" style="margin:10px;max-width:100px;max-height:100px;" title="Logo" alt="Logo" />
							</a>
						<?php }?>
					</div>
					
					<div class="form-group">
						<?php echo CHtml::activeLabel($model,'description', array('label' => 'Resumo do Produto')); ?>
						<?php echo CHtml::activeTextArea($model,'description', array('class' => 'form-control field-xxlg', 'placeholder' => 'Breve descrição sobre este conteúdo')) ?>
					</div>
					
					<div class="form-group">
						<?php echo CHtml::activeLabel($model,'content', array('label' => 'Descrição detalhada do Produto')); ?>
						<?php echo CHtml::activeTextArea($model,'content', array('class' => 'form-control field-xxlg', 'id' => 'content', 'rows' => '15')) ?>
					</div>
			
					<?php echo CHtml::submitButton($model->id ? 'Alterar' : 'Salvar', array('class' => 'btn btn-primary')); ?>
					
				<?php echo CHtml::endForm(); ?>
			</div>
		</div>
	</div>
</div>