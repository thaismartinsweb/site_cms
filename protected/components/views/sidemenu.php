<?php if($modules){ ?>
	<?php foreach($modules as $module){ ?>
		<li>
			<a href="<?php echo Yii::app()->createUrl('admin/' . $module['controller'])?>">
				<i class="fa fa-<?php echo $module['icon']?> fa-fw fa-2x"></i>
				<span><?php echo $module['title']?></span>
			</a>
		</li>
	<?php } ?>
<?php } ?>