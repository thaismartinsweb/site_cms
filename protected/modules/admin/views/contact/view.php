<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Visualizar Conteúdo</h3>
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
							<tr><td><b>Empresa:</b> <?php echo $model['company']?></td></tr>
							<tr><td><b>Departamento:</b> <?php echo $model['departament']?></td></tr>
							<tr><td><b>Telefone:</b> <?php echo $model['contact']?></td></tr>
							<tr><td><b>Email:</b> <?php echo $model['email']?></td></tr>
							<tr><td><b>Assunto:</b> <?php echo $model['subject']?></td></tr>
							<tr><td><b>Conteúdo:</b> <?php echo $model['content']?></td></tr>
						</tbody>
					</table>
				</div>
				
				<div class="form-group">
					<a href="<?php echo Yii::app()->params['adminUrl']?><?php echo strtolower($this->model)?>" class="btn btn-primary">Voltar</a>
				</div>
			</div>
		</div>
	</div>
</div>