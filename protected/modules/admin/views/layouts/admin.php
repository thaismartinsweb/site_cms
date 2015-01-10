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
	<div id="wrapper">
		<nav class="navbar navbar-green navbar-static-top" role="navigation">		
			<!-- LOGO -->
			<div class="navbar-header">
				<a class="navbar-brand" href="index.html">
					<i class="fa fa-pencil-square-o"></i>
					CMS
				</a>
			</div>
			<!-- / LOGO -->
			
			<!-- / LOGOUT -->
			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<a target="_blank" href="<?php echo Yii::app()->createUrl('index')?>" title="Visualizar Site">
						<i class="fa fa-search-plus fa-2x fa-fw"></i>
					</a>
				</li>
				<li class="dropdown">
					<a href="<?php echo Yii::app()->params['logoutUrl']?>" title="Sair">
						<i class="fa fa-sign-out fa-2x fa-fw"></i>
					</a>
				</li>
			</ul>
			<!-- / LOGOUT -->
		 </nav>

		<nav class="navbar-default navbar-static-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="side-menu">
					<li>
						<div class="user-info-wrapper">	
							<div class="user-info-profile-image">
								<i class="fa fa-user"></i>
							</div>
							<div class="user-info">
								<div class="user-welcome">Bem vindo</div>
								<div class="username"><?php echo Yii::app()->user->getName(); ?></div>
							</div>
						</div>
					</li>
					
					<li class="sidebar-search">
						<div class="input-group custom-search-form">
							<input type="text" class="form-control" placeholder="Procurar por" />
							<span class="input-group-btn">
								<button class="btn btn-default" type="button">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</li>
				
				<?php $this->widget('SideMenuWidget'); ?>
				
				</ul>
			</div>
		</nav>

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header text-asbestos"><?php echo CHtml::encode(Yii::app()->name); ?></h3>
				</div>
			</div>
			
			<?php if(isset($this->breadcrumbs)):?>
				<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'links' => $this->breadcrumbs,
						'homeLink' => CHtml::link('Home', Yii::app()->createURl('admin')) )); ?>
			<?php endif?>
			
			<?php echo $content; ?>
			
			<div style="clear:both"></div>
			<div id="footer" style="text-align:center">2014 - <?php echo date('Y'); ?> | Desenvolvido por <a href="http://thaismartins.rocks" target="_blank">thaismartins.rocks</a></div>
		</div>
	</div>
	
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/lightbox.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/morris/raphael-2.1.0.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/morris/morris.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/mint-admin.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/demo/dashboard-demo.js"></script>
	
	<script>
		 tinymce.init({
		    selector: "textarea#content",
		    menubar: false,
		    statusbar: false,
		    plugins: [
		         "autolink link image lists charmap hr anchor pagebreak",
		         "searchreplace wordcount visualblocks visualchars nonbreaking",
		         "table directionality template paste textcolor fullscreen jbimages"
		   ],
		   toolbar: "undo redo | bold italic | fontsizeselect forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link jbimages",
		   font_size_style_values: "10px, 12px, 14px, 16px, 18px, 20px, 24px, 28px, 36px",
		   setup : function(ed) {
				     ed.on('init', function() 
				     {
				         this.getDoc().body.style.fontSize = '14px';
				         this.getDoc().body.style.fontFamily = 'Arial';
				         this.getDoc().body.style.color = '#555555';
				     });
				   }
		 }); 
	 </script>

</body>
</html>