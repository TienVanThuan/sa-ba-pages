<?php get_header(); ?>


<div class="p-page">
	<div class="p-single">
		<div class="c-wrap">

			<?php 
				if(have_posts()): while(have_posts()): the_post();
				$category = get_the_category();
				$cat_slug = $category[0]->category_nicename;
				$cat_name = $category[0]->cat_name;
			?>

			<div class="single-title">
				<div class="data">
					<?php the_time('Y.m.d'); ?>
				</div>
				<div class="cate">
					<p><?php echo '<span class="category'.$cat_slug.'">'.$cat_name.'</span>'; ?></p>
				</div>
				<div class="title">
					<h3><?php the_title(); ?></h3>
				</div>
			</div>

			<div class="content" id="entrybody">
				<?php the_content(); ?>
			</div>

			<?php endwhile; else: endif; ?>


			<ul class="single-pager">
				<li class="next">&nbsp;<?php next_post_link('%link', '<< 次へ'); ?></li>
				<li class="archive"><a href="<?php echo home_url(); ?>/information/">一覧へ戻る</a></li>
				<li class="prev"><?php previous_post_link('%link', '前へ >>'); ?>&nbsp;</li>
			</ul>
		</div>
	</div>
</div>


<?php get_footer(); ?>