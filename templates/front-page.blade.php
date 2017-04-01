@extends('layouts.base')
@section('content')
  <?php while (have_posts()) : the_post(); ?>
    <section class="cnotv__flexgrid cnotv__flexgrid--invertwrap">
      <div class="cnotv__flexgrid__column cnotv__flexgrid__column--fill">
        <?php get_template_part('partials/content-page'); ?>
        <?php get_template_part('partials/cloud-subfields'); ?>
      </div>
      <div class="cnotv__flexgrid__column cnotv__flexgrid__column--4">
        <h2 class="h5">My working tools:</h2>
        <?php get_template_part('partials/cloud-tools'); ?>
      </div>
    </section>

    <?php
    $categories = get_terms( 'portfolio_category' );
    foreach ( $categories as $category ) { ?>
      <section class="cnotv__section">
        <hr class="cnotv__divider">
        <h2 class="h5">Latest <?php echo $category->name ?> <small><a class="cnotv__more" href="<?php echo esc_url( get_category_link( $category->term_id ) ) ?>"><i class="fa fa-plus"></i></a></small></h2>
        <div class="cnotv__flexgrid">
          <?php 
          $args = array( 
            'post_type' => 'portfolio',
            'posts_per_page' => 4,
            'tax_query' => array(
              array(
                'taxonomy' => 'portfolio_category',
                'field' => 'slug',
                'terms' => $category->slug
              )
            )
          );
          $query = new WP_Query( $args );      
          while ( $query->have_posts()) : $query->the_post(); ?>
            <?php get_template_part('partials/content-portfolio', get_post_type() != 'portfolio' ? get_post_type() : get_post_format()); ?>
          <?php endwhile; ?>
        </div>
      </section>
    <?php }?>
    
    <section class="cnotv__section">
      <hr class="cnotv__divider">
      <h2 class="h5">Latest articles <small><a class="cnotv__more" href="blog"><i class="fa fa-plus"></i></a></small></h2>
      <div class="cnotv__flexgrid">
        <?php 
        $args = array( 
          'post_type' => 'post',
          'posts_per_page' => 4
        );
        $query = new WP_Query( $args );      
        while ( $query->have_posts()) : $query->the_post(); ?>
          <?php get_template_part('partials/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
        <?php endwhile; ?>
      </div>
    </section>
  <?php endwhile; ?>
@endsection
