<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
			
				<div class="panel-heading">
					<h3 class="panel-title" style="text-align:center;padding:20px 0;">ACESSAR CMS</h3>
				</div>
				
				<div class="panel-body">

					<?php echo CHtml::beginForm('', 'post', array('role' => 'form')); ?>
					
					<?php if(CHtml::errorSummary($model)) { ?>
						<div class="alert alert-danger alert-dismissable">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							<?php echo CHtml::errorSummary($model); ?>
						</div>
					<?php } ?>

					<div class="form-group">
					    <?php echo CHtml::activeLabel($model, Yii::t('admin', 'Usuario')); ?>
					    <?php echo CHtml::activeTextField($model,'username', array('class' => 'form-control input-lg', 'placeholder' => 'usuario')) ?>
					</div>
					
					<div class="form-group">
					    <?php echo CHtml::activeLabel($model, Yii::t('admin', 'Senha')); ?>
					    <?php echo CHtml::activePasswordField($model,'password', array('class' => 'form-control input-lg', 'placeholder' => 'senha')) ?>
					</div>
					
					<div class="row submit">
					    <?php echo CHtml::submitButton('Entrar', array('class' => 'btn btn-lg btn-primary btn-block')); ?>
					</div>
					
					<?php echo CHtml::endForm(); ?>
					
				</div>
			</div>
		</div>
	</div>
</div>