<section id="services" class="general-content">
	<div class="container-fluid">
	
		<div class="row">
			<div class="col-md-9 col-md-offset-1 col-xs-12">
				<div class="page-title">
					<h1>O que <strong>faço</strong></h1><hr />
				</div>
			</div>
		</div>
		
		<div class="row">
			<?php if($services) { ?>
				<?php $i = 1; ?>
				<?php foreach($services as $service) {?>
					<div class="col-md-2 col-sm-4 col-xs-12 text-center service tabSelect <?php echo ($i == 1) ? 'tabSelected col-md-offset-1' : ''; ?>"
							dataContent="<?php echo StringUtils::removeSpace($service->title)?>">
						<span class="btn btn-alizarin btn-circle">
							<i class="fa fa fa-paint-brush"></i>
						</span>
						<span class="title"><?php echo $service->title ?></span>
						<span class="subtitle"><?php echo $service->description?></span>
					</div>	
					<?php $i++ ?>
				<?php }?>
			<?php }?>
		</div>
		
		<div class="row">
			<?php if($services) { ?>
				<?php $i = 1; ?>
				<?php foreach($services as $service) {?>					
					<div class="col-md-10 col-md-offset-1 col-xs-12 contentSelect <?php echo ($i == 1) ? 'currentSelected' : ''; ?>" data="<?php echo StringUtils::removeSpace($service->title)?>">
						<h1><?php echo $service->title ?></h1>
						<?php echo $service->content ?>
					</div>	
					<?php $i++ ?>
				<?php }?>
			<?php }?>
		</div>
		
	</div>
</section>