<?php get_header(); ?>


<div class="p-page">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="post">


<?php the_content(); ?>
</div><!-- /.post -->

<?php endwhile; ?>

<?php else : ?>
<?php endif; ?>

</div><!-- /.p-page -->


<?php get_footer(); ?>