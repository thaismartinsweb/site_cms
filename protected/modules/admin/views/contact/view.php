<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><?php echo Yii::t('admin', 'Visualizar Conteudo')?></h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading" style="font-size:16px"><b><?php echo $model['name'] ?></b></div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">         
						<tbody>
							<tr><td><b>Data do Contato:</b> <?php echo date ('d/m/Y H:i', strtotime($model['date_create']))?></td></tr>
							<tr><td><b>Email:</b> <?php echo $model['email']?></td></tr>
							<tr><td><b>Conteúdo:</b> <?php echo $model['content']?></td></tr>
						</tbody>
					</table>
				</div>
				
				<div class="form-group">
					<a href="<?php echo $this->createUrl('index')?>" class="btn btn-primary">Voltar</a>
				</div>
			</div>
		</div>
	</div>
</div>