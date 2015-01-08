<?php
	$this->pageTitle = Yii::app()->name . ' - Página Não Encontrada';
	$this->breadcrumbs = array('Página Não Encontrada');
?>


<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<h1 class="small-error">Erro <?php echo $code; ?> - Página Não Encontrada</h1>
			<h4 style="padding:100px 0;"><?php echo CHtml::encode($message); ?></h4>
		</div>
		<div class="panel-body text-center">
			<a href="<?php echo Yii::app()->params['adminUrl']?>" class="btn btn-block btn-primary">Voltar</a>
		</div>
	</div>
</div>
