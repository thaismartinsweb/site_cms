<section id="page" class="general-content">
	<div class="container-fluid">
	
		<div class="row">
			<div class="col-md-offset-1 col-md-7 col-sm-12">
				<h1>Meus<strong> trabalhos</strong></h1><hr />
			</div>
		</div>
		
		<div class="row">
			
			<div class="col-md-offset-1 col-md-5 col-sm-12">
				<?php $photos = Photo::model()->findByPortfolio($portfolio->id); ?>
				
				<?php foreach($photos as $photo) { ?>
					<div class="photo col-md-6 col-sm-12">
						<?php $image = '/public/photo/' . $photo->image; ?>
						<a href="<?php echo $this->createUrl($image)?>" data-lightbox="photos">
							<?php echo CHtml::image($image, $portfolio->title, array('class' => 'img-rounded img-responsive')); ?>
						</a>
					</div>
				<?php } ?>
			</div>
			
			<div class="col-md-5 col-sm-12 content">
				<h1><?php echo $portfolio->title ?></h1>
				
				<div class="works">
					<?php
						$tags = Tag::model()->findByPortfolio($portfolio->id);
						
						foreach($tags as $tag){
							echo '<span><a href="'.$this->createUrl('portfolio/tag/'.$tag->id).'">'.$tag->title.'</a></span>';
						}
					?>
				</div>
				
				<p><?php echo $portfolio->content ?></p>
				
				<p class="back"><a href="<?php echo $portfolio->site ?>" target="_blank">&#8672; Voltar</a></p>
				
				<?php if(isset($portfolio->site)){ ?>
					<p class="link"><a href="<?php echo $portfolio->site ?>" target="_blank">Ver Site &#8674;</a></p>
				<?php } ?>
			</div>
			
		</div>
	</div>
</section>