@extends('layouts.base')

@section('content')
  <?php get_template_part('partials/page-header'); ?>
  <?php if (!have_posts()) : ?>
    <div class="alert alert-warning">
      <?php _e('Sorry, no results were found.', 'sage'); ?>
    </div>
    <?php get_search_form(); ?>
  <?php endif; ?>

  <div class="cnotv__flexgrid cnotv__flexgrid--invertwrap">
    <section class="cnotv__flexgrid__column cnotv__flexgrid__column--fill">
  		<div class="cnotv__flexgrid">
  			<?php while (have_posts()) : the_post(); ?>
  			  <?php get_template_part('partials/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
  			<?php endwhile; ?>
  		</div>
    </section>
    <section class="cnotv__flexgrid__column cnotv__flexgrid__column--4">
  		<?php get_template_part('templates/partials/cloud-subfields'); ?>
  		<?php dynamic_sidebar('sidebar-primary'); ?>
    </section>
  </div>

  <?php the_posts_navigation(); ?>
@endsection
