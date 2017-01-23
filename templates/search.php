<?php get_template_part('partials/page-header'); ?>

<?php if (!have_posts()) : ?>
  <div class="h1">
    <?php _e('Nope.', 'sage'); ?>
  </div>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('partials/content-search'); ?>
<?php endwhile; ?>

<?php the_posts_navigation(); ?>
