@extends('layouts.base')
@section('content')
	<section class="cnotv__section">
	  <?php get_template_part('partials/page-header'); ?>
	  <div class="cnotv__flexgrid">
	    <?php 
	    $args = array( 'post_type' => 'post');
	    $portfolio_loop = new WP_Query( $args );      
	    while ( $portfolio_loop->have_posts()) : $portfolio_loop->the_post(); ?>
	      <?php get_template_part('partials/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
	    <?php endwhile; ?>
	  </div>
	</section>
@endsection
