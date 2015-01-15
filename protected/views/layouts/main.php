<!DOCTYPE html>
<html lang="pt_BR">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<meta name="description" content="<?php echo $this->config->title ?>" />
	
	<link rel="author" href="<?php echo $this->config->site ?>" />
	<link rel="shortcut icon" href="<?php echo $this->createUrl('images/favicon.ico');?>">

	<title><?php echo $this->config->title ?></title>
	
	<?php Yii::app()->clientScript->registerCssFile('//fonts.googleapis.com/css?family=Raleway:100,400,300,500,700,900'); ?>
	
	<?php Yii::app()->clientScript->registerCssFile('/css/bootstrap.css'); ?>
	<?php Yii::app()->clientScript->registerCssFile('/css/social-buttons.css'); ?>
	
	<?php Yii::app()->clientScript->registerCssFile('/css/layerslider.css'); ?>
	<?php Yii::app()->clientScript->registerCssFile('/css/lightbox.css'); ?>
	
	<?php Yii::app()->clientScript->registerCssFile('/css/style.css'); ?>
	
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<!--[if gte IE 9]>
	  <style type="text/css">
	    .gradient {
	       filter: none;
	    }
	  </style>
	<![endif]-->
</head>
<body>

	<header id="site" class="container-fluid">
		<nav class="navbar navbar-orange navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
						<span class="sr-only">Navegação Mobile</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">
						<?php echo CHtml::image($this->createUrl('public/config/'.$this->config->image), $this->config->title)?>
					</a>
				</div>
				
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="menu">
					<ul class="nav-orange" id="onepage">
						<li class="home current"><span class="nav-hover" style="display:block"></span><a href="<?php echo Yii::app()->params['siteUrl']; ?>#slider">Home</a></li>
						<li class="about"><span class="nav-hover"></span><a href="<?php echo Yii::app()->params['siteUrl']; ?>#about">Sobre Mim</a></li>
						<li class="services"><span class="nav-hover"></span><a href="<?php echo Yii::app()->params['siteUrl']; ?>#services">Serviços</a></li>
						<li class="portfolio"><span class="nav-hover"></span><a href="<?php echo Yii::app()->params['siteUrl']; ?>#portfolio">Portfólio</a></li>
						<li class="contact"><span class="nav-hover"></span><a href="<?php echo Yii::app()->params['siteUrl']; ?>#contact">Contato</a></li>
					</ul>
				</div>
			</div>
		</nav>	
	</header>
	
	<?php echo $content; ?>
	
	<footer class="container-fluid">
		<div class="row">
			<div class="col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 col-xs-12"><hr /></div>
			<div class="contact col-xs-12">
				<div class="col-md-offset-2 col-md-2 col-sm-4 col-xs-12">
					<p><i class="fa fa-comment"></i><?php echo $this->config->contact ?></p>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-2">
					<p><i class="fa fa-laptop"></i><a href="mailto:<?php echo $this->config->email ?>"><?php echo $this->config->email ?></a></p>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-2">
					<p><i class="fa fa-skype"></i><?php echo $this->config->skype ?></p>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2">
					<div id="socials">
						<div class="social">
							<a href="<?php echo $this->config->github ?>">
								<i class="fa fa-social fa-github-alt hidden-xs github"></i>
								<span class="hidden-sm hidden-md hidden-lg">GITHUB</span>
							</a>
						</div>
						<div class="social">
							<a href="<?php echo $this->config->behance ?>">
								<i class="fa fa-behance hidden-xs behance"></i>
								<span class="hidden-sm hidden-md hidden-lg">BEHANCE</span>
							</a>
						</div>
						<div class="social">
							<a href="<?php echo $this->config->linkedin ?>">
								<i class="fa fa-linkedin hidden-xs linkedin"></i>
								<span class="hidden-sm hidden-md hidden-lg">LINKEDIN</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 col-xs-12"><hr /></div>
		</div>
		<div class="row">
			<div class="col-xs-12 text-center">
				<address>Desenvolvido por <a href="<?php echo $this->config->site ?>"><?php echo str_replace('http://', '', $this->config->site) ?></a></address>
			</div>
		</div>
	
	</footer>
	
	<?php Yii::app()->clientScript->registerScriptFile('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', CClientScript::POS_END); ?>
	
	<?php Yii::app()->clientScript->registerScriptFile('/js/lightbox.min.js', CClientScript::POS_END); ?>
	<?php Yii::app()->clientScript->registerScriptFile('/js/greensock.js', CClientScript::POS_END); ?>
	<?php Yii::app()->clientScript->registerScriptFile('/js/layerslider.transitions.js', CClientScript::POS_END); ?>
	<?php Yii::app()->clientScript->registerScriptFile('/js/layerslider.kreaturamedia.jquery.js', CClientScript::POS_END); ?>
	
	<?php Yii::app()->clientScript->registerScriptFile('/js/bootstrap.min.js', CClientScript::POS_END); ?>
	<?php Yii::app()->clientScript->registerScriptFile('/js/jquery.onepage.js', CClientScript::POS_END); ?>
	
	<?php Yii::app()->clientScript->registerScriptFile('/js/jquery.isMobile.js', CClientScript::POS_END); ?>
	<?php Yii::app()->clientScript->registerScriptFile('/js/jquery.site.js', CClientScript::POS_END); ?>
	<?php Yii::app()->clientScript->registerScriptFile('/js/jquery.menu.js', CClientScript::POS_END); ?>
	<?php Yii::app()->clientScript->registerScriptFile('/js/jquery.ajax.js', CClientScript::POS_END); ?>
	<?php Yii::app()->clientScript->registerScriptFile('/js/jquery.canvas.js', CClientScript::POS_END); ?>
	
</body>
</html>