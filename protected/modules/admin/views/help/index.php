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
								<th>#</th>
								<th>Título</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php if($itens){ ?>
								<?php foreach($itens as $item){ ?>
									<tr>
										<td>&nbsp;</td>
										<td>
											<a href="<?php echo Yii::app()->params['adminUrl']?><?php echo strtolower($this->model)?>/view/<?php echo $item['id']?>">
												<?php echo $item['title']?>
											</a>
										</td>
										<td>
											<a href="<?php echo Yii::app()->params['adminUrl']?><?php echo strtolower($this->model)?>/view/<?php echo $item['id']?>" title="Visualizar" class="btn btn-primary btn-circle">
												<i class="fa fa-search"></i>
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