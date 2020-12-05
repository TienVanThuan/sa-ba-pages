<?php get_header(); ?>


<div class="p-top">


	<div class="p-top__mv">
		<h2><img src="<?php bloginfo('template_directory'); ?>/img/top/title_01.png" width="408" height="229" alt="レンタルサーバーなら TOP SERVER 低価格レンタルサーバー＆０円ドメイン"></h2>
	</div>


	<div class="p-top__search">
		<div class="c-wrap">
			<div class="box">
				<div class="left">
					<p>希望ドメインが取得可能か検索！</p>
				</div>
				<div class="right search-box">
					
					<form name="form1" action="/search_output/" method="post">
					<input type="text" name="search_domain" id="search_domain" value="" />
					<select name="nic" id="nic">
					    <option value="" disabled selected>ドメインを選択</option>
					    <option value=".jp">.jp</option>
					    <option value=".co.jp">.co.jp</option>
					    <option value=".org">.org</option>
					    <option value=".net">.net</option>
					    <option value=".com">.com</option>
					</select>
					<input type="submit" value="検索する" />
					</form>

				</div>
			</div>
		</div>		
	</div>


	<div class="p-top__plan">
		<div class="c-wrap">
			
			<div class="intro">
				<h3 class="c-title1">用途で選べる4つのプラン</h3>
				<p>レンタルサーバーと独自ドメイン取得で、<br class="sp-only">ご利用中は半永久的に無料でドメインを運用出来ます。<br>安心のデーターセンターで管理され、<br class="sp-only">最適な運用が可能です。<br>※手続き・管理を、全てコントロールパネル<br class="sp-only">で行って頂きます。</p>
			</div>
			
			<?php include(TEMPLATEPATH . '/php/plan-list.php'); ?>
			
			<?php include(TEMPLATEPATH . '/php/ads-list.php'); ?>

			<?php include(TEMPLATEPATH . '/php/domain-list.php'); ?>

		</div>
	</div>

	<div class="p-top__info">
		<div class="c-wrap">
			<div class="c-title1">
				<h3>お知らせ</h3>
			</div>


			<div class="inner">
				<div class="tab-wrap">
					<ul class="tab">
						<li class="select">新着</li>
						<li>障害</li>
						<li>メンテナンス</li>
					</ul>
					<a href="<?php echo home_url(); ?>/information/" class="pc-only">
						お知らせ一覧
					</a>
				</div>
				<div class="content">
					<div class="box">
						
						<div class="c-news">
							<?php
							query_posts(Array(
								'showposts' => 5,
								'posts_per_page' => 5,
								'paged' => get_query_var('paged')
							));
							if(have_posts()){while(have_posts()){the_post();
							$partsNo=1;include(get_template_directory().'/lib/parts.php');
							}}else{echo '<div class="noentry">投稿はありません</div>';}
							wp_reset_query();
							?>							
						</div>

					</div>
					<div class="box hide">
						<div class="c-news">
							<?php
							query_posts(Array(
								'category_name' =>'obstacle',
								'showposts' => 5,
								'posts_per_page' => 5,
								'paged' => get_query_var('paged')
							));
							if(have_posts()){while(have_posts()){the_post();
							$partsNo=1;include(get_template_directory().'/lib/parts.php');
							}}else{echo '<div class="noentry">投稿はありません</div>';}
							wp_reset_query();
							?>
						</div>	
					</div>
					<div class="box hide">
						<div class="c-news">
							<?php
							query_posts(Array(
								'category_name' =>'maintenance',
								'showposts' => 5,
								'posts_per_page' => 5,
								'paged' => get_query_var('paged')
							));
							if(have_posts()){while(have_posts()){the_post();
							$partsNo=1;include(get_template_directory().'/lib/parts.php');
							}}else{echo '<div class="noentry">投稿はありません</div>';}
							wp_reset_query();
							?>
						</div>	
					</div>
				</div>
			</div>


		</div>
	</div>

</div><!-- /.p-top -->


<?php get_footer(); ?>