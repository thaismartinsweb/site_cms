<?php foreach($photos as $photo){ ?>
	<div class="form-group">
		<div class="photos">
			<a href="/public/<?php echo strtolower($this->model) ?>/<?php echo $model['id']?>/<?php echo $photo['image']?>" data-lightbox="photos">
				<img src="/public/<?php echo strtolower($this->model) ?>/<?php echo $model['id']?>/<?php echo $photo['image']?>" title="<?php echo $photo['title']?>" alt="<?php echo $photo['title']?>" />
			</a>
			<p><?php echo $photo['title'] ?></p>
			<button data-toggle="modal" data-target="#model_<?php echo $photo['id']?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</button>
			<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Excluir</a>
		</div>
		<div class="modal fade" id="model_<?php echo $photo['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			
				<?php echo CHtml::beginForm('/admin/photogallery/editImage/'.$photo['id'], 'post', array('enctype'=>'multipart/form-data')); ?>
				<?php echo CHtml::activeHiddenField($photo,'id') ?>
				
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Editar detalhes da Imagem</h4>
					</div>
					<div class="modal-body">
					
						<div class="form-group">
							<?php echo CHtml::activeLabel($photo,'title', array('label' => 'Título')); ?>
							<?php echo CHtml::activeTextField($photo,'title', array('class' => 'form-control field-xxlg', 'placeholder' => 'Título')) ?>
						</div>
						
						<div class="form-group">
							<?php echo CHtml::activeLabel($photo,'description', array('label' => 'Descrição da Foto')); ?>
							<?php echo CHtml::activeTextArea($photo,'description', array('class' => 'form-control field-xxlg', 'placeholder' => 'Breve descrição sobre esta galeria')) ?>
						</div>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						<?php echo CHtml::submitButton('Alterar', array('class' => 'btn btn-primary')); ?>
					</div>
				</div>
				
				<?php echo CHtml::endForm(); ?>
			</div>
		</div>
	</div>		
<?php } ?>