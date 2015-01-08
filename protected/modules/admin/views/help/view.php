<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Visualizar Conteúdo</h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading" style="font-size:16px"><b><?php echo $module['title'] ?></b></div>
			<div class="panel-body">
				<div id="accordion" class="panel-group">
				
					<?php if($models && is_array($models)) {?>
						<?php foreach($models as $item){ ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="<?php echo '#'.$item['id']?>" data-parent="#accordion" data-toggle="collapse"><?php echo $item['title']?></a>
									</h4>
								</div>
								<div id="<?php echo $item['id']?>" class="panel-collapse collapse">
									<?php $this->renderPartial($item['content']);?>
								</div>
							</div>
						<?php }?>
					<?php }?>
					
				</div>				
				<div class="form-group">
					<a href="<?php echo Yii::app()->params['adminUrl']?><?php echo strtolower($this->model)?>" class="btn btn-primary">Voltar</a>
				</div>
			</div>
		</div>
	</div>
</div>