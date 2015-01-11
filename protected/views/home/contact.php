<section id="contact" class="general-content">
	<div class="container-fluid">
	
		<div class="row">
			<div class="col-md-9 col-md-offset-1 col-xs-12">
				<div class="page-title">
					<h1>Fale <strong>Comigo</strong></h1><hr />
				</div>
			</div>
		</div>

		<div class="col-md-5 col-md-offset-1 col-xs-12">
		
			<div class="row">
				<div class="alert alert-danger alert-dismissable" id="sendFail">
					<p>Erro ao enviar email:</p>
					<p class="errors"></p>
					<p>
						Por favor, tente novamente<br />
						ou envie um email para <a href="mailto:<?php echo $this->config->email ?>"><?php echo $this->config->email ?></a>.
					</p>
				</div>
			</div>
			
			<div class="row">
				<div class="alert alert-success alert-dismissable" id="sendOk">
					<p></p>
				</div>
			</div>
			
			<?php $form = $this->beginWidget('CActiveForm', array(
						    'id' => 'formContact',
						    'enableAjaxValidation' => false,
						    'enableClientValidation' => false,
							'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
				)); ?>
			
			
			<div class="form-group">
				<?php echo $form->labelEx($contactForm, 'name', array('class' => 'col-sm-2 control-label')); ?>
				<div class="col-sm-10">
					<?php echo $form->textField($contactForm, 'name', array('class' => 'form-control input-lg', 'placeholder' => 'Nome')) ?>
				</div>
			</div>
			
			<div class="form-group">
				<?php echo $form->labelEx($contactForm, 'email', array('class' => 'col-sm-2 control-label')); ?>
				<div class="col-sm-10">
					<?php echo $form->textField($contactForm, 'email', array('class' => 'form-control input-lg', 'placeholder' => 'email@email.com.br')) ?>
				</div>
			</div>
			
			<div class="form-group">
				<?php echo $form->labelEx($contactForm, 'phone', array('class' => 'col-sm-2 control-label')); ?>
				<div class="col-sm-10">
					<?php echo $form->textField($contactForm, 'phone', array('class' => 'form-control input-lg', 'placeholder' => '(99)9999-9999')) ?>
				</div>
			</div>
			
			<div class="form-group">
				<?php echo $form->labelEx($contactForm, 'content', array('class' => 'col-sm-2 control-label')); ?>
				<div class="col-sm-10">
					<?php echo $form->textArea($contactForm, 'content', array('class' => 'form-control input-lg', 'placeholder' => 'Mensagem', 'rows' => '5')) ?>
				</div>
			</div>
			
			<div class="form-group">
		   		<div class="col-sm-offset-2 col-sm-10">
				<?php echo CHtml::ajaxLink('Enviar', $this->createUrl('sendContact'),
											array('type' => 'post',
									       		  'success' => 'function(data){handleAjaxResponse(data)}',
									        	  'data' => 'js:$("#formContact").serialize()',
												  'dataType' => 'json'),	
											array('class' => 'btn btn-warning')); ?>
		    </div>
		  </div>
			  
			<?php $this->endWidget(); ?>
		</div>
		
		<div class="col-md-5 hidden-sm hidden-xs">
			<h3>Precisando de orçamento ou tem alguma dúvida?</h3>
			<p><i class="fa fa-comment"></i><?php echo $this->config->contact ?></p>
			<p><i class="fa fa-laptop"></i><a href="mailto:<?php echo $this->config->email ?>"><?php echo $this->config->email ?></a></p>
			<p><i class="fa fa-skype"></i><?php echo $this->config->skype ?></p>
		</div>
		
	</div>
</section>