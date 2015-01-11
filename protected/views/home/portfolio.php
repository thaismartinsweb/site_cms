<section id="portfolio" class="general-content">
	<div class="container-fluid">
	
		<div class="row">
			<div class="col-md-9 col-md-offset-1 col-xs-12">
				<div class="page-title">
					<h1>Meus <strong>trabalhos</strong></h1><hr />
				</div>
			</div>
		</div>
		
		<?php if($portfolios) { ?>
			<?php $i = 1; ?>
			<?php foreach($portfolios as $portfolio) {?>
				<div class="col-md-2 col-sm-4 col-xs-12 text-center <?php echo ($i == 1) ? 'col-md-offset-1' : ''; ?>">
					<div class="thumbnail item">
						<a href="<?php echo $this->createUrl('portfolio/cliente/'.$portfolio->id)?>">
							<?php
								$image = '/public/portfolio/' . $portfolio->image;
								echo CHtml::image($image, $portfolio->title, array('style' => 'max-width:200px;margin:10px;', 'class' => 'img-rounded img-responsive'));
							?>
						</a>
						<p class="title"><?php echo $portfolio->title ?></p>
						<div class="division"><hr /></div>
						<div class="works">
							<?php
								$tags = Tag::model()->findByPortfolio($portfolio->id);
								
								foreach($tags as $tag){
									echo '<span><a href="'.$this->createUrl('portfolio/tag/'.$tag->id).'">'.$tag->title.'</a></span>';
								}
							?>
						</div>
						<p class="description"><?php echo $portfolio->description ?></p>
						<div class="btn-group">
							<?php if($portfolio->site != '') {?>
								<a href="<?php echo $portfolio->site ?>" target="_blank" class="btn btn-danger btn-xs" role="button"><i class="fa fa-search"></i>Site</a>
							<?php } ?>
							<a href="<?php echo $this->createUrl('portfolio/cliente/'.$portfolio->id)?>" class="btn btn-danger btn-xs" role="button"><i class="fa fa-plus"></i>Detalhes</a>
						</div>
					</div>
				</div>	
				<?php $i++ ?>
			<?php }?>
		<?php }?>
		
	</div>
</section>