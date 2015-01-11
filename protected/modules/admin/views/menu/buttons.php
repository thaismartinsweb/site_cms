<div class="row">
	<div class="col-sm-offset-8 col-sm-2">
		<a class="btn btn-primary" href="<?php echo $this->createUrl('index')?>">
			<span class="fa fa-edit"></span>
			<?php echo Yii::t('admin', 'Gerenciar Conteudo')?>
		</a>
	</div>
	<div class="col-sm-2">
		<a class="btn btn-primary" href="<?php echo $this->createUrl('edit')?>">
			<span class="fa fa-edit"></span>
			<?php echo Yii::t('admin', 'Adicionar Conteudo')?>
		</a>
	</div>
</div>