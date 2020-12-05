<?php if($partsNo=="XXX"){ ?>

<?php
/*======================================
1　TOP
======================================*/ ?>
<?php }elseif($partsNo=="1"){ ?>


	<div class="news">
		<a href="<?php the_permalink() ?>">
			<div class="data">
					<?php the_time('Y.m.d') ?>
			</div>
			<div class="cate">
				<p><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></p>
			</div>
			<div class="title">
				<?php the_title(); ?>
			</div>
		</a>
	</div>


<?php } ?>




