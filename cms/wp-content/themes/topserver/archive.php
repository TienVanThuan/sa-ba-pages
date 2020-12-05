<?php get_header(); ?>

	<div class="p-page">
		<div class="p-info">

			<div class="c-wrap">
				
				<div class="c-title2">
					<h3>お知らせ</h3>
				</div>

				<p>サービスに関するご案内、メンテナンス・障害情報をご案内しています。</p>

				<div class="news-wrap">
					<div class="tab-wrap">
						<ul class="tab">
							<li <?php if( !is_category() ) : ?>class="select"<?php endif; ?>><a href="<?php echo home_url(); ?>/information/">新着</a></li>
							<li <?php if( is_category("obstacle") ) : ?>class="select"<?php endif; ?>><a href="<?php echo home_url(); ?>/category/obstacle/">障害</a></li>
							<li <?php if( is_category("maintenance") ) : ?>class="select"<?php endif; ?>><a href="<?php echo home_url(); ?>/category/maintenance/">メンテナンス</a></li>
						</ul>
					</div>
					<div class="content">
						<div class="box">
							
							<div class="c-news">
								<?php
								if(have_posts()): while(have_posts()): the_post(); ?>
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
								<?php endwhile; else: endif; ?>						
							</div>
							
						</div>
					</div>

					<?php //ページネーション
					if (function_exists("pagination")) {
						pagination($additional_loop->max_num_pages);
					} ?>

				</div>

			</div>
			
		</div>
	</div>

<?php get_footer(); ?>