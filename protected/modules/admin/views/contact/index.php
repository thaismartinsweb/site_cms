<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Últimos Contatos</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
			
				<?php echo CHtml::showErrorMessage(null); ?>
				<?php echo CHtml::showSuccessMessage();?>
				
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nome</th>
								<th>Data do Contato</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php if($itens){ ?>
								<?php foreach($itens as $item){ ?>
									<tr>
										<td><?php echo $item['id']?></td>
										<td>
											<a href="<?php echo Yii::app()->params['adminUrl']?><?php echo strtolower($this->model)?>/view/<?php echo $item['id']?>">
												<?php echo $item['name']?>
											</a>
										</td>
										<td><?php echo date ('d/m/Y H:i', strtotime($item['date_create']))?></td>
										<td>
											<a href="<?php echo Yii::app()->params['adminUrl']?><?php echo strtolower($this->model)?>/view/<?php echo $item['id']?>" title="Visualizar" class="btn btn-primary btn-circle">
												<i class="fa fa-search"></i>
											</a>
											<a href="<?php echo Yii::app()->params['adminUrl']?><?php echo strtolower($this->model)?>/remove/<?php echo $item['id']?>" title="Excluir" class="btn btn-danger btn-circle">
												<i class="fa fa-times"></i>
											</a>
										</td>
									</tr>
								<?php } ?>
							<?php } else { ?>
								<tr>
									<td colspan="4" style="padding:100px 0;text-align:center;">Nenhum resultado encontrado</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>