<?php while (have_posts()) : the_post(); ?>
  <div class="cnotv__flexgrid cnotv__flexgrid--invertwrap">
	  <section class="cnotv__flexgrid__column cnotv__flexgrid__column--fill">
		  <?php get_template_part('partials/content-single', get_post_type()); ?>
	  </section>
	  <section class="cnotv__flexgrid__column cnotv__flexgrid__column--4">
		  <?php get_template_part('templates/partials/pagination'); ?>
			<?php get_template_part('templates/partials/entry-meta'); ?>
			<?php get_template_part('templates/partials/entry-meta-portfolio'); ?>
			<?php dynamic_sidebar('sidebar-primary'); ?>
	  </section>
	</div>

  <hr class="cnotv__divider clearfix">
	<?php get_template_part('templates/partials/related-post'); ?>
<?php endwhile; ?>