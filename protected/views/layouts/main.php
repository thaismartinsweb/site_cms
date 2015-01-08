<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<meta name="description" content="CMS | Gerenciador de Conteúdo By Thais Martins" />
	<link rel="author" href="http://www.tmartins.com" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
					<h3 class="page-header text-asbestos"><?php echo CHtml::encode(Yii::app()->name); ?></h3>
					
					<?php if(isset($this->breadcrumbs)):?>
						<?php $this->widget('zii.widgets.CBreadcrumbs', array(
								'links'=>$this->breadcrumbs, )); ?>
					<?php endif?>			
					
					</div>
				</div>
				
				<?php echo $content; ?>
				
			</div>
  
	<div id="footer">2014 - <?php echo date('Y'); ?> | by <a href="#">Thais Martins</a></div>

</body>
</html>