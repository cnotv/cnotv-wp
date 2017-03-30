@extends('layouts.base')
<?php
/**
 * Template Name: Custom Template
 */
?>

@section('content')
	<?php while (have_posts()) : the_post(); ?>
	  <?php get_template_part('partials/page-header'); ?>
	  <?php get_template_part('partials/content-page'); ?>
	<?php endwhile; ?>
@endsection
