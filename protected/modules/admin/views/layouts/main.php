<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<meta name="description" content="CMS | Gerenciador de Conteúdo By Thais Martins" />
	<link rel="author" href="http://www.tmartins.com" />
	
	<!-- Core CSS - Include with every page -->
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" />
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
	
	<!-- Page-Level Plugin CSS - Dashboard -->
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/plugins/timeline/timeline.css" rel="stylesheet" />
	
	<!-- Mint Admin CSS - Include with every page -->
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/mint-admin.css" rel="stylesheet" />
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/lightbox.css" rel="stylesheet" />
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<?php echo $content; ?>

	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/lightbox.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/morris/raphael-2.1.0.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/morris/morris.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/mint-admin.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/demo/dashboard-demo.js"></script>

</body>
</html>