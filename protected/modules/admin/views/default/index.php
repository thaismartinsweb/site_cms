<div class="row">
	<?php if($modules){ ?>
		<?php foreach($modules as $module){ ?>
			<div class="col-xs-3 col-md-3">
				<div class="panel panel-success text-center panel-eyecandy">
					<div class="panel-body theme-color">
						<i class="fa fa-<?php echo $module['icon']?> fa-3x"></i>
					</div>
					<div class="panel-footer">
						<span class="panel-eyecandy-title">
							<a href="<?php echo Yii::app()->createUrl('admin/'.$module['controller'])?>"><?php echo $module['title']?></a>
						</span>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo Yii::t('admin', 'Ultimos Conteudos')?></div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Id</th>
								<th>Título</th>
								<th>Menu</th>
								<th>Tipo de Página</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php if($contents){ ?>
								<?php foreach($contents as $content){ ?>
									<tr>
										<td><?php echo $content['id']?></td>
										<td>
											<a href="<?php echo Yii::app()->params['adminUrl']?>content/edit/<?php echo $content['id']?>">
												<?php echo $content['title']?>
											</a>
										</td>
										<td><?php echo Menu::model()->findTitle($content['menu_id']);?></td>
										<td><?php echo TypePage::model()->findTitle($content['type_page_id']);?></td>
										<td>
											<a href="<?php echo Yii::app()->params['adminUrl']?>content/edit/<?php echo $content['id']?>" title="Editar" class="btn btn-primary btn-circle">
												<i class="fa fa-edit"></i>
											</a>
											<a href="<?php echo Yii::app()->params['adminUrl']?>content/remove/<?php echo $content['id']?>" title="Excluir" class="btn btn-danger btn-circle">
												<i class="fa fa-times"></i>
											</a>
										</td>
									</tr>
								<?php } ?>
							<?php } else { ?>
								<tr>
									<td colspan="5" style="padding:100px 0;text-align:center;">Nenhum resultado encontrado</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>