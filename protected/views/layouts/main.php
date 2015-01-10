<!DOCTYPE html>
<html lang="pt_BR">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<meta name="description" content="CMS | Gerenciador de Conteúdo By Thais Martins" />
	<link rel="author" href="http://www.tmartins.com" />

	<title>Thais Martins | Desenvolvedora Web Freelancer</title>
	
	<link href='//fonts.googleapis.com/css?family=Raleway:100,400,300,500,700,900' rel='stylesheet' type='text/css'>
	
	<link href="css/bootstrap.css" rel="stylesheet" />
	<link href="css/social-buttons.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />
	
	<!-- LayerSlider stylesheet -->
	<link rel="stylesheet" href="css/layerslider.css" type="text/css">
	
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
					</button>
					<a class="navbar-brand" href="index.php">
						<?php echo CHtml::image($this->createUrl('images/logo.png'), 'Thais Martins | Desenvolvimento Web Freelancer')?>
					</a>
				</div>
				
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="menu">
					<ul class="nav-orange" id="onepage">
						<li class="home current"><span class="nav-hover" style="display:block"></span><a href="#slider">Home</a></li>
						<li class="about"><span class="nav-hover"></span><a href="#about">Sobre Mim</a></li>
						<li class="services"><span class="nav-hover"></span><a href="#services">Serviços</a></li>
						<li class="portfolio"><span class="nav-hover"></span><a href="#portfolio">Portfólio</a></li>
						<li class="contact"><span class="nav-hover"></span><a href="#contact">Contato</a></li>
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
					<p><i class="fa fa-comment"></i>11 94129-3240</p>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-2">
					<p><i class="fa fa-laptop"></i><a href="mailto:#">contato@tmartins.com.br</a></p>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-2">
					<p><i class="fa fa-skype"></i>thamartinss</p>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2">
					<div id="socials">
						<div class="social">
							<a href="#">
								<i class="fa fa-social fa-github-alt hidden-xs github"></i>
								<span class="hidden-sm hidden-md hidden-lg">GITHUB</span>
							</a>
						</div>
						<div class="social">
							<a href="#">
								<i class="fa fa-behance hidden-xs behance"></i>
								<span class="hidden-sm hidden-md hidden-lg">BEHANCE</span>
							</a>
						</div>
						<div class="social">
							<a href="#">
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
				<address>Desenvolvido por Thaís Martins | <a href="#">thaismartins.rocks</a></address>
			</div>
		</div>
	
	</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	
	<script src="js/greensock.js"></script>
	<script src="js/layerslider.transitions.js"></script>
	<script src="js/layerslider.kreaturamedia.jquery.js"></script>
	
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.onepage.js"></script>
	<script src="js/jquery.isMobile.js"></script>
	<script src="js/jquery.site.js"></script>
	<script src="js/jquery.menu.js"></script>
	
</body>
</html>