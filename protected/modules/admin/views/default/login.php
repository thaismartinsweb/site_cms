<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
			
				<div class="panel-heading">
					<h3 class="panel-title" style="text-align:center;padding:20px 0;">ACESSAR CMS</h3>
				</div>
				
				<div class="panel-body">
					
					<?php $form = $this->beginWidget('CActiveForm', array(
						    'id' => 'user-form',
							'action' => $this->createUrl('default/doLogin'),
						    'enableAjaxValidation' => false,
						    'enableClientValidation' => false,
							'htmlOptions' => array('enctype'=>'multipart/form-data', 'role' => 'form')
					)); ?>
					
					<?php if($form->errorSummary($model)) { ?>
						<div class="alert alert-danger alert-dismissable">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							<?php echo $form->errorSummary($model); ?>
						</div>
					<?php } ?>

					<div class="form-group">
					    <?php echo $form->labelEx($model, 'username'); ?>
					    <?php echo $form->textField($model,'username', array('class' => 'form-control input-lg', 'placeholder' => 'usuario')) ?>
					</div>
					
					<div class="form-group">
					    <?php echo $form->labelEx($model, 'password'); ?>
					    <?php echo $form->passwordField($model,'password', array('class' => 'form-control input-lg', 'placeholder' => 'senha')) ?>
					</div>
					
					<div class="row submit">
					    <?php echo CHtml::submitButton('Entrar', array('class' => 'btn btn-lg btn-primary btn-block')); ?>
					</div>
					
					<?php $this->endWidget(); ?>
					
				</div>
			</div>
		</div>
	</div>
</div>