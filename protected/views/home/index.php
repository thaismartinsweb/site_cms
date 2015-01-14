<section id="slider" class="gradient">
	<div class="container-fluid">
		<div id="full-slider-wrapper" class="row">
		
			<canvas id="slideCanvas1" style="width:100%;height:100%;position:absolute;top:0;"></canvas>
			
			<div id="layerslider" style="width:100%;">
			
				<div class="ls-slide" data-ls="slidedelay:8000;transition2d:1;timeshift:1000;">
					<div class="ls-slide" data-ls="slidedelay:8000;transition2d:75,79;">
										
						<img src="images/macbook.png" class="ls-l" style="top:150px;left:320px;white-space:nowrap;"
						data-ls="parallaxlevel:1;offsetxin:-50;offsetyin:-50;durationin:1000;rotateyin:30;transformoriginin:right 50% 0;
						offsetyout:-50;durationout:750;rotateout:20;rotatexout:-30;scalexout:0;scaleyout:0;transformoriginout:left 50% 0;" alt="" />
						
						<p class="ls-l" style="top:200px;left:-220px;font-weight:600;font-size:48px;color:#fff;white-space:nowrap;text-shadow: 2px 2px 0px #c05534;"
						data-ls="parallaxlevel:2;durationin:1500;delayin:1000;rotatein:20;rotatexin:30;scalexin:1.5;scaleyin:1.5;transformoriginin:left 50% 0;
						durationout:750;rotateout:20;rotatexout:-30;scalexout:0;scaleyout:0;transformoriginout:left 50% 0;">SITES COM CMS</p>
						
						<p class="ls-l" style="top:270px;left:-220px;font-weight:400;font-size:24px;color:#fff;white-space:nowrap;text-shadow: 1px 1px 0px #c05534;"
						data-ls="parallaxlevel:3;offsetxin:0;durationin:2000;delayin:1000;rotateyin:90;skewxin:60;transformoriginin:25% 50% 0;
						offsetxout:100;durationout:750;skewxout:60;">Total autonomia para gerenciar qualquer<br />conteúdo do seu site</p>
						
						<a href="#services" class="ls-l" style="top:360px;left:-220px;font-weight:400;padding:3px 10px;
						font-size:14px;color:#ffffff;background:#c05534;border-radius:7px;white-space:nowrap;"
						data-ls="parallaxlevel:4;durationin:2500;delayin:1000;rotatein:20;rotatexin:30;scalexin:1.5;scaleyin:1.5;transformoriginin:left 50% 0;
						durationout:750;rotateout:20;rotatexout:-30;scalexout:0;scaleyout:0;transformoriginout:left 50% 0;">+ Veja Mais</a>
						
					</div>
				</div>
				
				<div class="ls-slide" data-ls="slidedelay:8000;transition2d:1;timeshift:1000;">
					<div class="ls-slide" data-ls="slidedelay:8000;transition2d:75,79;">
										
						<img src="images/mobile.png" class="ls-l" style="top:150px;left:-150px;white-space:nowrap;"
						data-ls="parallaxlevel:1;offsetxin:-50;offsetyin:-50;durationin:1000;rotateyin:30;transformoriginin:right 50% 0;
						offsetyout:-50;durationout:750;rotateout:20;rotatexout:-30;scalexout:0;scaleyout:0;transformoriginout:left 50% 0;" alt="" />
						
						<p class="ls-l" style="top:200px;left:320px;font-weight:600;font-size:48px;color:#fff;white-space:nowrap;text-shadow: 2px 2px 0px #c05534;"
						data-ls="parallaxlevel:2;durationin:1500;delayin:1000;rotatein:20;rotatexin:30;scalexin:1.5;scaleyin:1.5;transformoriginin:left 50% 0;
						durationout:750;rotateout:20;rotatexout:-30;scalexout:0;scaleyout:0;transformoriginout:left 50% 0;">SITES RESPONSIVOS</p>
						
						<p class="ls-l" style="top:270px;left:320px;font-weight:400;font-size:24px;color:#fff;white-space:nowrap;text-shadow: 1px 1px 0px #c05534;"
						data-ls="parallaxlevel:3;offsetxin:0;durationin:2000;delayin:1000;rotateyin:90;skewxin:60;transformoriginin:25% 50% 0;
						offsetxout:100;durationout:750;skewxout:60;">Tenha um único site compativel com<br />qualquer dispositivo do mercado</p>
						
						<a href="#services" class="ls-l" style="top:360px;left:320px;font-weight:400;padding:3px 10px;
						font-size:14px;color:#ffffff;background:#c05534;border-radius:7px;white-space:nowrap;"
						data-ls="parallaxlevel:4;durationin:2500;delayin:1000;rotatein:20;rotatexin:30;scalexin:1.5;scaleyin:1.5;transformoriginin:left 50% 0;
						durationout:750;rotateout:20;rotatexout:-30;scalexout:0;scaleyout:0;transformoriginout:left 50% 0;">+ Veja Mais</a>
						
					</div>
				</div>
				
		</div>
	</div>
</section>

<?php $this->renderPartial('about'); ?>
<?php $this->renderPartial('services', array('services' => $services)); ?>
<?php $this->renderPartial('portfolio', array('portfolios' => $portfolios)); ?>
<?php $this->renderPartial('contact', array('contactForm' => $contactForm)); ?>